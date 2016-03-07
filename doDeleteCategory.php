<!-- 
  Author: Mark Kelly
  Date: 26/02/2016
  File Name: doDeleteCategory.php
  Purpose: Delete a record from the Category table
-->
<?php
  require_once 'functions.php';
  $con = getConnection();
  $catId = $_POST['delCatId'];
  $costPerDay = $_POST['delCostPerDay'];
  $fiveDayDisc = $_POST['delFiveDayDisc'];
  $tenDayDisc = $_POST['delTenDayDisc'];
  // delete the record from Category table for the selected category id
  $sql = "DELETE FROM Category WHERE Category.CategoryID = '$catId'";
  if(!mysqli_query($con, $sql)) {
    die("An Error in the SQL Query: " . mysqli_error($con));
  }
  mysqli_close($con);
	include 'header.php';
?>
<!-- form to show user what they deleted -->
<form class="form" action="deleteCategory.php" method="get">
  <h2>Rental Category Deleted!</h2>
  <label>Category Id</label>
  <input type="text" value="<?php echo $catId ?>" readonly>
  <label>Cost per Day</label>
  <input type="number" value="<?php echo $costPerDay ?>" readonly>
  <label>Five Day Discount (%)</label>
  <input type="number" value="<?php echo $fiveDayDisc ?>" readonly>
  <label>Ten Day Discount (%)</label>
  <input type="number" value="<?php echo $tenDayDisc ?>" readonly>
  <div class="rental-form-btn">
    <input type="submit" class="btnGreen" id="btnSuccess" value="Return to Previous Screen">
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<?php 
	include 'footer.php';
?>