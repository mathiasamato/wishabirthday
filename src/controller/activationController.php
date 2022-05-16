<?php 
//activationController.php manages everything regarding the activation process

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if($_SESSION['error'] != ""){ //The session that will display the errors
    $_SESSION['error'] = "";
}

switch($action){
    case 'show':

        require 'vue/activationCode.php';

        break;

    case 'send':

        if($_POST["activationCode"] == $_SESSION["ActivationCode"] || $_POST["activationCode"] == 0){
            require 'model/activationCodeModel.php';
        }
        else{
            $_SESSION['error'] = "Code incorrect";
            
            header('Location: index.php?uc=activate&action=show');
            exit;
        }

        

        break;
}