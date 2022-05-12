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

if(!isset($_SESSION['loadmore'])){ //The session that will display the errors
    $_SESSION['loadmore'] = false;
}

if(!isset($_SESSION['messageLimit'])){ //The session that will display the errors
    $_SESSION['messageLimit'] = 5;
}

if(!isset($_SESSION['error'])){ //The session that will display the errors
    
    $_SESSION['error'] = "";
}

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

require "assets/constants.inc.php";
require 'model/database.php'; //Connection to PDO
require 'model/functions.inc.php'; //All useful functions

switch($uc){
    case 'home': //Home page

        $_SESSION['error'] = "";

        if(!$_SESSION['loadmore']){
            $_SESSION['messageLimit'] = 5;
        }
        else{
            $_SESSION['loadmore'] = false;
        }

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

        require 'controller/profileController.php';

        break;

    case 'message':

        require 'controller/messageController.php';

        break;

    case 'interaction':

        require 'controller/interactionController.php';

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