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
  // Get everything from Company table, Get RentalDate,ActualReturnDate,TotalCostOfRental from Rental table
  $sql = "SELECT Company.*,Rental.RentalDate,ActualReturnDate,TotalCostOfRental
          FROM Rental INNER JOIN Company ON Rental.CompanyID = Company.CompanyID
          WHERE Rental.CompanyID = Company.CompanyID AND Rental.DeleteFlag = '0' ORDER BY RentalDate DESC";
  if(!$result = mysqli_query($con, $sql)) {
    die("An Error in the SQL Rental Report Query: " . mysqli_error($con));
  }
  echo "<div class='tableScroll'>"; // Start the scroll area
  echo "<table class='reportTable'>";
  while($row = mysqli_fetch_array($result)) {
    $rentalDate = date_create($row['RentalDate']); // Return a new DateTime object for the rental date
    $FormatRentalDate = date_format($rentalDate, "d/M/Y"); // Format the date e.g. 23/Feb/2016
    $ActualReturnDate = date_create($row['ActualReturnDate']); // Return a new DateTime object for the actual return date
    $diff = date_diff($rentalDate,$ActualReturnDate); // http://www.w3schools.com/php/func_date_date_diff.asp [Accessed 3 Mar. 2016].
    $numberOfDays = $diff->d; // http://www.w3schools.com/php/func_date_interval_format.asp [Accessed 3 Mar. 2016].
    $companyName = $row['CompanyName'];
    $street = $row['Street'];
    $town = $row['Town'];
    $county = $row['County'];
    $phoneNo = $row['PhoneNo'];
    $currentBalance = $row['CurrentBalance'];
    $creditLimit = $row['CreditLimit'];
    $cumulativeBlacklists = $row['CumulativeBlacklists'];
    $cumulativeRentals = $row['CumulativeRentals'];
    $clientInfo = "$companyName,$street,$town,$county,$phoneNo,$currentBalance,$creditLimit,$cumulativeBlacklists,$cumulativeRentals";
    // Table row starts inside the scroll area
    echo"<tr> 
          <td class='tdAlignLeft'>" . $companyName . "<button type='button' class='btnBlue btnClientInfo'
          title='Click for more information on " . $companyName . "'
          onclick='getCompanyDetails(\"" . $clientInfo . "\")'>Client Info</button></td>
          <td>" . $FormatRentalDate . "</td>
          <td>" . $numberOfDays . " Day(s)" . "</td>
          <td>" . "&euro;" . $row['TotalCostOfRental'] . "</td>
        </tr>"; // when client info button is clicked, send client info String to Javascript function 
  } // end while 
  echo "</table>";
  echo "</div>";  // End the scroll area
  mysqli_close($con);
?> 