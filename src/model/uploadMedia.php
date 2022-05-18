<?php
//uploadMedia.php verifies that a profile picture is valid before adding it
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_FILES['ProfilePicture']['name'] == "") { //If there is no file waiting for upload, skip the upload 

    if($_GET['uc'] == "signup"){

        require 'model/signupModel.php';
    }
    else if($_GET['uc'] == "profile"){

        require 'model/profileEditModel.php';
    }
    
}

$acceptedMimes = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg'); //Array of all accepted accepted mimes

$fileSize = $_FILES['ProfilePicture']['size'];

if ($fileSize > MAX_FILE_SIZE) { //Check that the uploaded file is under the max authorised file

    $_SESSION['error']['edit'] = "Le fichier est trop gros. Le maximum autorisé est 3MB. \n";
}

if (!in_array($_FILES['ProfilePicture']['type'], $acceptedMimes)) { //If the mime of the uploaded file is not in the array of accepted mimes

    $_SESSION['error']['edit'] = "Uniquement des fichiers .png, .jpg, .jpeg ou .gif sont autorisés.\n";
}

if ($_SESSION['error']['edit'] == "") { //If everything went alright

    $folder = 'assets/medias/pfp/'; //The folder where the file is going to be uploaded

    $_SESSION['FileNameWithRandomString'] = uniqid() . "-" . $_FILES['ProfilePicture']['name']; //Add a unique string before the file name so there will never be two files with the exact same name

    if (move_uploaded_file($_FILES['ProfilePicture']['tmp_name'], $folder . $_SESSION['FileNameWithRandomString'])) { //Upload to the folder

        echo "Upload effectué avec succès !";

        if($_GET['uc'] == "signup"){ //if the user has set a profile picture during the sign up process

            require 'model/signupModel.php';
        }
        else if($_GET['uc'] == "profile"){ //if the user has set a profile picture during the edit of the user's profile
    
            require 'model/profileEditModel.php';
        }

    } else {

        $_SESSION['error']['edit'] = "Echec de l\'upload ! \n" . $_FILES["ProfilePicture"]["error"];
        
        $_SESSION['error']['signup'] = $_SESSION['error']['edit'];
        
    }
} 
else {

    $_SESSION['error']['signup'] = $_SESSION['error']['edit'];

}

if($_GET['uc'] == "signup"){ //if the user has set a profile picture during the sign up process
    
    $_SESSION['userInfos']['Lastname'] = $_POST['Lastname']; //Save informations to make the form sticky
    $_SESSION['userInfos']['Firstname'] = $_POST['Firstname'];
    $_SESSION['userInfos']['Email'] = $_POST['Email'];
    $_SESSION['userInfos']['DoB'] = $_POST['DoB'];

    header('Location: index.php?uc=signup&action=show');
    exit;
}
else if($_GET['uc'] == "profile"){ //if the user has set a profile picture during the edit of the user's profile

    $_SESSION['userInfos']['Lastname'] = $_POST['newLastname']; //Save informations to make the form sticky
    $_SESSION['userInfos']['Firstname'] = $_POST['newFirstname'];
    $_SESSION['userInfos']['Email'] = $_POST['newEmail'];
    $_SESSION['userInfos']['DoB'] = $_POST['newDateBirth'];

    //header('Location: index.php?uc=profile&action=edit');
    exit;
}
