<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: doAmendCategory.php
  Purpose: Amend a record in the Category table
-->
<?php
  include 'header.php';
  require_once 'functions.php';
  $con = getConnection();
  $catId = $_POST['amendCatId'];
  $costPerDay = $_POST['amendCostPerDay'];
  $fiveDayDisc = $_POST['amendFiveDayDisc'];
  $tenDayDisc = $_POST['amendTenDayDisc'];
  // update the Categorey table for the selected category id
  $sql = "UPDATE Category SET CostPerDay = $costPerDay, FiveDayDiscount = $fiveDayDisc,
  TenDayDiscount = $tenDayDisc WHERE CategoryID = '$catId' ";
  if(!mysqli_query($con, $sql)) {
    die("An Error in the SQL Amend Category Query: " . mysqli_error($con));
  }
  mysqli_close($con);
?>
<!-- form to show user what they amended -->
<form class="form" action="amendCategory.php" method="get">
  <h2>Rental Category Amended!</h2>
  <label>Category id</label>
  <input type="text" value="<?php echo $catId ?>" readonly>
  <label>Cost per Day</label>
  <input type="number" value="<?php echo $costPerDay ?>" readonly>
  <label>Five Day Discount (%)</label>
  <input type="number" value="<?php echo $fiveDayDisc ?>" readonly>
  <label>Ten Day Discount (%)</label>
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