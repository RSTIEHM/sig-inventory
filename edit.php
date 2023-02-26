<?php include("header.php"); ?>
<?php
if (!isset($_SESSION["userid"])) {
  header("location: index.php");
  exit();
}
?>

<?php include('db_con.php'); ?>

<?php
if (isset($_GET["item"])) {
  $id = $_GET["item"];
  $query = "SELECT * FROM `item` WHERE `id` = '$id'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    die('Fail');
  } else {
    $row = mysqli_fetch_assoc($result);
  }
}
?>


<div class="form-container-wrapper">
  <div class="form-container">
    <h1 class="form-description">Edit Item <?php echo $row["sigTag"]; ?></h1>
    <form action="update_data.php?itemid=<?php echo $id; ?>" class="inventory_form" method="post" name="fileinfo">
      <div class="form-group">
        <label for="sigTag">SIGTag</label>
        <input required value="<?php echo $row["sigTag"]; ?>" name="sigTag" type="text" class="form-control input-data" id="sigTagInput" aria-describedby="emailHelp" placeholder="Enter SIGTag">
      </div>
      <div class="form-group">
        <label for="manufacturerInput">Manufacturer</label>
        <input required value="<?php echo $row["manufacturer"]; ?>" name="manufacturer" type="text" class="form-control input-data" id="manufacturerInput" aria-describedby="emailHelp" placeholder="Enter Manufacturer">
      </div>
      <div class="form-group">
        <label for="modelInput">Model</label>
        <input required value="<?php echo $row["model"]; ?>" name="model" type="text" class="form-control input-data" id="modelInput" aria-describedby="emailHelp" placeholder="Enter Model">
      </div>
      <div class="form-group spacer">
        <label for="serialInput">Serial Number</label>
        <input required value="<?php echo $row["serialNumber"]; ?>" name="serialNumber" type="text" class="form-control input-data" id="serialInput" aria-describedby="emailHelp" placeholder="Enter Serial Number">
      </div>
      <div class="form-group">
        <label class="spacer" for="locationInput">Location</label>
        <select class="dropDown_RS input-data" name="location" id="locationInput">
          <option value="FL">FL</option>
          <option value="CT">CT</option>
        </select>
      </div>
      <div class="form-group">
        <label for="assigneeInput">Assignee</label>
        <input required value="<?php echo $row["assignee"]; ?>" name="assignee" type="text" class="form-control input-data" id="assigneeInput" aria-describedby="emailHelp" placeholder="Enter Assignee">
      </div>
      <div class="date-group">
        <div class="form-group">
          <label class="spacer" for="assigneeDateInput">Assigned Date</label>
          <input required value="<?php echo $row["assigneeDate"]; ?>" class="date-input input-data" name="assigneeDate" id="assigneeDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="warrantyDateInput">Warranty Date</label>
          <input required value="<?php echo $row["warrantyDate"]; ?>" class="date-input input-data" name="warrantyDate" id="warrantyDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="inventoryDateInput">Inventory Date</label>
          <input required value="<?php echo $row["inventoryDate"]; ?>" class="date-input input-data" name="inventoryDate" id="inventoryDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="disposalDateInput">Disposal Date</label>
          <input required value="<?php echo $row["disposalDate"]; ?>" class="date-input input-data" name="disposalDate" id="disposalDateInput" type="date">
        </div>
      </div>

      <div class="form-group">
        <label class="spacer" for="textInput">Comments</label>
        <textarea class="input-data" id="textInput" name="comment" id="" cols="50" rows="5"><?php echo $row["comment"]; ?></textarea>
      </div>
      <br>
      <div class="button-container">
        <input value="Update" name="edit-item" type="submit" class="btn btn-primary add-button" />
        <a class="btn btn-danger cancel-button" href="index.php">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php include('footer.php'); ?>