<?php

class User{

  private $db;
  public $name;
  public $password;

  function __construct($name,$pass){

    $this->name = $name;
    $this->password = $pass;
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
