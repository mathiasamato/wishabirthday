<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

    static $ps = null;
    $sql = 'INSERT INTO `Users` (`Lastname`, `Firstname`, `Email`, `DoB`, `Password`, `LanguageId`, `ActivationCode`)';
    $sql .= 'VALUES(:LASTNAME, :FIRSTNAME, :EMAIL, :DATEBIRTH, :PWD, :LANGUAGE, :CODE);';

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    //FIELDS TO FILTER

    $pwdsha1 = sha1($_POST['Password']); //Hash the password entered by the user

    $ps->bindParam(':FIRSTNAME', $_POST['Firstname'], PDO::PARAM_STR); //Bind all the parameters, in this case the user's informations
    $ps->bindParam(':LASTNAME', $_POST['Lastname'], PDO::PARAM_STR);
    $ps->bindParam(':EMAIL', $_POST['Email'], PDO::PARAM_STR);
    $ps->bindParam(':DATEBIRTH', $_POST['DoB']); 
    $ps->bindParam(':PWD', $pwdsha1, PDO::PARAM_STR);
    $ps->bindParam(':LANGUAGE', $_POST['Language']);
    $ps->bindParam(':CODE', $_SESSION['ActivationCode']);

    if ($ps->execute()){ //Execute the prepare statement and send a validation email
        require 'sendEmail.php';
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}