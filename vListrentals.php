<!-- Page Title: listCompanie.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file taking information from databases company table  -->

<?php	
	include 'db.inc.php';
	
	
	
	//$sql = "SELECT Rental.RegNo,ReturnDate, Company.CompanyName, CompanyID, Model.Model  FROM ((Rental INNER JOIN Company ON Rental.CompanyID=Company.CompanyID) INNER JOIN Car ON Rental.RegNo=Car.RegNo) INNER JOIN Model ON Car.ModelID=Model.ModelID WHERE Company.CompanyID=1";
	
	// WHERE `ActualReturnDate`is null
	
$sql = "SELECT Rental.RegNo,ReturnDate FROM Rental ";
?>
<form class="form" id="blacklistForm">
  <h2>Return</h2>
  <table  class="returnTable">
    <tr>
    <th class="tableColumn">Rental ID</th>
    <th class="tableColumn">Registration Number</th>
	<th class="tableColumn">Model Name</th>	
    <th class="tableColumn">Company Name</th> 
    <th class="tableColumn">Date Due Back</th>
	<th class="tableColumn">Select</th>
    </tr>
  </table>
  <?php
  
  if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
	}
  
    echo "<div >";
    echo "<table>";
    while($row = mysqli_fetch_array($result)) {
		$regNo= $row['RegNo'];
		$returnDate= $row['ReturnDate'];
     
      echo"<tr> 
            <td  class='tableColumn'>" . $regNo ." </td> <td class='tableColumn'>" . $returnDate ." </td> <td  class='tableColumn'>" . "*******" ." <td  class='tableColumn'>" . "!!!!!!!!" ." <td  class='tableColumn'>" . "???????" ." <td  class='tableColumn'>" . "<button type='button'>Select</button>" ."
          </tr>"; 
    } 
    echo "</table>";
    echo "</div>";  




/*

if(!$result = mysqli_query($con, $sql)){
	die('Eror in quering the databases' . mysqli_error());
	}
	"<table>
	<th>Reg</th>
	</table>";
		//adding records to array
	 while($row = mysqli_fetch_array($result))
		{
		 $regNo= $row['RegNo'];
		 $returnDate= $row['ReturnDate'];
		//echo $companyName = $row['CompanyName'];
		//echo $companyID =$row['CompanyID'];
		//echo $model = $row['Model'];
				
	
		
		//$rentalDetails = "$regNo,$returnDate,$companyName,$companyID,$model";
	


	//echo "<option value= '$rentalDetails'>$Re</option>";
	}	
	
	*/
	mysqli_close($con);	
?>