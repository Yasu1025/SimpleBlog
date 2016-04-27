<?php

require_once("config.php");
$user =unserialize($_SESSION['user']);

if(!$user->logged_in()){
  header("Location:signup.php");
}else{
  header("Location:login.php");
  $_SESSION["loggedin"] = false;
  $_SESSION[] = array();

  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  $session_destroy();

}


?>
