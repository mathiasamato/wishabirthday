<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DAYS_UNTIL_COOKIE_EXPIRES", 30);

try {

    static $ps = null;
    $sql = "SELECT * FROM `Users` WHERE `Email`=:EMAIL AND `Password`=:PWD";

    if ($ps == null) { //if the ps variable is null, it means that the prepare statement has not been set yet
        $ps = dbConnect()->prepare($sql); //prepare the sql query
    }
    $answer = false;

    $pwdsha1 = sha1($_POST['Password']); //Hash the password entered by the user

    $ps->bindParam(':EMAIL', $_POST['Email'], PDO::PARAM_STR); //Complete the prepare statement with the email entered by the user and the hashed password
    $ps->bindParam(':PWD', $pwdsha1, PDO::PARAM_STR);

    if ($ps->execute()){ //Execute the prepare statement
        $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    if($answer){

        if($answer[0]["ActivationCode"] != 0){ //If the user is not yet verified, write an error message
            $_SESSION['error'] = "Vous n'avez pas activé votre compte ! Veuillez vérifier vos mails.";

            header("Location: index.php?uc=login&action=show");
            exit();
        }

        if(isset($_POST['rememberMeCheckbox'])){ //If the user clicked on "remember me", create a cookie that lasts 30 days, otherwise it just creates a cookie
            setcookie("connectedUserId", $answer[0]["Id"], time() + (86400 * DAYS_UNTIL_COOKIE_EXPIRES), "/"); //86400 seconds is 1 day, it allows to put the real number of days without having to calculate
        }
        else{
            $_SESSION['connectedUserId'] = $answer[0]["Id"];
        }

        header("Location: index.php?uc=home");
        exit();

    }
    else{ //If no user was found, write an error message

        $_SESSION['error'] = "Votre email ou mot de passe est incorrect, veuillez réessayer.";

        header("Location: index.php?uc=login&action=show");
        exit();
        
    }

}catch(PDOException $e){
    echo $e->getMessage();
}
?>