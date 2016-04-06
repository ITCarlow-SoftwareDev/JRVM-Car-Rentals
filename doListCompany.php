<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: doListCompany.php
  Purpose: Retrieve companies from Company table and display in dropdown list
-->
<?php
require_once 'functions.php';
$con = getConnection();
// Selelct all companies that are not flagged for deletion and not on the
// blacklist table, order in ascending order of company name
$sql = "SELECT * FROM Company WHERE Company.DeleteFlag = '0'
        AND CurrentBlacklisted = '0' ORDER BY CompanyName ASC";
if(!$result = mysqli_query($con, $sql)) {
	die("An Error in the SQL List Company Query: " . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
	//select each element from the chosen category
	$companyId = $row['CompanyID'];
  $companyName = $row['CompanyName'];
  $street = $row['Street'];
  $town = $row['Town'];
  $county = $row['County'];
  $phoneNo = $row['PhoneNo'];
  $currentBalance = $row['CurrentBalance'];
  $creditLimit = $row['CreditLimit'];
  $cumulativeRentals = $row['CumulativeRentals'];
  $clientInfo = "$companyId,$companyName,$street,$town,$county,$phoneNo,$currentBalance,$creditLimit,$cumulativeRentals";
	echo "<option value = '$clientInfo'>$companyName</option>";
}
mysqli_close($con);
?>