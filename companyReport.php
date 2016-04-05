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
$sql = "SELECT * FROM Company";

if(!($result = mysqli_query($conn,$sql))) {
	die("sql script:" . mysqli_error($conn));
}

?>
	<section class="margin-top-100px">
		<div class="form company-report">
			<h1><center>Company Report</center></h1>
			<br>
			<table>
				<thead>
					<tr>
						<th>CompanyID</th>
						<th>CompanyName</th>
						<th>Street</th>
						<th>Town</th>
						<th>County</th>
						<th>PhoneNo</th>
						<th>CreditLimit</th>
						<th>CumulativeRentals</th>
						<th>CurrentBalance</th>
						<th>CumulativeBlacklists</th>
						<th>DeleteFlag</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $row['CompanyID'] . "</td>";
							echo "<td>" . $row['CompanyName'] . "</td>";
							echo "<td>" . $row['Street'] . "</td>";
							echo "<td>" . $row['Town'] . "</td>";
							echo "<td>" . $row['County'] . "</td>";
							echo "<td>" . $row['PhoneNo'] . "</td>";
							echo "<td>" . $row['CreditLimit'] . "</td>";
							echo "<td>" . $row['CumulativeRentals'] . "</td>";
							echo "<td>" . $row['CurrentBalance'] . "</td>";
							echo "<td>" . $row['CumulativeBlacklists'] . "</td>";
							echo "<td>" . $row['DeleteFlag'] . "</td>";

							echo "</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</section>

<?php
include 'footer.php';
?>