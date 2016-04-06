<!-- Page Title: vAmendingBlacklist.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file is used to update bklacklist table with amended blacklist details  -->
<?php
	include 'db.inc.php';
	include'header.php';
	date_default_timezone_set("UTC");
	$updateCompanyID= $_POST['companyID'];   
	$newDate= new DateTime($_POST['dateBlacklisted']);
	$newDate=date_format($newDate,"Y-m-d");
	$newAmount= $_POST['balanceOnStarting'];			   
	$sql="UPDATE Blacklist SET  StartBlacklist=	'$newDate' ,AmountOnStart= '$newAmount'  WHERE CompanyID=$updateCompanyID";
	//if not connected 
if (!mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}		
// closing connection with databases 
mysqli_close($con);
// return back to addBlacklist page 
header("Location:amendBlacklist.php?updated=true")	;
?>
