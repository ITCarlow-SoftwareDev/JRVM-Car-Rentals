<!-- Page Title: listCompanie.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file taking information from databases company table  -->

<?php	
	include 'db.inc.php';
	

	$sql="SELECT CategoryID,CostPerDay FROM Category WHERE DeleteFlag=0	";
	if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
	}
		//adding records to array
	 while($row = mysqli_fetch_array($result))
		{
		$categoryID =$row['CategoryID'];	
		$costPerDay =$row['CostPerDay'];
			
		$allDetails = "$categoryID,$costPerDay";
		
	}	
	mysqli_close($con);	
	
	// getting company balance**********************************************************************************

	$sql="SELECT CompanyID,CurrentBalance,CreditLimit FROM Company WHERE DeleteFlag =0";
	if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
	}
		//adding records to array
	 while($row = mysqli_fetch_array($result))
		{
		$CompanyID =$row['CompanyID'];	
		$CurrentBalance =$row['CurrentBalance'];
		$creditLimit=$row['CreditLimit'];	
		$allDetails = "$CompanyID,$CurrentBalance";
		
	}	
	mysqli_close($con);	
	
	// updating databases with new balance **************************************************************************
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>