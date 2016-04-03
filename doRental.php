<!-- 
  Author: Mark Kelly
  Date: 25/03/2016
  File Name: doRental.php
  Purpose: Update Rental table with a new record
-->
<?php
  require_once 'functions.php';
  date_default_timezone_set('UTC');
  include 'header.php';
  $con = getConnection();
  $compId = $_POST['compId'];
  $compName = $_POST['compName'];
  $newBalance = $_POST['newBalance'];
  $addressOne = $_POST['addressOne'];
  $addressTwo = $_POST['addressTwo'];
  $addressThree = $_POST['addressThree'];
  $regNo = $_POST['regNo'];
  $totalCost = $_POST['totalCost'];
  $returnDate = $_POST['returnDate'];
  $returnDate = date_create($returnDate);
  /*
  $sql = "UPDATE Category SET CostPerDay = $costPerDay, FiveDayDiscount = $fiveDayDisc,
  TenDayDiscount = $tenDayDisc WHERE CategoryID = '$catId' ";
  if(!mysqli_query($con, $sql)) {
    die("An Error in the SQL Amend Category Query: " . mysqli_error($con));
  }
  mysqli_close($con);
  */
?>
<!-- form to show user what they amended -->
<form id="rentalAgreement" class="form" action="rental.php" method="get">
  <h2>Rental Agreement</h2>
    <?php echo $compName ?><br>
    <?php echo $addressOne ?><br>
    <?php echo $addressTwo ?><br>
    <?php echo $addressThree ?><br>
    <?php echo date('d/M/Y');?><br><br>
  	<p>
			As a representative of the company named above, I undertake to return the car bearing the registration number <?php echo $regNo ?> by <?php echo date_format($returnDate,"d/M/Y");?>.<br>
			The total cost of the rental is <?php echo $totalCost ?>.<br><br>
			I further undertake not to use this car for any unlawful purpose and I agree to be fully responsible for any non-recoverable damage to it.<br><br>
			I declare that the car will not be driven by:<br>
			(a)	anyone with a driving conviction<br>
			(b)	anyone with an illness that might impair his / her driving ability<br><br><br><br>
			Signature:_________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:_________________
    </p>
		
  <div class="form-btn">
    <input type="submit" class="btnBlue" id="btnSuccess"
    onclick="style='display: none;',myFunction()" value="Print Rental Agreement">
  </div>
</form>
<script>
function myFunction() {
    window.print();
}
</script>
<?php 
	include 'footer.php';
?>