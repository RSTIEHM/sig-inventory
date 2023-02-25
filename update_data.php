<?php include('db_con.php'); ?>


<?php
if (isset($_POST["edit-item"])) {
  if (isset($_GET["itemid"])) {
    $newID = $_GET["itemid"];
  }

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
  $query = "UPDATE `item` SET `sigTag`='$sigTag', `manufacturer`='$manufacturer',`model`='$model',`serialNumber`='$serialNumber',`location`='$location',`assignee`='$assignee', `assigneeDate`='$assigneeDate',`warrantyDate`='$warrantyDate',`inventoryDate`='$inventoryDate',`disposalDate`='$disposalDate',`comment`='$comment'  WHERE `id` = '$newID'";

  $result = mysqli_query($con, $query);
  if (!$result) {
    echo "WTF";

  } else {
    header("location:index.php");
  }
}
