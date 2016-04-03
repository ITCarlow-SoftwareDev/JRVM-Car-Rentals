<!-- 
  Author: Mark Kelly
  Date: 14/03/2016
  File Name: rental.php
  Purpose: To allow user to make a rental
-->
<?php
	include 'header.php';
  require_once 'functions.php';
  date_default_timezone_set('UTC');
?>
<form id="rentalForm" class="form" onsubmit="return checkCar() && checkCreditLimit() && confirmCheck()" action="doRental.php" method="post">
  <h2>Rentals</h2>
  <fieldset id="companyFieldset">
    <legend>Company Information</legend>
    <div id="left">
      <label for="listComp">Company Name</label>
      <select name="listComp" id="listComp" onchange='populateCompany()' title="Please select a company from the list" required autofocus>
        <option value="">Select a Company</option>
          <?php 
            include 'doListCompany.php';
          ?>
      </select>
      <input type="text" name="compId" id="compId" style="display: none;">
      <input type="text" name="compName" id="compName" style="display: none;">
      <input type="text" name="addressOne" id="addressOne" style="display: none;">
      <input type="text" name="addressTwo" id="addressTwo" style="display: none;">
      <input type="text" name="addressThree" id="addressThree" style="display: none;">
      <label for="compAddress">Company Address</label>
      <textarea name="compAddress" id="compAddress" type="text" readonly></textarea>
    </div>
    <div id="right">
      <label for="compPhone">Company Phone Number</label>
      <input name="compPhone" id="compPhone" type="text" readonly>
      <label for="currentBalance">Company Balance</label>
      <input name="currentBalance" id="currentBalance" type="text" readonly>
      <label for="creditLimit">Company Credit Limit</label>
      <input name="creditLimit" id="creditLimit" type="text" readonly>
    </div>
  </fieldset>
    <table class="tableHead"> <!-- Table head is outside tableScroll div to remain fixed --->
    <tr>
      <th id="thModelName">Model Name</th>
      <th class="carTable">Fuel Type</th>		
      <th class="carTable">Engine Size</th>
      <th class="carTable">Rental Category</th>
      <th class="carTable">Doors</th>
      <th id="thRegNo">Registration Number</th>
    </tr>
  </table>
  <?php
    $con = getConnection();
    $sql = "SELECT * FROM Model
            INNER JOIN Car ON Model.ModelID = Car.ModelID
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
  <!-- Car information fieldset --->
  <fieldset>
    <legend>Car Information</legend>
    <input name="regNo" id="regNo" type="text" style="display: none;">
    <label>Make and Model</label>
    <input name="makeModel" id="makeModel" type="text" readonly>
    <label>Cost per Day</label>
    <input name="costPerDay" id="costPerDay" type="number" readonly>
    <label>Five day Discount (%)</label>
    <input name="fiveDayDisc" id="fiveDayDisc" type="number" readonly>
    <label>Ten day Discount (%)</label>
    <input name="tenDayDisc" id="tenDayDisc" type="number" readonly>
  </fieldset>
  <!-- Rental information fieldset --->
  <fieldset class="fieldsetRight">
    <legend>Rental Information</legend>
    <label for="startDate">Start Date</label>
    <input name="startDate" id="startDate" type="text" value="<?php echo date('d/m/Y');?>" readonly>
    <label for="returnDate">Return Date</label>
    <input name="returnDate" id="returnDate" type="date" title="Please enter return date of rental"
    oninput="getDays(), countDays(this)" required>
    <label for="totalDays">Number of Days</label>
    <input name="totalDays" id="totalDays" type="text" readonly>
    <label for="totalCost">Total Cost</label>
    <input name="totalCost" id="totalCost" type="text" readonly>
    <input type="text" name="newBalance" id="newBalance" style="display: none;">
  </fieldset>
  <div id="rentalButtons">
    <button class="btnGreen" id="rental_submit_btn" type="submit" >Rent Car</button>
    <button class="btnBlue" id="btnPrint">Print Rental Agreement</button>
    <button class="btnRed" type="reset">Cancel</button>
  </div>
</form>
<script>
  // Displays the details for the selected company
  function populateCompany(){
    var sel = document.getElementById("listComp");
    var result = sel.options[sel.selectedIndex].value;
    var companyDetails = result.split(',');
    // I added this If Else because I was getting undefined when user does not
    // select a company
    if(result == "") {
      document.getElementById("compAddress").value = "";
      document.getElementById("compPhone").value = "";
      document.getElementById("currentBalance").value = "";
      document.getElementById("creditLimit").value = "";
    }
    else {
      document.getElementById("compId").value = companyDetails[0];
      document.getElementById("compName").value = companyDetails[1];
      document.getElementById("compAddress").value = companyDetails[2] + ",\n" + companyDetails[3] + ",\n" + companyDetails[4] + ".";
      document.getElementById("addressOne").value = companyDetails[2];
      document.getElementById("addressTwo").value = companyDetails[3];
      document.getElementById("addressThree").value = companyDetails[4];
      document.getElementById("compPhone").value = companyDetails[5];
      document.getElementById("currentBalance").value = companyDetails[6];
      document.getElementById("creditLimit").value = companyDetails[7];
    }
  } // end populateCompany
  // Checks if the number of days for rental is less than or equal to zero
  function countDays(input){
    if (document.getElementById("totalDays").value <= 0) {
      input.setCustomValidity("Rental must be at least one day!");
    }
    else {
      input.setCustomValidity("");
    }
  } // end countDays
  // Gets the number of days for the rental
  function getDays(){
    var oneDay = 86400000; // the number of milliseconds in a day
    var today = new Date();
    // create a date object with the hours, minutes, seconds and milliseconds set to zero
    today = new Date(today.getFullYear(), today.getMonth(), today.getDate());
    var startDate = Date.parse(today); // gets current date in milliseconds
    var endDate = Date.parse(document.getElementById("returnDate").value);
    var numberOfDays = Math.floor((endDate - startDate) / oneDay); // convert difference in milliseconds to days
    if (isNaN(numberOfDays)){
      document.getElementById("totalDays").value = "";
    }else{
      document.getElementById("totalDays").value = numberOfDays;
      totalCosts(); // call totalCosts function to calculate the total cost
    }
  } // end getDays
  // Gets the car details
  function getCarDetails(carInfo) {
    var carDetails = carInfo.split(',');
    document.getElementById("regNo").value = carDetails[0];
    document.getElementById("makeModel").value = carDetails[1] + " "  + carDetails[2];
    document.getElementById("costPerDay").value = carDetails[3];
    document.getElementById("fiveDayDisc").value = carDetails[4];
    document.getElementById("tenDayDisc").value = carDetails[5];
    totalCosts(); // call totalCosts function to calculate the total cost
  } // end getCompanyDetails
  // To check if user has selected a car
  function checkCar() {
    if(document.getElementById("regNo").value == "") {
      alert("You must select a car");
      return false;
    }
    else {
      return true;
    }
  } // end checkCar
  // confirmCheck() prompts user to confirm details before submiting
  function confirmCheck() {
    var response = confirm("Are you sure you want to save these changes");
    if(response == true) {
      return true;
    }
    else {
      return false;
    }
  } // end confirmCheck
  // To work out the total cost of the rental
  function totalCosts() {
    var totalDays = document.getElementById("totalDays").value;
    var costPerDay = document.getElementById("costPerDay").value;
    // Get % in decimal form e.g. 100 - 15% / 100 = 0.85
    var fiveDayDisc = (100 - document.getElementById("fiveDayDisc").value) / 100;
    var tenDayDisc = (100 - document.getElementById("tenDayDisc").value) / 100;
    var totalCost, fiveDays = 5, tenDays = 10;
    // check if there is values in the Total Days field and Cost per Day field
    if(totalDays != "" && costPerDay != "") {
      if(totalDays > tenDays) {
        totalCost = costPerDay * fiveDays + (costPerDay * fiveDays * fiveDayDisc) + ((totalDays - tenDays) * costPerDay  * tenDayDisc);
        document.getElementById("totalCost").value = totalCost.toFixed(2);
      }
      else if(totalDays > fiveDays) {
        totalCost = costPerDay * fiveDays + ((totalDays - fiveDays) * costPerDay * fiveDayDisc);
        document.getElementById("totalCost").value = totalCost.toFixed(2);
      }
      else {
        totalCost = costPerDay * totalDays;
        // W3schools toFixed() returns a string, with the number written with a specified number of decimals
        document.getElementById("totalCost").value = totalCost.toFixed(2);
      }
    }
  } // end totalCost
  // Check if the new balance is greater than the credit limit
  function checkCreditLimit() {
    var totalCost = parseFloat(document.getElementById("totalCost").value);
    var currentBalance = parseFloat(document.getElementById("currentBalance").value);
    var creditLimit = parseFloat(document.getElementById("creditLimit").value);
    var newBalance = totalCost + currentBalance;
    if(newBalance > creditLimit) {
      alert("Credit limit has been reached!\nThe new balance is : \u20AC" + newBalance.toFixed(2) +
            "\nThe credit limit is : \u20AC" + creditLimit.toFixed(2) +
            "\nOutstanding balance must be reduced before rental can proceed!");
      return false;
    }
    else {
      document.getElementById("newBalance").value = newBalance;
      return true;
    }
  } // end checkCreditLimit
</script>
<?php 
	include 'footer.php';
?>