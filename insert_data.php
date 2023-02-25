<?php 
include("db_con.php"); 

// add-new-item
if(isset($_POST['add-new-item'])) {
  $sigTag = $_POST["sigTag"];
  $manufacturer = $_POST["manufacturer"];
  $model = $_POST["model"];
  $serialNumber = $_POST["serialNumber"];
  $location = $_POST["location"];
  $assignee = $_POST["assignee"];
  $assigneeDate = $_POST["assigneeDate"];
  $warrantyDate = $_POST["warrantyDate"];
  $inventoryDate = $_POST["inventoryDate"];
  $disposalDate = $_POST["disposalDate"];
  $comment = $_POST["comment"];
  $active = 'T';

  $query = "INSERT INTO `item` (`sigTag`, `manufacturer`, `model`, `serialNumber`, `location`,`assignee`, `assigneeDate`, `warrantyDate`, `inventoryDate`, `disposalDate`, `comment`, `active`) VALUES ('$sigTag', '$manufacturer', '$model', '$serialNumber', '$location', '$assignee', '$assigneeDate', '$warrantyDate', '$inventoryDate', '$disposalDate', '$comment', '$active')";

  $result = mysqli_query($con, $query);

  if(!$result) {
    die("FAILED" . mysqli_error($con));
  } else {
    header("location:index.php");
  }

  // if($sigTag == "" || empty($sigTag)) {
  //   header("location:add.php?message=Please Fill Out SIG Tag");
  // }
}


?>