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

    $randomUser = GetRandomUser(); //Get one random user

    while($connectedUser['Id'] == $randomUser['Id']){  //Make sure that the sender is not the same as the receiver

        $randomUser = GetRandomUser();

    }

    $randomUserId = $randomUser['Id']; //Get the id of that random user

    $isPrivate = 0;

    if(isset($_POST['IsPrivate'])){
        $isPrivate = 1;
    }

    $ps->bindParam(':CREATEDBY', $connectedUserId, PDO::PARAM_STR); //Bind all the parameters
    $ps->bindParam(':CREATEDFOR', $randomUserId, PDO::PARAM_STR);
    $ps->bindParam(':TEXT', $_POST['TextToSendToRandomUser'], PDO::PARAM_STR);
    $ps->bindParam(':ISPRIVATE', $isPrivate);

    if ($ps->execute()){ //Execute the prepare statement and send a validation email

        header('Location: index.php?uc=home');
        exit;
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}