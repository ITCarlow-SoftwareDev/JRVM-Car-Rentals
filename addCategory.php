<!-- 
  Author: Mark Kelly
  Date: 25/02/2016
  File Name: addCategory.php
  Purpose: To allow user to add a rental category
-->
<?php
	include 'header.php';
?>
<form name="addCat" id="addCat" class="form" onsubmit="return confirmCheck()" action="doAddCategory.php" method="post">
  <h2>Add a New Rental Category</h2>
  <label for="listAddCat">Current Category List</label>
  <select name="listAddCat" id="listAddCat" title="List of category names currently in use" autofocus>
    <?php 
      include 'listCatId.php'; // display the category id's in the select box
    ?>
  </select>
  <label for="addCatId">New Category Identification</label>
  <input type="text" name="addCatId" id="addCatId" placeholder="Capital letter A-Z only" pattern="[A-Z]{1}"
  title="Capital letter A-Z only" oninput='checkCatId()' autocomplete="off" required>
  <label for="addCostPerDay">New Cost per Day</label>
  <input type="number" name="addCostPerDay" id="addCostPerDay" title="Please enter cost per day for vehicle"
  placeholder="No currency symbol needed e.g. 24.99" min="0" step=".01" required>
  <label for="addFiveDayDisc">New Five Day Discount (%)</label>
  <input type="number" id="addFiveDayDisc" name="addFiveDayDisc" title="Please enter the five day discount as a percentage"
  placeholder="Whole number between 0 and 100 e.g. 15" min="0" max="100" step="1" required>
  <label for="addTenDayDisc">New Ten Day Discount (%)</label>
  <input type="number" name="addTenDayDisc" id="addTenDayDisc" title="Please enter the ten day discount as a percentage"
  placeholder="Whole number between 0 and 100 e.g. 25" min="0" max="100" step="1" required>
  <div class="rental-form-btn">
    <button class="btnRed" type="reset">Cancel</button>
    <button class="btnGreen" type="submit">Save</button>
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<script>
  // checkCatId() checks if the category id entered is the same as a category id already in use
  function checkCatId() {
    var list = document.getElementById('listAddCat');
    var inputCategory = document.getElementById("addCatId").value
    // loop through the current category id's
    for(var i = 0; i < list.options.length; i++) {
      // if the category id entered matches the current category id
      if(inputCategory == list.options[i].value) {
        alert(inputCategory + " is in use, please enter a unique category id");
        // input is invalid -- set the error message
        document.getElementById("addCatId").setCustomValidity("Please enter a unique category id");
        break; // break out of loop if category entered is found in category list
      }
      else {
        // input is valid -- reset the error message
        document.getElementById("addCatId").setCustomValidity("");
      }
    }
  } // end checkCatId
  // confirmCheck() prompts user to confirm details before submiting
  function confirmCheck() {
    var response = confirm("Are you sure you want to add this record?");
    if(response == true) {
      return true;
    }
    else {
      return false;
    }
  } // end confirmCheck
</script>
<?php 
	include 'footer.php';
?>