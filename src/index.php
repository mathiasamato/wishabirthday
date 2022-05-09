<?php 

/*
Author : Mathias Amato
Date : 18.05.2022
Name of the project : Wish A Birthday
Description : Wish A Birthday is a social media aimed at wishing people happy birthday. You can choose whose to send the message or send the message to a random user having their birthday that same day.
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$uc = !isset($_GET['uc']) ? "home" : $_GET['uc']; //The thing to display to the user

if(!isset($_COOKIE['connectedUserId']) && !isset($_SESSION['connectedUserId'])){ //If the user isn't connected

    require 'vue/headerNotConnected.php';

    if($uc != "signup" && $uc != "activate"){
        $uc = "login";
        $action = "show";
    }
    
}
else if(isset($_COOKIE['connectedUserId']) || isset($_SESSION['connectedUserId'])){


    if(isset($_COOKIE['connectedUserId'])){

        $_SESSION['connectedUserId'] = $_COOKIE['connectedUserId']; //If the connected user is saved in a cookie, save these infos on a session each time the user opens the web page, so it's easier to use them later

    }

    require 'vue/headerConnected.php';

}

require 'model/database/database.php'; //Connection to PDO
require 'model/functions.inc.php'; //All useful functions



switch($uc){
    case 'home': //Home page

        unset($_SESSION['error']); //Delete the session so if the user leaves the page login or signup while an error is displayed, it won't show up again when the user returns to one of these pages

        if(!isset($_POST["languageSelect"]) && !isset($_POST["searchBar"])){
            $_POST["languageSelect"] = 1;
            $_POST["searchBar"] = "";
        }

        require 'vue/home.php';
        
        break;

    case 'signup': //Sign up page

        require 'controller/signupController.php';

        break;

    case 'login': //Log in page

        require 'controller/loginController.php';

        break;
    
    case 'activate': //When the user clicks on the activation link sent by email

        require 'controller/activationController.php';

        break;

    case 'profile': //profile page

        unset($_SESSION['error']);

        require 'vue/ownProfile.php';

        break;

    case 'userProfile':

        unset($_SESSION['error']);

        $_SESSION["userInfos"] = GetUserById($_GET['Id']);

        if($_GET['Id'] == $_SESSION['connectedUserId']){
            
            header("Location: index.php?uc=profile&Id=" . $_GET['Id']);
            exit();

        }
        else{
            require 'vue/userProfile.php';
        }

        

        break;

    case 'message':

        require 'controller/messageController.php';

        break;
    
    case 'disconnect': //When the user wants to disconnect

        session_unset();

        setcookie("connectedUserId", "", time() - 3600, "/");

        header("Location: index.php?uc=home");
        exit();

        break;
    
    default: //If a page doesn't exist, it displays a 404 error

        require 'vue/404.php';

        break;
}

require 'vue/footer.php';
?>