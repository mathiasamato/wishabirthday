<?php 
//interactionController.php manages all interactions that the user can do on the website

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if(!isset($_SESSION['error'])){ //The session that will display the errors
    
    $_SESSION['error'] = [
        'signup'=>"",
        'login'=>"",
        'edit'=>"",
        'activation'=>""
    ];
}

switch($action){
    case "comment":

        require 'model/addCommentModel.php';

        break;

    case "like":

        if(!CheckIfUserHasLikedTheMessage()){
            require 'model/addLikeModel.php';
        }
        else{
            require 'model/removeLikeModel.php';
        }

        break;

    case "loadmore":

        $_SESSION['loadmore'] = true;
        $_SESSION['messageLimit'] += 5;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;

        break;
}

?>