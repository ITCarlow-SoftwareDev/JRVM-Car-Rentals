<?php
	include 'db.inc.php';
	include'header.php';
	date_default_timezone_set("UTC");

	
	
	
	
	//$rentalID=$_POST[''];
	
		// query for getting largest payment id 
	$sql="SELECT MAX(PaymentID) AS 'PaymentID' FROM Payment" ;
	if (! $result=mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
	}
	// reading payment id and adding one on it 
		$row = mysqli_fetch_array($result);
		$paymentID =$row['PaymentID']+1;
		 
	
	$paymentMethod=$_POST['paymentMethod'];
	$nameOnCard=$_POST['cardName'];
	$cardAddess=$_POST['cardAddress'];
	$CardNumber=$_POST['cardNumber'];
	$cvv=$_POST['cvv'];
	$expireDate=$_POST['expireDate'];
	
	$amountPaid=$_POST['amounByCash']+$_POST['amountByCard'];
	
	

	
	
	$updateCompanyID= $_POST['companyID'];	
	$todayDate=  date_create();
	$paymentDate=date_format($todayDate,"Y-m-d");
	$newBalance= $_POST['currentBalance']-$_POST['amounByCash']-$_POST['amountByCard'] ;
			   
	// updating in company table current balance
	$sql="UPDATE Company SET  CurrentBalance='$newBalance'  WHERE CompanyID=$updateCompanyID";	
		if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); // mysqli_error() -- Return the last error description for the most recent function call, if any http://www.w3schools.com/php/func_mysqli_error.asp
	}	
	//$sql="UPDATE Blacklist SET  StartBlacklist=	'$newDate' ,AmountOnStart= '$newAmount'  WHERE CompanyID=$updateCompanyID"; 	
		
	$sql="INSERT INTO Payment  (PaymentID,CompanyID,PaymentMethod,NameOnCard, CardAddress, CardNumber, CVV, ExpiryDate, AmountPaid,DateOfPayment )	
		VALUES( '$paymentID','$_POST[companyID]','$_POST[paymentMethod]','$_POST[cardName]','$_POST[cardAddress]','$_POST[cardNumber]','$_POST[cvv]','$_POST[expireDate]','$amountPaid','$paymentDate')";
		
	
		   
	
		
		
		
		
		
		
		
		
		
		
	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
		}
		
	// closing connection with databases 
	mysqli_close($con);
	// return back to addBlacklist page 
header("Location:acceptPayment.php?updated=true")	;
?>
<!-- returns into same page-->
<!--
	<form action = "addBlacklist.php" method = 'POST'>
		<br><br>
		<input type="submit" value = "Return to insert page "/>  
	</form>-->