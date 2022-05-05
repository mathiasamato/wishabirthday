<?php 
try {

    static $ps = null;
    $sql = 'INSERT INTO `Messages` (`CreatedBy`, `CreatedFor`, `Text`, `IsPrivate`)';
    $sql .= 'VALUES(:CREATEDBY, :CREATEDFOR, :TEXT, :ISPRIVATE);';

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    //FIELDS TO FILTER

    $connectedUser = GetUserById($_SESSION['connectedUserId']); //Get the user with the corresponding id

    $connectedUserId = $connectedUser['Id']; //Get the id of that selected user

    $isPrivate = 0;

    if(isset($_POST['IsPrivate'])){
        $isPrivate = 1;
    }

    $ps->bindParam(':CREATEDBY', $connectedUserId, PDO::PARAM_STR); //Bind all the parameters
    $ps->bindParam(':CREATEDFOR', $_SESSION["userInfos"]['Id'], PDO::PARAM_STR);
    $ps->bindParam(':TEXT', $_POST['TextToSendToTargetUser'], PDO::PARAM_STR);
    $ps->bindParam(':ISPRIVATE', $isPrivate);

    if ($ps->execute()){ //Execute the prepare statement and send a validation email

        header('Location: index.php?uc=home');
        exit;
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}