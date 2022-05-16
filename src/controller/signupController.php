<?php 
//loginController.php manages everything regarding the sign up process

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if($_SESSION['error'] != ""){ //The session that will display the errors
    $_SESSION['error'] = "";
}

if(!isset($_SESSION['userInfos'])){
    $_SESSION['userInfos'] = [];
}

switch($action){
    case 'show': //Display the form

        if(!isset($_SESSION['userInfos']['Lastname'])){ //Allows to make a sticky form
            $_SESSION['userInfos']['Lastname'] = "";
        }
        if(!isset($_SESSION['userInfos']['Firstname'])){
            $_SESSION['userInfos']['Firstname'] = "";
        }
        if(!isset($_SESSION['userInfos']['Email'])){
            $_SESSION['userInfos']['Email'] = "";
        }
        if(!isset($_SESSION['userInfos']['DoB'])){
            $_SESSION['userInfos']['DoB'] = "";
        }
        if(!isset($_SESSION['userInfos']['Language'])){
            $_SESSION['userInfos']['Language'] = "";
        }

        require 'vue/signup.php';
        break;

    case 'send': //Verify the data and then send it to the database

        if($_POST['Password'] != $_POST['ConfirmPassword']){ //If the password and the confirmation password are differents

            $_SESSION['error'] = "Les mots de passe ne correspondent pas.";

        }
        else if(strlen($_POST['Password']) < 6){ //If the length of the password is inferior to 6

            $_SESSION['error'] = "Le mot de passe doit faire au moins 6 caractères";

        }

        if($_SESSION['error'] == ""){ //If there's no error

            $_SESSION['ActivationCode'] = rand(100000, 999999);

            require 'model/uploadMedia.php';
        }
        else{ //Otherwise, send the user back to the form with the error displaying

            $_SESSION['userInfos']['Lastname'] = $_POST['Lastname']; //Save informations to make the form sticky
            $_SESSION['userInfos']['Firstname'] = $_POST['Firstname'];
            $_SESSION['userInfos']['Email'] = $_POST['Email'];
            $_SESSION['userInfos']['DoB'] = $_POST['DoB'];

            header('Location: index.php?uc=signup&action=show');
            exit();
        }

        break;
    
    default:

        header('Location: index.php?uc=404');
        exit;

        break;
}

?>