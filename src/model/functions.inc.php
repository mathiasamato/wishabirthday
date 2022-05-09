<?php

function GetUsersWithBirthdayToday($filterLanguageId)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE MONTH(`DoB`)=MONTH(CURRENT_DATE()) AND DAY(`DoB`)=DAY(CURRENT_DATE()) AND `LanguageId`=:LANGUAGEID '; //Get users that celebrate their birthday and that have the language filter matching their language

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }

        $answer = false;

        $ps->bindParam(':LANGUAGEID', $filterLanguageId, PDO::PARAM_STR); //Language choosen by the user

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
        //Get users that celebrate their birthday, that have the language filter matching their language and the name in the search bar matching their name
        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }

        $answer = false;

        $ps->bindParam(':FILTERTEXT', $filterName, PDO::PARAM_STR); //Text entered by the user
        $ps->bindParam(':LANGUAGEID', $filterLanguageId, PDO::PARAM_STR); //Language choosen by the user

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

    if(isset($_POST["languageSelect"])){ //If the language filter is set (it should)

        $filterLanguageId = $_POST["languageSelect"]; //Set the local variable to the language choosen by the user

        if(isset($_POST["searchBar"])){ //If the search bar is set
    
            if($_POST["searchBar"] == ""){ //If the search bar is empty so the user didn't filter by name
    
                $users = GetUsersWithBirthdayToday($filterLanguageId);
            }
            else{ //Otherwise, filter user by both the language and the name
    
                $filterName = $_POST["searchBar"];
    
                $users = GetUsersWithBirthdayTodayWithFilterName($filterName, $filterLanguageId);
            }
    
        }
        else{
    
            $users = GetUsersWithBirthdayToday($filterLanguageId);   
        }

    
        for($i = 0; $i < count($users); $i++){ //Generate the HTML to display
            $output .= '<a style="text-decoration: none; color: black;" href="index.php?uc=userProfile&action=show&Id=' . $users[$i]['Id'] . '"><div id="user">';
            $output .= '   <img id="profile_picture" src="assets/medias/pfp/' . $users[$i]['Photo'] . '" alt="image de profil" />';
            $output .= '   <p>' . $users[$i]['Firstname'] . " " . $users[$i]['Lastname'] . '</p>';
            $output .= '</div></a>';
        }
    }
    else{ //Error message if for some reason, the language filter fails

        $output = '<p style="color: red;">Une erreur est survenue. Recharger la page peut régler le problème.</p>';
    }

    return $output;
}

function GetUserById($id)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `id`=:ID'; //Select the user with the id in database matching the id passed in a parameter

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':ID', $id, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0]; //Return directly the informations and not an array with only one index

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

        if($_GET['uc'] == "profile"){ //If it's your own profile, show all your messages regardless of if they are private or public
            $sql = 'SELECT * FROM `Messages` WHERE `CreatedFor`=:ID';
        }
        else{ //If it's someone else's profile, show all their public messages
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

        return DisplayMessagesForUser($answer); //Display the message


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetAllSentMessagesFromUserById($id){ //Show all messages sent by the user
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

    for($i = 0; $i < count($answer); $i++){ //Loop through all the messages

        $sender = GetUserById($answer[$i]['CreatedBy']); //Get the user that sent the message

        $privateStr = "";

        if($answer[$i]['IsPrivate']){ //If the message is private, show a "(Privé)" before the message
            $privateStr = "<i>(Privé) </i>";
        }

        $output .= '<div id="message">'; //Generate the HTML to display
        $output .= '    <img id="profile_picture" src="assets/medias/pfp/' . $sender['Photo'] .  '" alt="image de profil"/>';
        $output .= '    <div>';
        $output .= '        <p>' . $privateStr . $answer[$i]['Text'] .'</p>';
        $output .= '        <div id="interaction">';
        $output .= '            <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like"/>';
        $output .= '            <p>0</p>';
        $output .= '        </div>';
        $output .= '        <div id="comments">';
        $output .= '            <form method="POST" action="index.php?uc=sendComment">';
        $output .= '                <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>';
        $output .= '                <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>';
        $output .= '                <textarea placeholder="Ajouter un commentaire" name="CommentTextArea"></textarea>';
        $output .= '                <input type="submit" id="sendCommentButton">';
        $output .= '            </form>';
        $output .= '        </div>';
        $output .= '    </div>';
        $output .= '</div>';
    }
    return $output;
}

function GetAndDisplay10LastPublicMessagesSent(){
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Messages` WHERE `IsPrivate`=0 ORDER BY `CreatedOn` DESC LIMIT 10';

        if ($ps == null) {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        $output = '';

        for($i = 0; $i < count($answer); $i++){ //Generate the HTML to display

            $sender = GetUserById($answer[$i]['CreatedBy']);

            $output .= '<div id="message">';
            $output .= '    <img id="profile_picture" src="assets/medias/pfp/' . $sender['Photo'] . '" alt="image de profil" />';
            $output .= '    <div>';
            $output .= '        <p style="height: 6vh; margin-top: 25px; font-size: 25px;">' . $answer[$i]['Text'] . '</p>';
            $output .= '        <div id="interaction">';
            $output .= '            <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like" />';
            $output .= '            <p>0</p>';
            $output .= '        </div>';
            $output .= '        <p style="height: 6vh; font-size: 20px; color: gray;">' . $answer[$i]['CreatedOn'] . '</p>';
            $output .= '    </div>';
            $output .= '</div>';
        }
        
        
        return $output;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}