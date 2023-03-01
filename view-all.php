<?php include("header.php"); ?>
<?php include('db_con.php'); ?>



<header class="header">
  <img src="./stills/Logo-SIG original.png" alt="Logo">

  <form action="login_user.php" method="POST">
    <div class="form-group login-form">
      <?php
      if (isset($_SESSION["userid"])) {
      ?>
        <input name='logout-input' type='submit' class='btn btn-success log-in-btn' value='Log Out' />
      <?php
      } else {
      ?>
        <input name='pass-input' type='password' class='form-control input-data' id='loginInput' placeholder='Enter Password'>
        <input name='login-input' type='submit' class='btn btn-success log-in-btn' value='Log In' />
      <?php
      }
      ?>
    </div>
  </form>


</header>

<div class="table-wrapper">

  <div class="addNew-count-container">
    <h5 class="counter">
      <?php

      $query = "SELECT * FROM `item`";
      $result = mysqli_query($con, $query);
      if ($result) {
        $row = mysqli_num_rows($result);
        if ($row) {
          echo $row . " Items";
        }
      }
      ?>
    </h5>
    <?php
    if (isset($_SESSION["userid"])) {
    ?>
      <a class="" href="index.php"><<< Back</a>
    <?php
    }
    ?>
  </div>

  <table class="table table-bordered table-striped">
    <thead>
      <tr class="header-table table-header-output">
        <th scope="col">SIGTag</th>
        <th scope="col">Manufacturer</th>
        <th scope="col">Model</th>
        <th scope="col">Serial Number</th>
        <th scope="col">Location</th>
        <th scope="col">Assignee</th>
        <th scope="col">Assignment Date</th>
        <th scope="col">Warranty Date</th>
        <th scope="col">Inventory Date</th>
        <th scope="col">Disposal Date</th>
        <th scope="col">Comment</th>
        <th scope="col">Status</th>
      </tr>
    </thead>

    <tbody class="main-list-output">
      <?php
      $query = "SELECT * FROM `item`";
      $result = mysqli_query($con, $query);
      if (!$result) {
        die('Fail');
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr class="single-inventory-item">
            <td><?php echo $row["sigTag"]; ?></td>
            <td><?php echo $row["manufacturer"]; ?></td>
            <td><?php echo $row["model"]; ?></td>
            <td><?php echo $row["serialNumber"]; ?></td>
            <td><?php echo $row["location"]; ?></td>
            <td><?php echo $row["assignee"]; ?></td>
            <td><?php echo $row["assigneeDate"]; ?></td>
            <td><?php echo $row["warrantyDate"]; ?></td>
            <td><?php echo $row["inventoryDate"]; ?></td>
            <td><?php echo $row["disposalDate"]; ?></td>
            <td><?php echo $row["comment"]; ?></td>
            <?php 
              if($row["active"] == "F") {
                echo "<td>&#x2713;</td>";
              } else {
                echo "<td>&#x2715;</td>";
              }
            ?>

          </tr>
      <?php
        }
      }


      ?>


    </tbody>
  </table>


</div>

<?php include('footer.php'); ?>