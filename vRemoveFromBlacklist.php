<!-- Page Title:vRemoveFromBlasklist.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:this screen is used to take payment from clients -->
<?php
	include 'db.inc.php';
	include'header.php';
	date_default_timezone_set("UTC");

	$updateCompanyID= $_POST['companyID'];   
	$todayDate=  date_create();
	$todayDate=date_format($todayDate,"Y-m-d");
	

		$sql="UPDATE Blacklist,Company SET FinishDate='$todayDate',Blacklist.DeleteFlag='1',CurrentBlacklisted='0'  WHERE Company.CompanyID=$updateCompanyID AND Blacklist.CompanyID=$updateCompanyID AND Blacklist.DeleteFlag='0'"; 
		//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
		}	  

	
	
// closing connection with databases 
	mysqli_close($con);
	// return back to addBlacklist page 
	
header("Location:removeBlacklist.php?updated=true")	;
?>
