<?php 
//loginController.php manages everything regarding the log in process

$action = filter_input(INPUT_GET, "action"); //What is the thing to do

$action = !isset($_GET['action']) ? "show" : $_GET['action']; //The thing to display to the user

if(!isset($_SESSION['userInfos'])){
    $_SESSION['userInfos'] = [];
}

if(!isset($_SESSION['error'])){ //The session that will display the errors
    
    $_SESSION['error'] = [
        'signup'=>"",
        'login'=>"",
        'edit'=>"",
        'activation'=>""
    ];
}

switch($action){
    case 'show':
        $_SESSION['error']['signup'] = "";

        if(!isset($_SESSION['userInfos']['email'])){ //Allows to make a sticky form

            $_SESSION['userInfos']['email'] = "";
        }

        require 'vue/login.php';

        break;

    case 'send':

        $_SESSION['error']['login'] = "";

        $_SESSION['userInfos']['email'] = $_POST['Email'];

        require 'model/loginModel.php';

        break;

    default:

        header('Location: index.php?uc=404');
        exit();

        break;
}
?>