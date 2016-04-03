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
<!-- returns into same page-->
<!--
	<form action = "addBlacklist.php" method = 'POST'>
		<br><br>
		<input type="submit" value = "Return to insert page "/>  
	</form>-->