<?php 

$action= filter_input(INPUT_GET, "action"); //What is the thing to do

switch($action){
    case "random":

        require 'model/messageRandomModel.php';

        break;

    case "target":

        require 'model/messageTargetModel.php';

        break;
}

?>