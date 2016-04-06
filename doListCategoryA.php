<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: listCategoryA.php
  Purpose: Retrieve categories from Category table and display in dropdown list
           for amendCategory.php and deleteCategory.php
-->
<?php
require_once 'functions.php';
$con = getConnection();
// Selelct all rental categories that are not flagged for deletion and order in ascending order
$sql = "SELECT * FROM Category WHERE DeleteFlag = '0' ORDER BY CategoryID ASC";
if(!$result = mysqli_query($con, $sql)) {
	die("An Error in the SQL Query: " . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
	//select each element from the chosen category
	$catId = $row['CategoryID'];
	$costPerDay = $row['CostPerDay'];
	$fiveDayDisc = $row['FiveDayDiscount'];
	$tenDayDisc = $row['TenDayDiscount'];
	$allText = "$catId,$costPerDay,$fiveDayDisc,$tenDayDisc";
	echo "<option value = '$allText'>$catId</option>"; //display category id in listbox
}
mysqli_close($con);
?>