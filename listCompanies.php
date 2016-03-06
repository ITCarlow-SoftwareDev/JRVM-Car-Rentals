
<!-- Page Title: listCompanie.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file taking information from databases company table  -->

<?php
	include 'db.inc.php';
	// query for looking id in person table 
	$sql="SELECT CompanyName,Street,Town,County,CurrentBalance,CreditLimit,CumulativeBlacklists FROM Company WHERE DeleteFlag=0";
	
if(!$result = mysqli_query($con, $sql)){
die('Eror in quering the databases' . mysqli_error());
}

	 while($row = mysqli_fetch_array($result))
	{
	$company =$row['CompanyName'];
	$street = $row['Street'];
	$town = $row ['Town'];
	$county = $row ['County'];
	$amountOwned= $row ['CurrentBalance'];
	$limit= $row ['CreditLimit'];
	$timeBlacklist = $row ['CumulativeBlacklists'];
	$allDetails = "$company,$street,$town,$county,$amountOwned,$limit,$timeBlacklist";
	echo "<option value= '$allDetails'>$company</option>";
	}
	
	mysqli_close($con);
	
	
?>