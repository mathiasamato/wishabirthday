<?php
//addLikeModel.php removes a like from an user to a message

try {

    static $ps = null;
    $sql = 'DELETE FROM Likes WHERE `MessageId`=:MESSAGEID'; //Activate the user's account

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    $ps->bindParam(':MESSAGEID', $_GET["messageid"], PDO::PARAM_STR);

    if ($ps->execute()){ //Execute the prepare statement

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;

    }


} catch (Exception $e) {
    echo $e->getMessage();
}
?>