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
	
		
			$registrationNumber=$_POST['regNumber'];
				//car table details uptating
				// set car what is available
				//UPDATE `Car` SET `RegNo`=[value-1],`Colour`=[value-2],`ChassisNo`=[value-3],`DateAdded`=[value-4],`Status`=[value-5],`Cum WHERE 1
		
		
		
		// WHERE RegNo=$registrationNumber  need put inside is not working 
		$sql="UPDATE Car SET  Status='0' "; 
	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
		}	
	
	//company table details uptating balance adding total charge for penalties
	$companyID=$_POST['companyID'];
	$extraPenalties= $_POST['totalExtraCost'];
	$currentBalance=$_POST['currentBalance']+$extraPenalties;
	
	
	$sql="UPDATE Company SET  CurrentBalance='$currentBalance' WHERE CompanyID=$companyID "; 
	//if not connected 
	if (!mysqli_query($con,$sql)){
		die("An error in SQL Query:" . mysqli_error($con)); 
		}
		
		
		
			// query for getting blacklist max id 
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


header("Location:return.php?updated=true")	;
?>
