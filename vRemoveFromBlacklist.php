<?php
	include 'db.inc.php';
	include'header.php';
	date_default_timezone_set("UTC");

	$updateCompanyID= $_POST['companyID'];   
	$todayDate=  date_create();
	$todayDate=date_format($todayDate,"Y-m-d");
	
			   
	$sql="UPDATE Blacklist SET FinishDate='$todayDate',DeleteFlag='1'  WHERE CompanyID=$updateCompanyID AND DeleteFlag='0'"; 
	

	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
		}	  
	// closing connection with databases 
	mysqli_close($con);
	// return back to addBlacklist page 
header("Location:removeBlacklist.php?updated=true,$todayDate")	;
?>
<!-- returns into same page-->
<!--
	<form action = "addBlacklist.php" method = 'POST'>
		<br><br>
		<input type="submit" value = "Return to insert page "/>  
	</form>-->