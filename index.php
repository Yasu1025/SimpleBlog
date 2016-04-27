<?php
require_once("config.php");


$user =unserialize($_SESSION['user']);
?>


  <?php include "head.php"; ?>
  <div class="container-fluid">
    <h1><?php echo "Hello, ".$user->getName(); ?></h1>
  </div>


  </body>
</html>
