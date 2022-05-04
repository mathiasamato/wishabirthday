<?php 

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if(!isset($_SESSION['error'])){ //The session that will display the errors
    $_SESSION['error'] = "";
}

switch($uc){
    case 'show':

        require 'vue/activationCode.php';

        break;

    case 'send':

        require 'model/activationCodeModel.php';

        break;
}