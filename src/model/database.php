<?php 

function dbConnect()
{

  static $connector = null;

  if ($connector == null) {
    try {

      $connector = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DBNAME, DBUSER, PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_PERSISTENT => true
      ));
    } catch (PDOException $Exception) {

      error_log($Exception->getMessage());
      error_log($Exception->getCode());
    };
  }
  $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  return $connector;
}
?>