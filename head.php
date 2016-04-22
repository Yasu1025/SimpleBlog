<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">
        タイトル
      </a>
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li>
            <?php
              if(!$_SESSION["name"]){
                echo "<a href='login.php'>Log in</a>";
              }else{
                echo "<a href='logout.php'>Log out</a>";
              }
            ?>
          </li>
          <li><a href="signup.php">signup</a></li>
        </ul>
      </div>
    </nav>
