<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: amendCat.php
  Purpose: Update rental category table with new values
-->
<?php
require_once 'functions.php';
$con = getConnection();
$sql = "UPDATE Category SET CostPerDay = $_POST[amendCostPerDay],FiveDayDiscount = $_POST[amendFiveDayDisc],TenDayDiscount =  $_POST[amendTenDayDisc]  WHERE CategoryID = '$_POST[categoryId]' ";
if(!mysqli_query($con, $sql)) {
	die("An Error in the SQL Query: " . mysqli_error($con));
}
/*
else {
	if(mysqli_affected_rows() != 0) {
		header('Location: amendSuccess.php');
	}
	else {
		echo "No records were changed";
    header('Location: amendCategory.php');
	}
  header('Location: amendSuccess.php');
}
*/
mysqli_close($con);
?>
<?php
	include 'header.php';
?>
<form name="success" id="success" class="form" action="amendCategory.php" method="get">
  <h2>Amend Successful</h2>
  <?php
    $catId = $_POST['categoryId'];
    $cpd = $_POST['amendCostPerDay'];
    $fiveDisc = $_POST['amendFiveDayDisc'];
    $tenDisc = $_POST['amendTenDayDisc'];
  ?>
  <label>Category</label>
  <input type="text" name="categoryId" id="categoryId" value="<?php echo $catId ?>" disabled>
  <label>Cost per day</label>
  <input type="number" name="amendCostPerDay" id="amendCostPerDay" value="<?php echo $cpd ?>" disabled>
  <label>Five day discount (%)</label>
  <input type="number" id="amendFiveDayDisc" name="amendFiveDayDisc" value="<?php echo $fiveDisc ?>" disabled>
  <label>Ten day discount (%)</label>
  <input type="number" name="amendTenDayDisc" id="amendTenDayDisc" value="<?php echo $tenDisc ?>" disabled>
  <div class="rental-form-btn">
    <input type="submit" class="btnGreen" id="btnSuccess" value="Return to previous screen">
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<?php 
	include 'footer.php';
?>