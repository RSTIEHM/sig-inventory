<?php include('db_con.php');


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