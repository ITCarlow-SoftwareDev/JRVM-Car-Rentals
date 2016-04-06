<!-- File Title:vReturnUpdateBalance.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose: this file is updating data in databases.it updating Rental table its setting actual return date. then car table its setting status to 0 thats mean car is again available.
In company table updating current balance. And inserting in penalty table all data about penalties. -->
<?php
include 'db.inc.php';
//include'header.php';
date_default_timezone_set("UTC");
//penalties table details uptating
$updateRentalID= $_POST['rental_ID'];	
//rental table details uptating
$actualReturnDate=date('Y-m-d');	
$sql="UPDATE Rental SET  ActualReturnDate=	'$actualReturnDate' WHERE RentalID='$updateRentalID' "; 
//if not connected 
if (!mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}
//********************************************************************************************************
// set car what is available
// substring delete space before car reg 
$registrationNumber=substr($_POST['regNumber'],1);
$sql = "UPDATE Car SET Status = '0' WHERE RegNo = '$registrationNumber'"; 
//if not connected 
if (!mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}	
//company table details uptating balance adding total charge for penalties*********************************
$companyID=$_POST['companyID'];
$extraPenalties= $_POST['totalExtraCost'];
$currentBalance=$_POST['currentBalance']+$extraPenalties;	
$sql="UPDATE Company SET  CurrentBalance='$currentBalance' WHERE CompanyID='$companyID' "; 
//if not connected 
if (!mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}		
// query for getting blacklist max id *********************************************************************
$sql="SELECT MAX(PenaltyID) AS 'PenaltyID' FROM Penalty" ;
if (! $result=mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}
// reading penalties id and adding one on it 
	$row = mysqli_fetch_array($result);
	$penaltyID =$row['PenaltyID']+1;		
	// inserting record to penalties table	
	$lateReturnPenalties=$_POST['lateReturnPenalties'];
	$carDamegePenalties= $_POST['accidentPenalties'];
	$description= $_POST['accidentDiscription'];
	$sql="INSERT INTO Penalty(PenaltyID, RentalID, LateReturn, CarDamage,  Description)
		VALUES ('$penaltyID','$updateRentalID','$lateReturnPenalties','$carDamegePenalties','$description')";		
if (!mysqli_query($con,$sql)){
	die("An error in SQL Query:" . mysqli_error($con)); 
}	
// closing connection with databases 
mysqli_close($con);
// returns back to return page
header("Location:return.php?updated=true")	;
?>
