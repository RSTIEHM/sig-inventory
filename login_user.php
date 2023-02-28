<?php
session_start();
include("db_con.php");
// include("functions.php");

function loginUser($con, $pass)
{
  $query = "SELECT * FROM `users` WHERE `password`='$pass' LIMIT 1";
  $result = mysqli_query($con, $query);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
    // SET SESSION TO TRUE
    $_SESSION["userid"] = 123123123;
    header("location: index.php");
    exit();
  } else {
    header("location: index.php");
    exit();
  }
  mysqli_free_result($result);
}

function emptyInputLogin($input)
{
  $result = null;
  if (empty($input)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}



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