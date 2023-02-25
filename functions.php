<?php
session_start();

function loginUser($con, $pass) {
  $query = "SELECT * FROM `users` WHERE `password`='$pass' LIMIT 1";
  $result = mysqli_query($con, $query);
  $rowcount = mysqli_num_rows($result);
  if($rowcount > 0) {
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

function emptyInputLogin($input) {
  $result = null;
  if(empty($input)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

