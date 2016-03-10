<?php
	include 'db.inc.php';
	date_default_timezone_set("UTC");
	


	//$date = date_create();
$date = date_create();
$date=date_format($date,"Y-m-d");
$user="Vaidas";


	// querry for inser data to sql databases here is names of collums from data bases and names from html tag its takes data to them collums in[] brakets is html name tags 
	//$sql="INSERT INTO Blacklist (BlacklistID) VALUES (3)";
	$sql="INSERT INTO Blacklist (BlacklistID, UserName, CompanyID, StartBlacklist, AmountOnStart, Description, DeleteFlag) 
	       VALUES ('1678', '$user  ',' $_POST[listCompanies] ','  $date  ',' $_POST[listCompanies]',' $_POST[listCompanies] ','1')";
	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); // mysqli_error() -- Return the last error description for the most recent function call, if any http://www.w3schools.com/php/func_mysqli_error.asp
	}
	
	// closing connection with databases 
	mysqli_close($con);
?>
<!-- returns into same page-->
	<form action = "addBlacklist.php" method = 'POST'>
		<br><br>
		<input type="submit" value = "Return to insert page "/>  
	</form>