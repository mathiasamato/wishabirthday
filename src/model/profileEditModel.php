<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

    static $ps = null;
    $sql = 'UPDATE `Users` ';
    $sql .= 'SET `Firstname`=:FIRSTNAME, `Lastname`=:LASTNAME, `DoB`=:BIRTHDATE, `LanguageId`=:LANGUAGEID';
    if($_POST['newPassword'] != "" && $_POST['newConfirmPassword'] != ""){ //If the user wants to edit the password

        $sql .= ', `Password`=:PWD';

    }
    if(isset($_SESSION['FileNameWithRandomString'])){ //Check if the file exists

        $sql .= ', `Picture`=:PICTURE';

    }

    $sql .=  ' WHERE `Id`=:ID';

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    $pwdsha1 = sha1($_POST['newPassword']); //Hash the password entered by the user
   
    $ps->bindParam(':FIRSTNAME', $_POST['newFirstname'], PDO::PARAM_STR); //Complete the prepare statement will all the new informations (or the current ones if untouched)
    $ps->bindParam(':LASTNAME', $_POST['newLastname'], PDO::PARAM_STR);
    $ps->bindParam(':BIRTHDATE', $_POST['newDateBirth']);
    $ps->bindParam(':LANGUAGEID', $_POST['NewLanguageSelect'], PDO::PARAM_INT);
    $ps->bindParam(':ID', $_SESSION['connectedUserId'], PDO::PARAM_INT);

    if(isset($_SESSION['FileNameWithRandomString'])){ //Check if the file exists
       
        $ps->bindParam(':PICTURE', $_SESSION['FileNameWithRandomString'], PDO::PARAM_STR);

    }

    if($_POST['newPassword'] != "" && $_POST['newConfirmPassword'] != ""){ //If the user wants to edit the password

        $ps->bindParam(':PWD', $pwdsha1, PDO::PARAM_STR);

    }

    if ($ps->execute()){ //Execute the prepare statement

        header("Location: index.php?uc=profile&action=showuser&Id=" . $_SESSION['connectedUserId']);
        exit;
        
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}