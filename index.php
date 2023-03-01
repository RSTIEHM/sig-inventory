<?php include("header.php"); ?>
<?php include('db_con.php'); ?>

<?php
function formatDate($str)
{
  $result = explode("-", $str);
  return $result[1] . "-" . $result[2] . "-" . $result[0];
}

?>

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

      $query = "SELECT * FROM `item` WHERE `active` = 'T'";
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
      <a class="btn btn-primary btn-add-new" href="add.php">Add New</a>
      <a class="btn btn-success btn-add-new" href="view-all.php">View All</a>
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
        <?php
        if (isset($_SESSION["userid"])) {
        ?>
          <th scope="col">Edit</th>
          <th scope="col">Surplus</th>
        <?php
        }
        ?>
      </tr>
    </thead>

    <tbody class="main-list-output">
      <?php
      $query = "SELECT * FROM `item` WHERE `active` = 'T'";
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
            <td><?php echo formatDate($row["assigneeDate"]); ?></td>
            <td><?php echo formatDate($row["warrantyDate"]); ?></td>
            <td><?php echo formatDate($row["inventoryDate"]); ?></td>
            <td><?php echo formatDate($row["disposalDate"]); ?></td>
            <td><?php echo $row["comment"]; ?></td>
            <?php

            if (isset($_SESSION["userid"])) {
            ?>
              <td>
                <a href="edit.php?item=<?php echo $row["id"]; ?>">
                  <img data-action="edit" class="font-icon" src="./stills/edit_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                </a>
              </td>
              <td>
                <img data-sig="<?php echo $row["sigTag"] ?>" class="delete-btn-1" data-action="delete" data-id="<?php echo $row["id"] ?>" class="font-icon" src="./stills/reduce_capacity_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                <!-- <a href="delete.php?item=<?php //echo $row["id"]; 
                                              ?>">
                  <img data-action="delete" class="font-icon" src="./stills/reduce_capacity_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                </a> -->
              </td>
            <?php
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
<script>
  let mainOutput = document.querySelector(".main-list-output");
  mainOutput.addEventListener("click", (e) => {
    let deleteID;
    let sigTag;
    if (e.target.dataset.action === "delete") {
      deleteID = e.target.dataset.id
      sigTag = e.target.dataset.sig
      let result = confirm(`Are You Sure You Want To Surplus ${sigTag}?`)
      if (result) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            location.reload();
          }
        };
        xmlhttp.open("GET", "delete.php?item=" + deleteID, true);
        xmlhttp.send();
      } 
    }

  })
</script>
<?php include('footer.php'); ?>