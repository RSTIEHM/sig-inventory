<?php include("header.php"); ?>

<?php 
if(!isset($_SESSION["userid"])){
 header("location: index.php");
 exit();
}
?>
<div class="form-container-wrapper">
  <div class="form-container">
    <h1 class="form-description">Add New Item </h1>
    <form action="insert_data.php" class="inventory_form" method="post" name="fileinfo">
      <div class="form-group">
        <label for="sigTag">SIGTag</label>
        <input name="sigTag" type="text" class="form-control input-data" id="sigTagInput" aria-describedby="emailHelp" placeholder="Enter SIGTag">
      </div>
      <div class="form-group">
        <label for="manufacturerInput">Manufacturer</label>
        <input name="manufacturer" type="text" class="form-control input-data" id="manufacturerInput" aria-describedby="emailHelp" placeholder="Enter Manufacturer">
      </div>
      <div class="form-group">
        <label for="modelInput">Model</label>
        <input name="model" type="text" class="form-control input-data" id="modelInput" aria-describedby="emailHelp" placeholder="Enter Model">
      </div>
      <div class="form-group spacer">
        <label for="serialInput">Serial Number</label>
        <input name="serialNumber" type="text" class="form-control input-data" id="serialInput" aria-describedby="emailHelp" placeholder="Enter Serial Number">
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
        <input name="assignee" type="text" class="form-control input-data" id="assigneeInput" aria-describedby="emailHelp" placeholder="Enter Assignee">
      </div>
      <div class="date-group">
        <div class="form-group">
          <label class="spacer" for="assigneeDateInput">Assigned Date</label>
          <input class="date-input input-data" name="assigneeDate" id="assigneeDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="warrantyDateInput">Warranty Date</label>
          <input class="date-input input-data" name="warrantyDate" id="warrantyDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="inventoryDateInput">Inventory Date</label>
          <input class="date-input input-data" name="inventoryDate" id="inventoryDateInput" type="date">
        </div>
        <div class="form-group">
          <label class="spacer" for="disposalDateInput">Disposal Date</label>
          <input class="date-input input-data" name="disposalDate" id="disposalDateInput" type="date">
        </div>
      </div>

      <div class="form-group">
        <label class="spacer" for="textInput">Comments</label>
        <textarea class="input-data" id="textInput" name="comment" id="" cols="50" rows="5"></textarea>
      </div>
      <br>
      <div class="button-container">
        <input value="Add" name="add-new-item" type="submit" class="btn btn-primary add-button" />
        <a class="btn btn-danger cancel-button" href="index.php">Cancel</a>
      </div>
      <input type="hidden" class="date-input hidden-id" name="id">
    </form>
  </div>
</div>
<?php include('footer.php'); ?>