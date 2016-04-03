<?php
    /*
     * Student Name: MINGJIE SHAO
     * Student ID: C00188468
     * Date: 30-03-2016
     * Todo:
     * Bug:
     */
    include 'header.php';
    require_once 'functions.php';
?>
	<section class="margin-top-100px">
		<div class="form">
			<h1><center>Delete a Company</center></h1>
			<p>&nbsp;</p>
			<form action="doDeleteCompany.php" method="post">
				<label>Company Name</label><br>
				<select id="companies" onchange="showInfo()">
				<?php
					$conn = getConnection();
					$sql = "SELECT * FROM Company;";

					if(!($result = mysqli_query($conn,$sql))) {
						die("sql script:" . mysqli_error($conn));
					}

					while($row = mysqli_fetch_array($result)) {
						echo "<option value=\"" . $row['CompanyName'] . "\">" . $row['CompanyName'] . "</option>";
						echo "<span class=\"hidden\" id=\"" . $row['CompanyName'] . "\">" . $row['Street'] . " " . $row['Town'] . " " . $row['County'] . " " . $row['PhoneNo'] . " " . " " . $row['CreditLimit'] . "</span>";
					}
				?>
				</select>
				<label>Street</label><br>
				<input type="text" name="street"><br>
				<label>Town</label><br>
				<input type="text" name="town"><br>
				<label>County</label><br>
				<input type="text" name="county"><br>
				<label>Telephone Number</label><br>
				<input type="text" name="telephoneNumber"><br>
				<label>Credit Limit</label><br>
				<input type="number" name="creditLimite"><br>
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
	    function showInfo() {
	        var CompanyName = document.getElementById('companies').value;
	        //var str = document.getElementById(CompanyName).value
	    }
	</script>
<?php
    include 'footer.php';
?>