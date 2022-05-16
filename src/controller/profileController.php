<?php 
//profileController.php manages everything regarding the profile (our own profile, user profile, profile edit)

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if(!isset($_SESSION['newUserInfos'])){
    $_SESSION['newUserInfos'] = GetUserById($_SESSION['connectedUserId']);
}

if(!isset($_SESSION['userInfos'])){
    $_SESSION['userInfos'] = [];
}

if($_SESSION['error'] != ""){ //The session that will display the errors
    $_SESSION['error'] = "";
}

if(!isset($_SESSION['connectedUserId'])){ //Checks if the user is connected

    header("Location: index.php?uc=404");
    exit();

}
else{

    $_SESSION['userInfos'] = GetUserById($_SESSION['connectedUserId']);

}

switch($action){
    case 'showown':

        unset($_SESSION['newUserInfos']);

        if(!$_SESSION['loadmore']){
            $_SESSION['messageLimit'] = 5;
        }
        else{
            $_SESSION['loadmore'] = false;
        }

        require 'vue/ownProfile.php';

        break;

    case 'showuser':

        if(!$_SESSION['loadmore']){
            $_SESSION['messageLimit'] = 5;
        }
        else{
            $_SESSION['loadmore'] = false;
        }

        $_SESSION["userInfos"] = GetUserById($_GET['Id']);

        if($_GET['Id'] == $_SESSION['connectedUserId']){
            
            header("Location: index.php?uc=profile&action=showown&Id=" . $_GET['Id']);
            exit();

        }
        else{
            require 'vue/userProfile.php';
        }

        break;

    case 'edit':

        require 'vue/profileEdit.php';

        break;
    
    case 'editconfirm':

        $pwdIsModified = false;

        $currentRightPassword = GetUserById($_SESSION['connectedUserId'])['Password']; //The password currently saved in the db
        $currentPassword = sha1($_POST['currentPassword']); //The password written in the input to edit the informations

        if($currentPassword != ""){ //If the user didn't write a password to save the modified informations

            if($currentPassword === $currentRightPassword){ //If the user wrote their correct password to save the modified informations
                
                if($_POST['newPassword'] != ""){ //If a new password has been submitted

                    $pwdIsModified = true;

                    if($_POST['newPassword'] != $_POST['newConfirmPassword']){ //If the new password and the confirmation password are differents

                        $_SESSION['error'] = "Les mots de passe ne correspondent pas";

                    }
                    else if(strlen($_POST['newPassword']) < 6){ //If the length of the new password is inferior to 6

                        $_SESSION['error'] = "Le mot de passe doit faire au moins 6 caractères";

                    }
                }
            }
            else{
                $_SESSION['error'] = "Votre mot de passe actuel est incorrect";

            }
        }
        else{

            $_SESSION['error'] = "Veuillez indiquer votre mot de passe actuel pour sauvegarder les nouvelles informations";
        }

        if($_SESSION['error'] == ""){ //If there's no error

            require 'model/uploadMedia.php';

        }
        else{ //Otherwise, send the user back to the form with the error displaying

            $_SESSION['newUserInfos']['Lastname'] = $_POST['newLastname']; //Save informations to make the form sticky
            $_SESSION['newUserInfos']['Firstname'] = $_POST['newFirstname'];
            $_SESSION['newUserInfos']['Birthdate'] = $_POST['newDateBirth'];

            header('Location: index.php?uc=profile&action=edit');
            exit;
        }

        break;

    default:

        header('Location: index.php?uc=404');
        exit;

        break;
}
?>