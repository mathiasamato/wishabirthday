<?php

//A COMMENTER

function GetUsersWithBirthdayToday($filterLanguageId)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE MONTH(`DoB`)=MONTH(CURRENT_DATE()) AND DAY(`DoB`)=DAY(CURRENT_DATE()) AND `LanguageId`=:LANGUAGEID ';

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }

        $answer = false;

        $ps->bindParam(':LANGUAGEID', $filterLanguageId, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetUsersWithBirthdayTodayWithFilterName($filterName, $filterLanguageId)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE MONTH(`DoB`)=MONTH(CURRENT_DATE()) AND DAY(`DoB`)=DAY(CURRENT_DATE()) AND (`Lastname` SOUNDS LIKE :FILTERTEXT OR `Firstname` SOUNDS LIKE :FILTERTEXT) AND `LanguageId`=:LANGUAGEID';
        
        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }

        $answer = false;

        $ps->bindParam(':FILTERTEXT', $filterName, PDO::PARAM_STR);
        $ps->bindParam(':LANGUAGEID', $filterLanguageId, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer;

    } catch (PDOException $e) {

        echo $e->getMessage();

    }
}

function DisplayUsersWithBirthdayToday(){

    $output = "";

    if(isset($_POST["languageSelect"]) && isset($_POST["searchBar"])){

        $filterLanguageId = $_POST["languageSelect"];

        if(isset($_POST["searchBar"])){
    
            if($_POST["searchBar"] == ""){
    
                $users = GetUsersWithBirthdayToday($filterLanguageId);
            }
            else{
    
                $filterName = $_POST["searchBar"];
    
                $users = GetUsersWithBirthdayTodayWithFilterName($filterName, $filterLanguageId);
            }
    
        }
        else{
    
            $users = GetUsersWithBirthdayToday($filterLanguageId);   
        }

    
        for($i = 0; $i < count($users); $i++){
            $output .= '<a style="text-decoration: none; color: black;" href="index.php?uc=userProfile&action=show&Id=' . $users[$i]['Id'] . '"><div id="user">';
            $output .= '   <img id="profile_picture" src="assets/medias/pfp/' . $users[$i]['Photo'] . '" alt="image de profil" />';
            $output .= '   <p>' . $users[$i]['Firstname'] . " " . $users[$i]['Lastname'] . '</p>';
            $output .= '</div></a>';
        }
    }

    return $output;
}

function GetUserById($id)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `id`=:ID';

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':ID', $id, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetRandomUser(){
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` ORDER BY RAND() LIMIT 1';

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetAllPublicReceivedMessagesForUserById($id){
    try {

        static $ps = null;

        if($_GET['uc'] == "profile"){
            $sql = 'SELECT * FROM `Messages` WHERE `CreatedFor`=:ID';
        }
        else{
            $sql = 'SELECT * FROM `Messages` WHERE `CreatedFor`=:ID AND `isPrivate`=0';
        }
        

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':ID', $id, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return DisplayMessagesForUser($answer);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetAllSentMessagesFromUserById($id){
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Messages` WHERE `CreatedBy`=:ID';

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':ID', $id, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return DisplayMessagesForUser($answer);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function DisplayMessagesForUser($answer){

    $output = "";

    for($i = 0; $i < count($answer); $i++){

        $sender = GetUserById($answer[$i]['CreatedBy']);

        $privateStr = "";

        if($answer[$i]['IsPrivate']){
            $privateStr = "<i>(Privé) </i>";
        }

        $output .= '<div id="message">';
        $output .= '    <img id="profile_picture" src="assets/medias/pfp/' . $sender['Photo'] .  '" alt="image de profil"/>';
        $output .= '    <div>';
        $output .= '        <p>' . $privateStr . $answer[$i]['Text'] .'</p>';
        $output .= '        <div id="interaction">';
        $output .= '            <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like"/>';
        $output .= '            <p>0</p>';
        $output .= '        </div>';
        $output .= '        <div id="comments">';
        $output .= '            <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>';
        $output .= '            <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>';
        $output .= '            <textarea></textarea>';
        $output .= '            <button id="sendCommentButton">Envoyer</button>';
        $output .= '        </div>';
        $output .= '    </div>';
        $output .= '</div>';
    }
    return $output;
}