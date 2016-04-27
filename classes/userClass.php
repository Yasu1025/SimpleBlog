<?php

class User{

  private $db;
  private $name;
  private $password;

  function __construct($name,$pass){
    $this->name = $name;
    $this->password = $pass;
  }

  public function getName(){
    return $this->name;
  }
  public function getPass(){
    return $this->password;
  }


  public function logged_in(){
    if(isset($_SESSION["loggedin"])){
      return true;
    }
  }

  public function login(){
    $_SESSION["loggedin"] = true;
    return true;
  }


}

 ?>
