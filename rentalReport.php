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
  // Get everything from Company table, Get RentalDate,ActualReturnDate,TotalCostOfRental from Rental table
  $sql = "SELECT Company.*,Rental.RentalDate,ActualReturnDate,TotalCostOfRental
          FROM Rental INNER JOIN Company ON Rental.CompanyID = Company.CompanyID
          WHERE Rental.CompanyID = Company.CompanyID AND Rental.DeleteFlag = '0' ORDER BY RentalDate DESC";
  if(!$result = mysqli_query($con, $sql)) {
    die("An Error in the SQL Rental Report Query: " . mysqli_error($con));
  }
?>
<form class="form" id="rentalReport">
  <h2>Rental Report</h2>
  <table class='tableHead'> <!-- Table head is outside tableScroll div to remain fixed --->
    <tr>
      <th id="companyName">Company Name</th>
      <th id="dateOfRental">Date of Rental</th>		
      <th id="durationOfRental">Duration of Rental</th>
      <th id="costOfRental">Cost of Rental</th>
    </tr>
  </table>
  <?php
    echo "<div class='tableScroll'>"; // Start the scroll area
    echo "<table class='reportTable'>";
    while($row = mysqli_fetch_array($result)) {
      $rentalDate = date_create($row['RentalDate']); // Return a new DateTime object for the rental date
      $FormatRentalDate = date_format($rentalDate, "d/M/Y"); // Format the date e.g. 23/Feb/2016
      $ActualReturnDate = date_create($row['ActualReturnDate']); // Return a new DateTime object for the actual return date
      $diff = date_diff($rentalDate,$ActualReturnDate); // W3Schools
      $numberOfDays = $diff->format("%a"); // W3Schools
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
  <!-- Company contact informaton fieldset --->
  <fieldset class="reportFieldset" disabled>
    <legend>Contact Information</legend>
    <label for="compName" >Name</label>
    <input name="compName" id="compName" type="text">
    <label for="compAdd" >Address</label>
    <textarea name="compAdd" id="compAdd" type="text"></textarea>
    <label for="compPhone" >Phone Number</label>
    <input name="compPhone" id="compPhone" type="text">
  </fieldset>
  <!-- Company account informaton fieldset --->
  <fieldset id="accountInfo" class="reportFieldset" disabled>
    <legend>Account Information</legend>
    <label for="currentBalance" >Balance</label>
    <input name="currentBalance" id="currentBalance" type="text">
    <label for="creditLimit" >Credit Limit</label>
    <input name="creditLimit" id="creditLimit" type="text">
    <label for="numberOfRentals" >Number of Rentals</label>
    <input name="numberOfRentals" id="numberOfRentals" type="text">
    <label for="timesOnBlacklist" >Number of Times Blacklisted</label>
    <input name="timesOnBlacklist" id="timesOnBlacklist" type="text">
  </fieldset><br>
   <!-- <button class="btnRed" id="btnRentalReport" type="reset">Cancel</button> -->
</form>
<script>
  // getCompanyDetails() gets the company details when the "Client Info" button is clicked
  function getCompanyDetails(clientInfo) {
    var companyDetails = clientInfo.split(',');
    document.getElementById("compName").value = companyDetails[0];
    document.getElementById("compAdd").value = companyDetails[1] + ",\n" + companyDetails[2] + ",\n" + companyDetails[3] + ".";
    document.getElementById("compPhone").value = companyDetails[4];
    document.getElementById("currentBalance").value = "\u20AC" + companyDetails[5]; // u20AC = Unicode value for Euro symbol
    document.getElementById("creditLimit").value = "\u20AC" + companyDetails[6]; // u20AC = Unicode value for Euro symbol
    document.getElementById("timesOnBlacklist").value = companyDetails[7];
    document.getElementById("numberOfRentals").value = companyDetails[8];
  } // end getCompanyDetails
</script>
<?php 
	include 'footer.php';
?>