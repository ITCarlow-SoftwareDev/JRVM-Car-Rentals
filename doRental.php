<!-- 
  Author: Mark Kelly
  Date: 25/03/2016
  File Name: doRental.php
  Purpose: Update database and add a new record to Rental table.
           Produce rental agreement to be printed.
-->
<?php
  include 'header.php';
  require_once 'functions.php';
  date_default_timezone_set('UTC');
  $con = getConnection();
  $compId = $_POST['compId']; // for updating Company table
  $compName = $_POST['compName']; // for Rental agreement
  $addressOne = $_POST['addressOne']; // for Rental agreement
  $addressTwo = $_POST['addressTwo']; // for Rental agreement
  $addressThree = $_POST['addressThree']; // for Rental agreement
  $regNo = $_POST['regNo']; // to update status on Car table
  $dateStart = date_create(); // create new date object with todays date
  $dateFinish = date_create($_POST['returnDate']); // create new date object with return date
	$rentalDate = date_format($dateStart,"Y-m-d"); // Format date for database
  $returnDate = date_format($dateFinish,"Y-m-d");
  $totalCost = $_POST['totalCost']; // to update the Total Cost on Rental table
  $newBalance = $_POST['newBalance']; // to update the new balance on Company table
  $cumulativeRentals = ++$_POST['numberOfRentals']; // to update Rental ID on Company table
  // Get the maximum Id number from Rental table and add one to it
  $sqlRentalId = "SELECT MAX(RentalID) FROM Rental"; // http://www.w3schools.com/sql/sql_func_max.asp [Accessed 25 Mar. 2016].
  if(!$result = mysqli_query($con, $sqlRentalId)) {
    die("An Error in the SQL Rental Id Query: " . mysqli_error($con));
  }
  $row = mysqli_fetch_array($result);
  // add one to the value in first element of array and update newRentalId
	$newRentalId = $row[0] + 1;
  // Add a new record to the Rental table
  $sqlAddRental="INSERT INTO Rental (RentalID,RegNo,CompanyID,RentalDate,ReturnDate,TotalCostOfRental)
  VALUES ('" . $newRentalId . "', '" . $regNo . "', '" . $compId . "', '" . $rentalDate . "', '" . $returnDate . "', '" . $totalCost . "');";
  if(!mysqli_query($con, $sqlAddRental)) {
    die("An Error in the SQL Add Rental Query: " . mysqli_error($con));
  }
  // Update Company table with new balance and increment cumulative rentals
  $sqlCompany = "UPDATE Company SET CumulativeRentals = $cumulativeRentals, CurrentBalance = $newBalance WHERE CompanyID = '$compId'";
  if(!mysqli_query($con, $sqlCompany)) {
    die("An Error in the SQL update Company Query: " . mysqli_error($con));
  }
  // Update status of car on Car table
  $sqlCar = "UPDATE Car SET Status = '1' WHERE RegNo = '$regNo'";
  if(!mysqli_query($con, $sqlCar)) {
    die("An Error in the SQL update Car Query: " . mysqli_error($con));
  }
  $returnDate = date_format($dateFinish,"d/M/Y"); // Reformat date for rental agreement
?>
<form class="rentalAgreement form" id="rentalSuccess" action="rental.php" method="get">
  <h2>Rental Successful</h2>
  <input type="submit" class="btnBlue" id="btnPrint" onclick="printAgreement()" value="Print Rental Agreement">
</form>
<form class="rentalAgreement form" method="get">
  <div class="logo" id="agreementLogo">
    <a href="rental.php"><img id="logo" src="./images/logo.png"></a>
  </div><br><br><br><br>
  <h2>Rental Agreement</h2>
    <?php echo $compName ?><br>
    <?php echo $addressOne ?><br>
    <?php echo $addressTwo ?><br>
    <?php echo $addressThree ?><br>
    <?php echo date('d/M/Y');?><br><br>
  	<p>
			As a representative of the company named above, I undertake to return the car bearing the registration number 
      <?php echo $regNo?> by <?php echo $returnDate?>.<br>
			The total cost of the rental is &euro;<?php echo $totalCost?>.<br><br>
			I further undertake not to use this car for any unlawful purpose and I agree to be fully responsible for any non-recoverable damage to it.<br><br>
			I declare that the car will not be driven by:<br>
			(a)	anyone with a driving conviction<br>
			(b)	anyone with an illness that might impair his / her driving ability<br><br><br><br>
			Signature:_________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:_________________
    </p>
</form>
<script>
function printAgreement() {
  // http://www.w3schools.com/jsref/prop_style_display.asp [Accessed 25 Mar. 2016].
  document.getElementById("rentalSuccess").style.display="none";
  window.print(); // http://www.w3schools.com/jsref/met_win_print.asp [Accessed 25 Mar. 2016].
}
</script>
<?php 
	include 'footer.php';
?>