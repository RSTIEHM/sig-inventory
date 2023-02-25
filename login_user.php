<?php
session_start();
include("db_con.php");
include("functions.php");


if(isset($_POST["logout-input"])){
  var_dump("WHAT THE FUCK");
  session_destroy();
  header("location: index.php");
  exit();
}

if (isset($_POST['login-input'])) {
  $pass = $_POST["pass-input"];

  if(emptyInputLogin($pass) !== false) {
    header("location: index.php");
    exit();
  }

  loginUser($con, $pass);

  // $query = "SELECT * FROM users WHERE `password` = '$pass'";
  // $result = mysqli_query($con, $query);
  // echo "IN LOGIN";

} else {
  header("location: index.php");
  exit();
}






?>