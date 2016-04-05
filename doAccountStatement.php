<!--
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016
 Last edited 	:

 Purpose        : Creates the table in account statement on accountStatements.php .
-->

<?php
require_once 'functions.php';
$con = getConnection();
$selectedCompID= $_POST['compID'];

/*creates the table and applies the headings listed below*/

echo "<table border = '1' cellspacing = '5' width = '90%'>";
echo '<tr><th>Start Date</th>
				  <th>Return Date </th>
				  <th>Cost</th></tr>';

/*selects the data from the specified table*/
$sql ="SELECT Rental.CompanyID, RentalDate, ActualReturnDate, TotalCostOfRental, 
		   Company.CompanyID 
		   From Company INNER JOIN Rental 
		   ON Company.CompanyID = Rental.CompanyID 
		   WHERE Rental.DeleteFlag = '0' ";

/*Call function to transfer data to table*/
printStatement($con,$sql);

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