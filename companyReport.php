<?php

/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: A report for all companies.
 * Completed:
 *   1. Check if the company has negative balance.
 *   2. Show company details when choosing a company.
 *   3. Show the first option info at beginning.
 * Bug:
 */
include 'header.php';
require_once 'functions.php';

$sql = "SELECT * FROM Company";
$conn = getConnection();

if (isset($_GET['order'])) {
	$sql = $sql . " ORDER BY Company.CumulativeRentals " . $_GET['order'];
}

if(!($result = mysqli_query($conn,$sql))) {
	die("sql script:" . mysqli_error($conn));
}
?>
	<section class="margin-top-100px">
		<div class="form company-report">
			<h2><center>Company Report</center></h2>
			<br>
			<table id="company-report-table">
				<thead class="tableHead">
					<tr id="company-report-thead">
						<th>Company Name</th>
						<th>Address (first line)</th>
						<th>Cumulative Rentals</th>
						<th>Cumulative Blacklists</th>
						<th>Credit Limit</th>
						<th>Current Balance</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$counter = 0;

						while ($row = mysqli_fetch_array($result)) {
							// If the index of row is even number, background color is grey otherwise is white.
							echo $counter%2!=0?"<tr class='td'>":"<tr>"; // Conditional operator
							echo "<td>" . $row['CompanyName'] . "</td>";
							echo "<td>" . $row['Street'] . "</td>";
							echo "<td>" . $row['CumulativeRentals'] . "</td>";
							echo "<td>" . $row['CumulativeBlacklists'] . "</td>";
							echo "<td>" . $row['CreditLimit'] . "</td>";
							echo "<td>" . $row['CurrentBalance'] . "</td>";
							echo "</td></tr>";

							$counter++;
						}
					?>
				</tbody>
			</table>
			<center>
				<div>
					<a href="javascript:;"><button class="btnGreen" id="company-report-btn">Descending</button></a>
					<a href="javascript:;"><button class="btnRed" id="company-report-btn">Ascending</button></a>
				</div>
			</center>
		</div>
	</section>

<script>
	document.getElementsByClassName('btnGreen')[0].onclick = function () {
		// Reference: JavaScript Window Location. 2016. JavaScript Window Location. [ONLINE] Available at: http://www.w3schools.com/js/js_window_location.asp. [Accessed 06 April 2016].
		window.location.href = "/companyReport.php?order=DESC";
	};

	document.getElementsByClassName('btnRed')[0].onclick = function () {
		window.location.href = "/companyReport.php?order=ASC";
	};
</script>
<?php
include 'footer.php';
?>