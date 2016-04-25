<?php

require_once("config.php");
  try {

    $errName_msg = "";
    $errPass_msg ="";
    $errSame_msg = "";
    $success_msg = "";

    if(isset($_POST["submit"]) === true){

      $uName = (string)filter_input(INPUT_POST,"name");
      $uPass = (string)filter_input(INPUT_POST,"password");

      if($uName === "") $errName_msg = "Name must be required.";
      if($uPass === "") $errPass_msg = "Password must be required.";

      if($errName_msg === "" && $errPass_msg === ""){
        $stmt = $pdo->query("SELECT password FROM user WHERE name= '".$uName."'");
        $checkPass = $stmt->fetch(PDO::FETCH_ASSOC);

      if($uPass != $checkPass["password"]){
        $query = "INSERT INTO user(name, password) VALUES(?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(1, $uName, PDO::PARAM_STR);
        $stmt->bindValue(2, $uPass, PDO::PARAM_STR);
        $stmt->execute();
        $success_msg = "Hello, ".h($uName)."!! Your data has been inserted!!";
      }else{
        $errSame_msg =  "That Password is already taken...";
      }
} // $errName_msg == "" && $errPass_msg = ""

    }// end submit

  } catch (PDOException $e) {
    echo "Connection failed: ".$e->getMessage();
  }

?>


<?php include "head.php"; ?>

<div class="container-fluid">
  <div class="page_title">
    <h2>Sign up</h2>
  </div>
<?php if($errName_msg != "" || $errPass_msg != "" || $errSame_msg != "" ): ?>
  <div class="alert alert-danger">
    <ul>
      <?php if($errName_msg != "")echo "<li>$errName_msg</li>"; ?>
      <?php if($errPass_msg != "")echo "<li>$errPass_msg</li>"; ?>
      <?php if($errSame_msg != "")echo "<li>$errSame_msg</li>"; ?>
    </ul>
  </div>
<?php endif; ?>
<?php if($success_msg != ""): ?>
  <div class="">
    <p><?php echo $success_msg; ?></p>
  </div>
<?php endif; ?>
  <form action="" method="post">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
      <input class="form-control" type="text" name="name" placeholder="your name">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
      <input class="form-control" type="text" name="password" placeholder="your password">
    </div>
    <input class="btn btn-primary btn-lg center-block" type="submit" name="submit" value="Signup">
  </form>
</div>

  </body>
</html>
