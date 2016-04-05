<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 01/04/2016
 Last edited 	:

 Unit 5
 Purpose        :

-->
<?php
include 'header.php';
date_default_timezone_set('UTC');
require_once 'functions.php';
?>
<form class="form" name="prepareAccount" id="prepareAccount" onsubmit="" action="" method="post">

	<h2>Company Account Statements</h2>
	<div id="formLeft">
		<label>Select Company</label>
		<!--drop down for existing companies-->
		<select name="selectedAcc" id="selectedAcc" title="Choose Company from drop-down" onchange='populate()' >
			<option value="Select Company"></option>
			<?php include "selectAccount.php"; ?>
		</select>

		<h3>Details for Account</h3>
		<!-- to store store compID to retrieve relevant rentalID's later (using hidden) onchange='printStatement()'-->
		<!--  http://www.w3schools.com/tags/tag_input.asp -->
		<input type="text" name="compID"  id="compID" readOnly>

		<!-- to be populated with relevant data from particular car registration number -->
		<label>Company Name</label> <br>
		<input type="text" name="compName" id="compName" readOnly > <br>

		<label>Street</label> <br>
		<input type="text" name="street" id="street" readOnly > <br>

		<label>Town</label> <br>
		<input type="text" name="town" id="town" readOnly> <br>

		<label>County</label> <br>
		<input type="text" name="county" id="county" readOnly> <br>

		<label>Current Balance</label><br>
		<input type="number" name="currentBalance" id="currentBalance" readOnly><br>

		<label>Cumulative Rentals</label> <br>
		<input type="number" name="cumulativeRentals" id="cumulativeRentals" readOnly> <br>
	</div><!--end formLeft -->
	<div id="formRight">
		<fieldset id="fieldsetStatement">
			<h3>Account Statement</h3>
			<label>Statement Date</label>
			<input type = "text" name="date" id="date" value="<?php echo date('d/m/Y');?>" readOnly />

			<h4> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp This statement covers the following rentals : </h4> <br>
			<div align = 'center' type="hidden"  name="rentalRecords" id="rentalRecords" >
				<!--invoke php to create and populate the table-->
				<?php
				$con = getConnection();

				if (ISSET($_GET['compID'])) {
					$selectedCompID= $_GET['compID'];
				}

				/*creates the table and applies the headings listed below*/
				echo "<table border = '1' cellspacing = '5' width = '70%'>";
				echo '<tr><th> &nbsp Start Date &nbsp</th>
						  <th> &nbsp Return Date &nbsp </th>
						  <th> &nbsp Cost &nbsp &euro; &nbsp</th>
					 </tr>';




				/*Call function to transfer data to table*/
				if (ISSET($_GET['compID'])) {

					/*selects the data from the specified table*/
					$sql ="SELECT Rental.CompanyID, RentalDate, ActualReturnDate, TotalCostOfRental, 
				   Company.CompanyID 
				   From Company INNER JOIN Rental 
				   ON Company.CompanyID = Rental.CompanyID 
				   WHERE Rental.DeleteFlag = '0'
				   AND Rental.CompanyID = '$selectedCompID'";

					printStatement($con,$sql);
				}

				function printStatement($con,$sql){
					$result = mysqli_query($con,$sql);

					if (! $result){
						die ("An Error in the SQL Query: " . mysql_error());
					}

					while($row = mysqli_fetch_array($result)){
						echo "<tr>
						  <td>" . $row['RentalDate'] . "</td>
						  <td>" . $row['ActualReturnDate'] . "</td>
						  <td>" . $row['TotalCostOfRental'] . "</td>
						  </tr>";
					}
					echo "</table>";
				}
				mysqli_close($con);
				?>
			</div>
			<br>
			<div>
				<label for="confirm">Balance at last statement date :</label>
				<input type = "text" name="bal" id="bal" readonly /> <br>

				<label for="confirm">Amount paid:</label>
				<input type = "text" name="paid" id="paid" readonly /> <br>

				<label for="confirm">Total Rentals (As above) :</label>
				<input type = "text" name="rent" id="rent"  readonly /> <br>
			</div>

		</fieldset>
	</div><!--end formRight -->


</form>

<?php
	if (ISSET($_GET['compID']) && ISSET($_GET['index'])) {
?>
		<script>
			var selectedAcc = document.getElementById("selectedAcc");
			selectedAcc.selectedIndex = <?php echo $_GET['index'];?>;
			var companyInfo = selectedAcc.options[selectedAcc.selectedIndex].value;


			var retrievedDetails = companyInfo.split(',');
			document.getElementById("compID").value = retrievedDetails[0];

			document.getElementById("compID").style.visibility = "hidden";

			document.getElementById("compName").value = retrievedDetails[1];
			document.getElementById("street").value = retrievedDetails[2];
			document.getElementById("town").value = retrievedDetails[3];
			document.getElementById("county").value = retrievedDetails[4];
			document.getElementById("currentBalance").value = retrievedDetails[5];
			document.getElementById("cumulativeRentals").value = retrievedDetails[6];
		</script>
<?php
	}
?>


<script>
	//function declaration
	function populate(){
		var selectedAcc = document.getElementById("selectedAcc");
		//chosenAcc assigned value of the Company Account selected from dropdown
		var chosenAcc = selectedAcc.options[selectedAcc.selectedIndex].value;
		var retrievedDetails = chosenAcc.split(',');
		document.getElementById("compID").value = retrievedDetails[0];

		document.getElementById("compID").style.visibility = "hidden";

		document.getElementById("compName").value = retrievedDetails[1];
		document.getElementById("street").value = retrievedDetails[2];
		document.getElementById("town").value = retrievedDetails[3];
		document.getElementById("county").value = retrievedDetails[4];
		document.getElementById("currentBalance").value = retrievedDetails[5];
		document.getElementById("cumulativeRentals").value = retrievedDetails[6];

		$retrievedDetails = "$compID,$compName,$street,$town,$county,$currentBalance,$cumulativeRentals";

		window.location.href="/accountStatements.php?compID=" + retrievedDetails[0] + "&index=" + selectedAcc.selectedIndex;
		//selectedCompanyID = "compID";
		//alert("For debug,CompID is: " + retrievedDetails[0]);
		//alert ("For debug,Retrieved details are :" + retrievedDetails ); //For Debug **********DELETE
	} // end populate
</script>
<?php
include 'footer.php';
?>