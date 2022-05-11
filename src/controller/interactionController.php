<?php 

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

switch($action){
    case "comment":

        require 'model/addCommentModel.php';

        break;

    case "like":

        if(!CheckIfUserHasNotLikedTheMessage()){
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