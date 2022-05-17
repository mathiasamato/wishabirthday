<?php 
//loginController.php manages the sending of messages

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
    case "random":

        require 'model/messageRandomModel.php';

        break;

    case "target":

        require 'model/messageTargetModel.php';

        break;
}

?>