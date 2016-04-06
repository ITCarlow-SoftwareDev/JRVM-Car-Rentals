<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: doAddCategory.php
  Purpose: Add a new record to Category table
-->
<?php
  include 'header.php';
  require_once 'functions.php';
  $con = getConnection();
  $catId = $_POST['addCatId'];
  $costPerDay = $_POST['addCostPerDay'];
  $fiveDayDisc = $_POST['addFiveDayDisc'];
  $tenDayDisc = $_POST['addTenDayDisc'];
  // add a new record to Category table
  $sql="INSERT INTO Category (CategoryID, CostPerDay, FiveDayDiscount, TenDayDiscount)
  VALUES ('" . $catId . "', '" . $costPerDay . "', '" . $fiveDayDisc . "', '" . $tenDayDisc . "');";
  if(!mysqli_query($con, $sql)) {
    die("An Error in the SQL Add Category Query: " . mysqli_error($con));
  }
  mysqli_close($con);
?>
<!-- form to show user what details they added to the database-->
<form class="form" action="addCategory.php" method="get">
  <h2>Rental Category Added!</h2>
  <label>Category Id</label>
  <input type="text" value="<?php echo $catId ?>" readonly>
  <label>Cost per Day</label>
  <input type="number" value="<?php echo $costPerDay ?>" readonly>
  <label>Five Day Discount (%)</label>
  <input type="number" value="<?php echo $fiveDayDisc ?>" readonly>
  <label>Ten day Discount (%)</label>
  <input type="number" value="<?php echo $tenDayDisc ?>" readonly>
  <div class="form-btn">
    <input type="submit" class="btnGreen" value="Back">
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<?php 
	include 'footer.php';
?>