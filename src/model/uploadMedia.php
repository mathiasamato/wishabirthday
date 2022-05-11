<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_FILES['ProfilePicture'])) { //If there is no file waiting for upload, acts as a security

    require 'model/signupModel.php';

    var_dump("NO IMAGE");

}

$acceptedMimes = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg'); //Array of all accepted accepted mimes
define("MAX_FILE_SIZE", 3 * 1024 * 1024); //Max uploadable file

$fileSize = $_FILES['ProfilePicture']['size'];

$_SESSION['error'] = ""; //The error output

if ($fileSize > MAX_FILE_SIZE) { //Check that the uploaded file is under the max authorised file

    $_SESSION['error'] = "Le fichier est trop gros. Le maximum autorisé est 3MB. \n";
}

if (!in_array($_FILES['ProfilePicture']['type'], $acceptedMimes)) { //If the mime of the uploaded file is not in the array of accepted mimes

    $_SESSION['error'] = "Uniquement des fichiers .png, .jpg, .jpeg ou .gif sont autorisés.\n";
}

if ($_SESSION['error'] == "") { //If everything went alright

    $folder = 'assets/medias/pfp/'; //The folder where the file is going to be uploaded

    $_SESSION['FileNameWithRandomString'] = uniqid() . "-" . $_FILES['ProfilePicture']['name']; //Add a unique string before the file name so there will never be two files with the exact same name

    if (move_uploaded_file($_FILES['ProfilePicture']['tmp_name'], $folder . $_SESSION['FileNameWithRandomString'])) { //Upload to the folder

        echo "Upload effectué avec succès !";

        require 'model/signupModel.php';

    } else {

        $_SESSION['error'] = "Echec de l\'upload ! \n" . $_FILES["ProfilePicture"]["error"];
    }
} 
else {
    header('Location: index.php?uc=profile&action=show');
    exit;
}
