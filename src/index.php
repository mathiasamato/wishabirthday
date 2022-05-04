<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'model/database/database.php'; //Connection to PDO
require 'model/functions.inc.php'; //All useful functions

$uc = !isset($_GET['uc']) ? "home" : $_GET['uc']; //The thing to display to the user

require 'vue/headerNotConnected.php';

switch($uc){
    case 'home': //Home page

        unset($_SESSION['error']); //Delete the session so if the user leaves the page login or signup while an error is displayed, it won't show up again when the user returns to one of these pages
        require 'vue/home.php';
        
        break;

    case 'signup': //Sign up page

        unset($_SESSION['error']);
        require 'controller/signupController.php';

        break;

    case 'login': //Log in page

        break;
    
    case 'activate': //When the user clicks on the activation link sent by email

        require 'controller/activationController.php';

        break;

    case 'search': //search page

        break;

    case 'profile': //profile page

        require 'vue/ownProfile.php';

        break;

    case 'userProfile':
        require 'vue/userProfile.php';

        break;

    case 'message': //message page

        break;
    
    case 'disconnect': //When the user wants to disconnect

        break;
    
    default: //If a page doesn't exist, it displays a 404 error

        require 'vue/404.php';

        break;
}

require 'vue/footer.php';
?>