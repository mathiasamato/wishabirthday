<?php

//A COMMENTER

function GetUsersWithBirthdayToday($filterLanguageId)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE MONTH(`DoB`)=MONTH(CURRENT_DATE()) AND DAY(`DoB`)=DAY(CURRENT_DATE()) AND `LanguageId`=:LANGUAGEID ';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
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
        $sql = 'SELECT * FROM `Users` WHERE MONTH(`DoB`)=MONTH(CURRENT_DATE()) AND DAY(`DoB`)=DAY(CURRENT_DATE()) AND `Lastname` SOUNDS LIKE :FILTERTEXT OR `Firstname` SOUNDS LIKE :FILTERTEXT AND `LanguageId`=:LANGUAGEID';
        
        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
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

    $output = "";

    for($i = 0; $i < count($users); $i++){
        $output .= '<a style="text-decoration: none; color: black;" href="index.php?uc=userProfile&action=show&Id=' . $users[$i]['Id'] . '"><div id="user">';
        $output .= '   <img id="profile_picture" src="assets/medias/pfp/' . $users[$i]['Photo'] . '" alt="image de profil" />';
        $output .= '   <p>' . $users[$i]['Firstname'] . " " . $users[$i]['Lastname'] . '</p>';
        $output .= '</div></a>';
    }

    return $output;
}

function GetUserById($id)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `id`=:ID';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
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