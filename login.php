<?php

require_once("config.php");

try {
  //var_dump(date( "Y-m-d H:i" ));
  $errName_msg = "";
  $errPass_msg ="";
  $errno_msg = "";

if(isset($_POST["submit"]) === true){

  $uName = (string)filter_input(INPUT_POST,"name");
  $uPass = (string)filter_input(INPUT_POST,"password");

  if($uName === "") $errName_msg = "Name must be required.";
  if($uPass === "") $errPass_msg = "Password must be required.";

  if($errName_msg === "" && $errPass_msg === ""){
  $query = "SELECT * FROM user WHERE name = ? AND password = ?";
  $stmt = $pdo->prepare($query);
  $stmt->bindValue(1,$uName, PDO::PARAM_STR);
  $stmt->bindValue(2,$uPass, PDO::PARAM_STR);
  $stmt->execute();

  //get the value
  if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    session_regenerate_id(true);
    $_SESSION['name'] = $uName;
    header("Location:index.php");
  }else{
    $errno_msg = "There is no such user....";
  }
}// if($errName_msg === "" && $errPass_msg === "")
}// end if for submit

// foreach ($pdo->query("SELECT * FROM user") as $row) {
//   echo "ID: ".$row["id"]."<br>";
//   echo "Name: ".$row["name"]."<br>";
//   echo "Pass: ".$row["password"]."<br>";
// }

} catch (PDOException $e) {
  echo "Connection failed: ".$e->getMessage();

}

$pdo = null;

?>
<?php include "head.php"; ?>


    <div class="container-fluid">
      <div class="page_title">
        <h2>Log in</h2>
      </div>
      <?php if($errName_msg != "" || $errPass_msg != "" || $errno_msg != ""): ?>
        <div class="alert alert-danger">
          <ul>
            <?php if($errName_msg != "")echo "<li>$errName_msg</li>"; ?>
            <?php if($errPass_msg != "")echo "<li>$errPass_msg</li>"; ?>
            <?php if($errno_msg != "")echo "<li>$errno_msg</li>"; ?>
          </ul>
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
        <input class="btn btn-primary btn-lg center-block" type="submit" name="submit" value="Login">
      </form>
    </div>
  </body>
</html>
