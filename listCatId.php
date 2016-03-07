<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: listCatId.php
  Purpose: Retrieve category Id's from Category table and display in dropdown list
-->
<?php
require_once 'functions.php';
$con = getConnection();
//Selelct all rental categories that are not flagged for deletion
$sql = "SELECT CategoryID FROM Category WHERE DeleteFlag = '0' ORDER BY CategoryID ASC";
if(!$result = mysqli_query($con, $sql)) {
	die("An Error in the SQL Query: " . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
	$catId = $row['CategoryID']; //select each element from the chosen category
	$allText = "$catId";
	echo "<option value = '$allText'>$catId</option>"; //display categories in listbox
}
mysqli_close($con);
?>