<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: doListCars.php
  Purpose: Retrieve car details from the database
-->
<?php
require_once 'functions.php';
  $con = getConnection();
  // Get all cars that are available for rent
  $sql = "SELECT * FROM Model INNER JOIN Car ON Model.ModelID = Car.ModelID
          INNER JOIN Category ON Model.CategoryID = Category.CategoryID
          WHERE Car.Status = '0' ORDER BY Model ASC";
  if(!$result = mysqli_query($con, $sql)) {
    die("An Error in the SQL Rental Query: " . mysqli_error($con));
  }
  echo "<div class='tableScroll'>"; // Start the scroll area
  echo "<table class='reportTable'>";
  while($row = mysqli_fetch_array($result)) {
    $manufacturer = $row['Manufacturer'];
    $modelName = $row['Model'];
    $fuelType = $row['FuelType'];
    $engineSize = $row['EngineSize'];
    $catId = $row['CategoryID'];
    $doors = $row['Doors'];
    $regNo = $row['RegNo'];
    $costPerDay = $row['CostPerDay'];
    $fiveDayDisc = $row['FiveDayDiscount'];
    $tenDayDisc = $row['TenDayDiscount'];
    $carInfo = "$regNo,$manufacturer,$modelName,$costPerDay,$fiveDayDisc,$tenDayDisc";
    // Table row starts inside the scroll area
    echo"<tr> 
          <td id='tdModelName'>" . $modelName . "<button type='button' class='btnBlue btnClientInfo'
          onclick='getCarDetails(\"" . $carInfo . "\")' title='Click to select " . $modelName . "'>Select Car</button></td>
          <td>" . $fuelType . "</td>
          <td>" . $engineSize . "</td>
          <td>" . $catId . "</td>
          <td>" . $doors . "</td>
          <td>" . $regNo . "</td>
        </tr>";
  } // end while 
  echo "</table>";
  echo "</div>";  // End the scroll area
  mysqli_close($con);
?>