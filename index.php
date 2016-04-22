<?php

session_start();

// if(!$_SESSION['name']){
//   header("Location: login.php");
// }

?>


  <?php include "head.php"; ?>
  <div class="container-fluid">
    <h1><?php echo "Hello, ".$_SESSION['name']; ?></h1>
  </div>


  </body>
</html>
