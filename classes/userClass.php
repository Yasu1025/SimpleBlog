<?php

session_start();

//  DB Infomation
define("db_host", "localhost");
define("db_name", "login_db");
define("db_user", "root"); // user@localhost
define("db_pass", "root"); // login123

$pdo = new PDO("mysql:host=".db_host.";dbname=".db_name.";charset=utf8", db_user, db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // to get error as an exception
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // to turn off emulation

date_default_timezone_set('Canada/Pacific');

function h($t){
  return htmlspecialchars($t, ENT_QUOTES);
}


 ?>
