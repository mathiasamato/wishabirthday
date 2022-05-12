<?php 

//Connection to database, used in database.php
define("HOSTNAME", "localhost");
define("DBNAME", "wab_db");
define("DBUSER", "wab_admin");
define("PASSWORD", "Super1213");

define("MAX_FILE_SIZE", 3 * 1024 * 1024); //Max uploadable file, used in uploadMedia.php

define("DAYS_UNTIL_COOKIE_EXPIRES", 30); //used in loginModel.php
?>