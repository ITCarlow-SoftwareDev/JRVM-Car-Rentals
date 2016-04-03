 <!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 Last edited 	:

 Purpose        : Retrieve company details from Company table and display 
				  in drop down list for accountStatements.php
				  
-->

<?php
	require_once 'functions.php';
	$con = getConnection();

	//Select fields from Company table where companies not flagged for deletion 
	$sql = "SELECT CompanyID,CompanyName, Street, Town, County, CurrentBalance, CumulativeRentals 
			FROM Company 
			WHERE DeleteFlag ='0'";
			
	if(!$result = mysqli_query($con, $sql)) {
		die("Cannot find Company Details: " . mysqli_error());
	}
	while($row = mysqli_fetch_array($result)) {
		
		$compID = $row['CompanyID'];
		$compName = $row['CompanyName'];
		$street= $row['Street'];
		$town= $row['Town'];
		$county= $row['County'];
		$currentBalance= $row['CurrentBalance'];
		$cumulativeRentals= $row['CumulativeRentals'];
		
		$retrievedDetails = "$compID,$compName,$street,$town,$county,$currentBalance,$cumulativeRentals";
		
		//display $companyName in drop down for selection
		echo "<option value = '$retrievedDetails'>$compName</option>"; 
	}
	mysqli_close($con);
?>