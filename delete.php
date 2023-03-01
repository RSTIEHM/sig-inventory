<?php include('db_con.php');
if($_SERVER["request"]) {
  echo "IN PHP";
  $newID = $_GET["item"];
  $query = "UPDATE `item` SET `active`='F' WHERE `id` = '$newID'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    echo "WTF";
  } else {
    echo "HUH";
    header("location:index.php");
  }
}

if (isset($_GET["item"])) {
  $newID = $_GET["item"];
  $query = "UPDATE `item` SET `active`='F' WHERE `id` = '$newID'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    echo "WTF";
  } else {
    header("location:index.php");
  }
}






?>