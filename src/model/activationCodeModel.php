<?php
// activationCodeModel.php will update the activation code in the databse to 0, which means that 
try {

    static $ps = null;
    $sql = "UPDATE `Users` SET `ActivationCode`=0 WHERE `ActivationCode`=:CODE"; //Activate the user's account

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    $ps->bindParam(':CODE', $_POST["activationCode"], PDO::PARAM_STR);

    if ($ps->execute()){ //Execute the prepare statement

        header('Location: index.php?uc=home');
        exit;
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
?>