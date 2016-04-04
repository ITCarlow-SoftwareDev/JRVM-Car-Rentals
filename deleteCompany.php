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
			<form action="doDeleteCompany.php" method="post" onsubmit="return submit()">
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
				<input type="text" id="street" name="street" value="<?php echo $firstCompany[0];?>" readonly><br>
				<label>Town</label><br>
				<input type="text" id="town" name="town" value="<?php echo $firstCompany[1];?>" readonly><br>
				<label>County</label><br>
				<input type="text" id="county" name="county" value="<?php echo $firstCompany[2];?>" readonly><br>
				<label>Telephone Number</label><br>
				<input type="text" id="telephoneNumber" name="telephoneNumber" value="<?php echo $firstCompany[3];?>" readonly><br>
				<label>Credit Limit</label><br>
				<input type="number" id="creditLimite" name="creditLimite" value="<?php echo $firstCompany[4];?>" readonly><br>

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
			var choose = document.getElementById('companies').value;
			var array = choose.split(",");

			document.getElementById('street').value = array[1];
			document.getElementById('town').value = array[2];
			document.getElementById('county').value = array[3];
			document.getElementById('telephoneNumber').value = array[4];
			document.getElementById('creditLimite').value = array[5];
	    }
        
        function submit() {
            var companyName = document.getElementById('companies').value;
            var aaa = confirm("Are you sure to delete " + companyName);

            return false;
        }

	</script>
<?php
include 'footer.php';
?>