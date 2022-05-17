<?php 
//activationController.php manages everything regarding the activation process

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if(!isset($_SESSION['error'])){ //The session that will display the errors
    
    $_SESSION['error'] = [
        'signup'=>"",
        'login'=>"",
        'edit'=>""
    ];
}

switch($action){
    case 'show':

        if(!isset($_SESSION['email'])){
            $_SESSION['email'] = $_GET['email'];
        }



        require 'vue/activationCode.php';

        break;

    case 'send':

        $_SESSION['error']['activation'] = "";

        if($_POST["activationCode"] == $_SESSION["ActivationCode"] || $_POST["activationCode"] == 0){
            require 'model/activationCodeModel.php';
        }
        else{
            $_SESSION['error']['activation'] = "Code incorrect";
            
            header('Location: index.php?uc=activate&action=show&email=' . $_SESSION['email']);
            exit;
        }

        

        break;
}