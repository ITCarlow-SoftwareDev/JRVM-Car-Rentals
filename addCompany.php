<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Add a new company.
 * Bug:
 */
	include 'header.php';
?>
<section>
	<div class="form">
		<h1><center>Add a Company</center></h1>
		<p>
		<center>
			<?php
			if (ISSET($_GET['insert'])) {
				echo "A new company added!";
			} else {
				echo "&nbsp;";
			}
			?>
		</center>
		</p>
		<form action="doAddCompany.php" method="post" onsubmit="return checkSubmit()">
			<label>Company Name</label><br>
			<input type="text" name="companyName" required><br>
			<label>Street</label><br>
			<input type="text" name="street" required><br>
			<label>Town</label><br>
			<input type="text" name="town" required><br>
			<label>County</label><br>
			<input type="text" name="county" required><br>
			<label>Telephone Number</label><br>
			<input type="text" name="telephoneNumber" required><br>
			<label>Credit Limit</label><br>
			<input type="number" name="creditLimite" required><br>
			<br>
			<div class="btn-group">
				<button class="btnRed" type="reset">Clear</button>
				<button class="btnGreen" type="submit">Submit</button>
			</div>
		</form>
	</div>
	<div class="home_car">
		<img id="car" src="./images/car.png">
	</div>
</section>
<script>
	function checkSubmit() {
		var check = confirm("Are you sure to add this company?");

		if (check == true) {
			return true;
		} else {
			return false;
		}
	}
</script>
<?php 
	include 'footer.php';
?>