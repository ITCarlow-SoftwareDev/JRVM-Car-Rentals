<!-- 
  Author: Mark Kelly
  Date: 03/03/2016
  File Name: rentalReport.php
  Purpose: To allow user to view a report on rentals 
-->
<?php
	include 'header.php';
  require_once 'functions.php';
  date_default_timezone_set('UTC');
  $con = getConnection();
  $sql = "SELECT Company.CompanyID,CompanyName,Street,Town,County,PhoneNo,CreditLimit,Rental.RentalDate,ActualReturnDate,TotalCostOfRental
          FROM Rental INNER JOIN Company ON Rental.CompanyID = Company.CompanyID
          WHERE Rental.CompanyID = Company.CompanyID AND Rental.DeleteFlag = '0' ORDER BY RentalDate DESC";
  if(!$result = mysqli_query($con, $sql)) {
    die("An Error in the SQL Query: " . mysqli_error($con));
  }
?>
<form class="form" id="rentalReport">
  <h2>Rental Report</h2>
  <?php
    echo "<table class='reportTable'>
            <tr>
              <th>Company Name</th>
              <th>Date of Rental</th>		
              <th>Duration of Rental</th>
              <th>Cost of Rental</th>
            </tr>";
    while($row = mysqli_fetch_array($result)) {
      $rentalDate = date_create($row['RentalDate']);
      $FormatRentalDate = date_format($rentalDate, "d/M/Y");
      $ActualReturnDate = date_create($row['ActualReturnDate']);
      $diff = date_diff($rentalDate,$ActualReturnDate);
      $numberOfDays = $diff->format("%a");
      $companyId = $row['CompanyID'];
      $companyName = $row['CompanyName'];
      $street = $row['Street'];
      $town = $row['Town'];
      $county = $row['County'];
      $phoneNo = $row['PhoneNo'];
      $creditLimit = $row['CreditLimit'];
      echo"<tr>
            <td id='tdAlignLeft'>" . $companyName . "<button class='btnBlue btnReport'
            title='Click for more information on " . $companyName . "'
            onclick='getCompanyDetails($companyId, $phoneNo, $creditLimit)'>Client Info</button></td>
            <td>" . $FormatRentalDate . "</td>
            <td>" . $numberOfDays . " Day(s)" . "</td>
            <td>" . "&euro;" . $row['TotalCostOfRental'] . "</td>
          </tr>";
    }  
    echo"</table>";
    mysqli_close($con);
  ?>
</form>
<script>
  // populate()
  function getCompanyDetails(companyId, phoneNo, creditLimit){
    alert("CompanyID: " + companyId + "\n"
         + "Phone No: " + phoneNo + "\n"
         + "Credit Limit: " + creditLimit + "\n");
  } // end getCompanyDetails


</script>
<?php 
	include 'footer.php';
?>