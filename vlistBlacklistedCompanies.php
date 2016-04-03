<!-- Page Title: vlistBlacklistedCompanies.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:  -->

<?php	
	include 'db.inc.php';
	// query for looking id in person table 	
	$sql="SELECT Company.CompanyID,CompanyName,Street,Town,County,CreditLimit,CurrentBalance,StartBlacklist,AmountOnStart 
	FROM Company INNER JOIN Blacklist ON Company.CompanyID=Blacklist.CompanyID
	WHERE Blacklist.DeleteFlag=0 AND Company.DeleteFlag=0";

	if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
	}
		//adding records to array
	 while($row = mysqli_fetch_array($result))
		{
		
		$companyID =$row['CompanyID'];	
		$company =$row['CompanyName'];
		$street = $row['Street'];
		$town = $row ['Town'];
		$county = $row ['County'];		
		$BalanceOnBlacklistedDate=$row ['AmountOnStart']; 
		$currentBalance= $row ['CurrentBalance'];
		$limit= $row ['CreditLimit'];
		$dateBlacklisted = $row ['StartBlacklist'];		
		$allDetails = "$companyID,$company,$street,$town,$county,$BalanceOnBlacklistedDate,$currentBalance,$limit,$dateBlacklisted";
		echo "<option value= '$allDetails'>$company</option>";
	}	
	mysqli_close($con);	
?>