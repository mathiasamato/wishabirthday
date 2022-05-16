<?php 
//messageRandomModel.php sends a message entered by an user, to a random person on the website

try {

    static $ps = null;
    $sql = 'INSERT INTO `Messages` (`CreatedBy`, `CreatedFor`, `Text`, `IsPrivate`, `LanguageId`)';
    $sql .= 'VALUES(:CREATEDBY, :CREATEDFOR, :TEXT, :ISPRIVATE, :LANGUAGEID);';

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    //FIELDS TO FILTER

    $connectedUser = GetUserById($_SESSION['connectedUserId']); //Get the user with the corresponding id

    $randomUser = GetRandomUser(); //Get one random user

    while($connectedUser['Id'] == $randomUser['Id']){  //Make sure that the sender is not the same as the receiver

        $randomUser = GetRandomUser();

    }

    $isPrivate = 0;

    if(isset($_POST['IsPrivate'])){
        $isPrivate = 1;
    }

    $ps->bindParam(':CREATEDBY', $connectedUser['Id'], PDO::PARAM_STR); //Bind all the parameters
    $ps->bindParam(':CREATEDFOR', $randomUser['Id'], PDO::PARAM_STR);
    $ps->bindParam(':TEXT', $_POST['TextToSendToRandomUser'], PDO::PARAM_STR);
    $ps->bindParam(':ISPRIVATE', $isPrivate);
    $ps->bindParam(':LANGUAGEID', $connectedUser['LanguageId']);

    if ($ps->execute()){ //Execute the prepare statement and send a validation email

        header('Location: index.php?uc=home');
        exit;
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}