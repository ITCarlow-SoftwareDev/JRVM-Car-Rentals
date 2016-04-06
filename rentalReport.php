<!-- 
  Author: Mark Kelly
  Date: 03/03/2016
  File Name: rentalReport.php
  Purpose: To allow user to view a report on rentals 
-->
<?php
	include 'header.php';
?>
<form class="form" id="rentalReport">
  <h2>Rental Report</h2>
  <table class="tableHead"> <!-- Table head is outside tableScroll div to remain fixed --->
    <tr>
      <th id="companyName">Company Name</th>
      <th id="dateOfRental">Date of Rental</th>		
      <th id="durationOfRental">Duration of Rental</th>
      <th id="costOfRental">Cost of Rental</th>
    </tr>
  </table>
  <?php
    include 'doRentalReport.php';
  ?>
  <!-- Company contact informaton fieldset --->
  <fieldset disabled>
    <legend>Contact Information</legend>
    <label for="compName">Name</label>
    <input name="compName" id="compName" type="text">
    <label for="compAdd">Address</label>
    <textarea name="compAdd" id="compAdd" type="text"></textarea>
    <label for="compPhone">Phone Number</label>
    <input name="compPhone" id="compPhone" type="text">
  </fieldset>
  <!-- Company account informaton fieldset --->
  <fieldset class="fieldsetRight" disabled>
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
</form>
<script>
  // Gets the company details when the "Client Info" button is clicked
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