<?php

/*
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Todo:
 *   1. Check if the company has negative balance.
 *   2. Show company details when choosing a company.
 * Completed:
 *   3. Show the first option info at beginning.
 * Bug:
 */
include 'header.php';
require_once 'functions.php';

$conn = getConnection();
$sql = "SELECT * FROM Company;";
//	$companyInfo = "";
$counter = 0;
$str = "";

if(!($result = mysqli_query($conn,$sql))) {
	die("sql script:" . mysqli_error($conn));
}

?>
	<section class="margin-top-100px">
		<div class="form">
			<h1><center>Amend / View a Company</center></h1>
			<p>
			<center>
				<?php
				if (ISSET($_GET['update'])) {
					echo "Your changes have been saved!";
				} else {
					echo "&nbsp;";
				}
				?>
			</center>
			</p>
			<form action="javascript:;">
				<label>Company Name</label><br>
				<?php
				echo "<select id=\"companies\" name='company' onchange=\"showInfo()\">";

				while($row = mysqli_fetch_array($result)) {

					$companyInfo[$counter] = $row['CompanyName'] . "," . $row['Street'] . "," . $row['Town'] . "," . $row['County'] . "," . $row['PhoneNo'] . "," . $row['CreditLimit'];
					echo "<option value=\"" . $companyInfo[$counter] . "\">" . $row['CompanyName'] . "</option>";
					$str += $companyInfo[$counter] + "|";
					$counter++;
				}
				echo "</select>";
				?>


				<?php
				$firstCompany = explode(",", $companyInfo[0]);
				?>
				<label>Street</label><br>
				<input type="text" id="street" name="street" value="<?php echo $firstCompany[1];?>" readonly required><br>
				<label>Town</label><br>
				<input type="text" id="town" name="town" value="<?php echo $firstCompany[2];?>" readonly required><br>
				<label>County</label><br>
				<input type="text" id="county" name="county" value="<?php echo $firstCompany[3];?>" readonly required><br>
				<label>Telephone Number</label><br>
				<input type="text" id="telephoneNumber" name="telephoneNumber" value="<?php echo $firstCompany[4];?>" readonly required><br>
				<label>Credit Limit</label><br>
				<input type="number" id="creditLimite" name="creditLimite" value="<?php echo $firstCompany[5];?>" readonly required><br>

				<br>
				<div class="btn-group" id="amendCompany-btn-group">
					<button class="btnGreen" id="fixed-btn" value="Amend">Amend</button>
					<button class="btnGreen hidden" id="save">Save</button>
					<button class="btnRed hidden" id="cancel" type="reset">Cancel</button>
				</div>
			</form>
		</div>
		<div class="home_car">
			<img id="car" src="./images/car.png">
		</div>
	</section>
	<script>

		// amend onclick listener
		document.getElementById('fixed-btn').onclick = function () {
//			this.style.visibility = "hidden";
			this.className += " hidden";
			var btnSave = document.getElementById('save');
			var btnCancel = document.getElementById('cancel');
//			btnSave.style.visibility = "visible";
//			btnCancel.style.visibility = "visible";

			//set input editable
			document.getElementById('street').readOnly = false;
			document.getElementById('town').readOnly = false;
			document.getElementById('county').readOnly = false;
			document.getElementById('telephoneNumber').readOnly = false;
			document.getElementById('creditLimite').readOnly = false;

			btnSave.className = "btnGreen";
			btnCancel.className = "btnRed";
		};

		// dropdown box onchange listener
		function showInfo() {
			var choose = document.getElementById('companies').value;
			var array = choose.split(",");

			document.getElementById('street').value = array[1];
			document.getElementById('town').value = array[2];
			document.getElementById('county').value = array[3];
			document.getElementById('telephoneNumber').value = array[4];
			document.getElementById('creditLimite').value = array[5];

			document.getElementById('street').readOnly = true;
			document.getElementById('town').readOnly = true;
			document.getElementById('county').readOnly = true;
			document.getElementById('telephoneNumber').readOnly = true;
			document.getElementById('creditLimite').readOnly = true;

			document.getElementById('fixed-btn').className = "btnGreen";
			document.getElementById('save').className += " hidden";
			document.getElementById('cancel').className += " hidden";
		}

		document.getElementById('save').onclick = function () {
			var companyName = document.getElementById('companies').value.split(",")[0];
			var street = document.getElementById('street').value;
			var town = document.getElementById('town').value;
			var county = document.getElementById('county').value;
			var telephoneNumber = document.getElementById('telephoneNumber').value;
			var creditLimite = document.getElementById('creditLimite').value;

			if (street=="" || town=="" || county=="" || telephoneNumber=="" || creditLimite=="") {
				return false;
			}

			if (confirm("Are you sure to save your changes?")) {
				window.location.href = "/doAmendCompany.php?companyName=" + companyName + "&street=" + street + "&town=" + town + "&county=" + county + "&telephoneNo=" + telephoneNumber + "&creditLimit=" + creditLimite;
			}
			return false;
		};


	</script>
<?php
include 'footer.php';
?>