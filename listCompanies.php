<!-- Page Title: listCompanie.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file taking information from databases company table  -->

<?php	
include 'db.inc.php';
// query for looking id in person table 																											

$sql="SELECT Company.CompanyID,CompanyName,Street,Town,County,CreditLimit,CurrentBalance,CumulativeBlacklists
FROM Company WHERE Company.DeleteFlag=0 AND CurrentBlacklisted=0 ORDER BY CompanyName";

if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
}
		//adding records to array
 while($row = mysqli_fetch_array($result)){
	$companyID =$row['CompanyID'];	
	$company =$row['CompanyName'];
	$street = $row['Street'];
	$town = $row ['Town'];
	$county = $row ['County'];
	$currentBalance= $row ['CurrentBalance'];
	$limit= $row ['CreditLimit'];
	$timesBlacklist = $row ['CumulativeBlacklists'];
	
	$allDetails = "$companyID,$company,$street,$town,$county,$currentBalance,$limit,$timesBlacklist";
	echo "<option value= '$allDetails'>$company</option>";
}	
mysqli_close($con);	
?>