<?php 

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

if($_SESSION['error'] != ""){ //The session that will display the errors
    $_SESSION['error'] = "";
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