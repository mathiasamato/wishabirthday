<?php 
$action = filter_input(INPUT_GET, "action"); //What is the thing to do

$action = !isset($_GET['action']) ? "show" : $_GET['action']; //The thing to display to the user

/*if($_SESSION['error'] != ""){ //The session that will display the errors
    $_SESSION['error'] = "";
}*/

if(!isset($_SESSION['userInfos'])){
    $_SESSION['userInfos'] = [];
}

switch($action){
    case 'show':

        if(!isset($_SESSION['userInfos']['email'])){ //Allows to make a sticky form

            $_SESSION['userInfos']['email'] = "";
        }

        require 'vue/login.php';

        break;

    case 'send':

        $_SESSION['userInfos']['email'] = $_POST['Email'];

        require 'model/loginModel.php';

        break;

    default:

        header('Location: index.php?uc=404');
        exit();

        break;
}
?>