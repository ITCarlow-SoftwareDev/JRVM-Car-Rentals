<?php
/*
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Todo:
 * 	1. write js code for choosing option with the details shown
 * Bug:
 */
include 'header.php';
require_once 'functions.php';
?>
	<section class="margin-top-100px">
		<div class="form">
			<h1><center>Delete a Company</center></h1>
			<p>
			<center>
				<?php
					if ($_GET['delete']) {
						echo $_GET['companyName'] . " has been deleted!";
					} else {
						echo "&nbsp;";
					}
				?>
			</center>
			</p>
			<form action="doDeleteCompany.php" method="get" onsubmit="return checkSubmit()">
				<label>Company Name</label><br>
				<select name="company" id="companies" onchange="showInfo()">
					<?php
					$conn = getConnection();
					$sql = "SELECT * FROM Company;";
					if(!($result = mysqli_query($conn,$sql))) {
						die("sql script:" . mysqli_error($conn));
					}
					while($row = mysqli_fetch_array($result)) {
						echo "<option value=\"" . $row['CompanyName'] . "\">" . $row['CompanyName'] . "</option>";
//						echo "<span class=\"hidden\" id=\"" . $row['CompanyName'] . "\">" . $row['Street'] . " " . $row['Town'] . " " . $row['County'] . " " . $row['PhoneNo'] . " " . " " . $row['CreditLimit'] . "</span>";
					}
					?>
				</select>
				<label>Street</label><br>
				<input type="text"><br>
				<label>Town</label><br>
				<input type="text"><br>
				<label>County</label><br>
				<input type="text"><br>
				<label>Telephone Number</label><br>
				<input type="text"><br>
				<label>Credit Limit</label><br>
				<input type="number"><br>
				<br>
				<div class="btn-group">
					<button class="btnGreen">Delete</button>
				</div>
			</form>
		</div>
		<div class="home_car">
			<img id="car" src="./images/car.png">
		</div>
	</section>
	<script>
        function checkSubmit() {
            var companyName = document.getElementById('companies').value;
            var check = confirm("Are you sure for deleting " + companyName + "?");

            if (check) {
                return true;
            } else {
                return false;
            }

        }
		function showInfo() {
			var CompanyName = document.getElementById('companies').value;
			//var str = document.getElementById(CompanyName).value
		}
	</script>
<?php
include 'footer.php';
?>