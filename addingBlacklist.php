<?php
	include 'db.inc.php';
	include'header.php';

	date_default_timezone_set("UTC");
		// creating date 
	$date = date_create();
	// formating date 
	$date=date_format($date,"Y-m-d");
	
	// query for getting blacklist max id 
	$sql="SELECT MAX(BlacklistID) AS 'BlacklistID' FROM Blacklist" ;
	if (! $result=mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
	}
	// reading blacklist id and adding one on it 
		$row = mysqli_fetch_array($result);
		$largestID =$row['BlacklistID']+1;
		 
		//*************************************************************  
	
		$updateCompanyID= $_POST['companyID'];   
		$timesBlacklisted =$_POST['previousBlacklisted']+1;
		$sql="UPDATE Company SET CumulativeBlacklists='$timesBlacklisted' WHERE CompanyID=$updateCompanyID"; 
			// write if statement to check is there updated or no databases
		mysqli_query($con,$sql);
	
		//********************************************* 
		 
		 
		 
	// querry for inser data to sql databases here is names of collums from data bases and names from html tag its takes data to them collums in[] brakets is html name tags 
	$sql="INSERT INTO Blacklist (BlacklistID, UserName, CompanyID, StartBlacklist, AmountOnStart, Description, DeleteFlag) 
	       VALUES ('$largestID', '$_SESSION[username] ', ' $_POST[companyID] ','  $date  ',' $_POST[currentBalance] ',' $_POST[description] ','0')";
		   

		
	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); // mysqli_error() -- Return the last error description for the most recent function call, if any http://www.w3schools.com/php/func_mysqli_error.asp
	}	
	  
	// closing connection with databases 
	mysqli_close($con);
	// return back to addBlacklist page 
header("Location:addBlacklist.php?updated=true")	;
?>
<!-- returns into same page-->
<!--
	<form action = "addBlacklist.php" method = 'POST'>
		<br><br>
		<input type="submit" value = "Return to insert page "/>  
	</form>-->