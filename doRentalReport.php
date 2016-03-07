<!-- 
  Author: Mark Kelly
  Date: 03/03/2016
  File Name: doRentalReport.php
  Purpose: To allow user to view a report on rentals
-->
<?php
  require_once 'functions.php';
  date_default_timezone_set('UTC');
  $con = getConnection();
  $sql = "SELECT Company.CompanyName,Rental.RentalDate,ActualReturnDate,TotalCostOfRental FROM Rental INNER JOIN Company ON Rental.CompanyID = Company.CompanyID WHERE Rental.CompanyID = Company.CompanyID AND Rental.DeleteFlag = '0' ORDER BY RentalDate DESC";
  if(!$result = mysqli_query($con, $sql)) {
    die("An Error in the SQL Query: " . mysqli_error($con));
  }
  
  echo "<div align ='center'>
  <table border = '1' cellpadding = '5' width = '100%' bgcolor = 'white'>
  <tr>
  <th>Company Name</th>
      <th>Date Of Rental</th>		
      <th>Duration of Rental (days)</th>
      <th>Cost Of Rental</th>";
  while($row = mysqli_fetch_array($result)){
    $rentalDate = date_create($row['RentalDate']);
    $FormatRentalDate = date_format($rentalDate, "d/M/Y");
    $ActualReturnDate = date_create($row['ActualReturnDate']);
    $diff = date_diff($rentalDate,$ActualReturnDate);
    $numberOfDays = $diff->format("%a");
    echo " Date " . $FormatRentalDate . " Number of days " . $numberOfDays . "<br>" ;
    echo"<tr align='center'>
    <td>".$row['CompanyName']."</td>
    <td>".$row['RentalDate']."</td>
    <td>".$numberOfDays."</td>
    <td>".$row['TotalCostOfRental']."</td></tr>";
  }  
  echo"</table></div>";
  mysqli_close($con);
?> 



