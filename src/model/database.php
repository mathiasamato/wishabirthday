<?php 
//Contains the function that establishes a PDO connection with the database
function dbConnect()
{

  static $connector = null;

  if ($connector == null) { //If no PDO instance has been created, then we create one. $connector is static, which means that the same PDO instance will always be used, instead of creating a new one each time the function is called
    try {

      $connector = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DBNAME, DBUSER, PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_PERSISTENT => true
      ));
    } catch (PDOException $Exception) { //If there's an error, we display its message and its code

      error_log($Exception->getMessage());
      error_log($Exception->getCode());
    };
  }
  $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  return $connector; //Return the PDO connection
}
?>