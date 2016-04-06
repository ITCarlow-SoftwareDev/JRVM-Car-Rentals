<!-- 
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: amendCategory.php
  Purpose: To allow user to view and amend rental categories
-->
<?php
	include 'header.php';
?>
<form name="amendCat" id="amendCat" class="form" onsubmit="return confirmCheck()" action="doAmendCategory.php" method="post">
  <h2>View/Amend a Rental Category</h2>
  <label id="viewAmend">Categories</label>
  <select name="listAmendCat" id="listAmendCat" onchange='populate()' title="Please select a category id from the list" required autofocus>
    <option value="">Select a Category</option>
    <?php 
      include 'doListCategoryA.php'; // display the category id's in the select box
    ?>
  </select>
  <!-- hidden input box to store the category id -->
  <input type="text" name="amendCatId" id="amendCatId" style="display: none;">
  <label for="amendCostPerDay">Cost per Day</label>
  <input type="number" name="amendCostPerDay" id="amendCostPerDay"
  title="Please enter cost per day for vehicle" min="0" step=".01" required disabled>
  <label for="amendFiveDayDisc">Five day Discount (%)</label>
  <!-- Allow user to enter whole numbers between 0 and 100 inclusive -->
  <input type="number" id="amendFiveDayDisc" name="amendFiveDayDisc"
  title="Please enter the five day discount as a percentage" min="0" max="100" step="1" required disabled>
  <label for="amendTenDayDisc">Ten day Discount (%)</label>
  <input type="number" name="amendTenDayDisc" id="amendTenDayDisc"
  title="Please enter the ten day discount as a percentage" min="0" max="100" step="1" required disabled>
  <div class="form-btn">
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">
    <input type="button" class="btnBlue" id="amendBtn" value="Amend" onclick = "toggleLock()">
    <input type="submit" class="btnGreen" id="btnSaveChanges" value="Save Changes" style="display: none">
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<script>
  // display the details for the selected category
  function populate(){
    var sel = document.getElementById("listAmendCat");
    var result = sel.options[sel.selectedIndex].value;
    var categoryDetails = result.split(',');
    document.getElementById("amendCatId").value = categoryDetails[0];
    document.getElementById("amendCostPerDay").value = categoryDetails[1];
    document.getElementById("amendFiveDayDisc").value = categoryDetails[2];
    document.getElementById("amendTenDayDisc").value = categoryDetails[3];
    document.getElementById("amendBtn").disabled = false;
  } // end populate
  // toggles the buttons and input fields depending on the value of the amend button
  function toggleLock() {
    if(document.getElementById("amendBtn").value == "Amend") {
      document.getElementById("amendCostPerDay").disabled = false;
      document.getElementById("amendFiveDayDisc").disabled = false;
      document.getElementById("amendTenDayDisc").disabled = false;
      document.getElementById("amendBtn").value = "View";
      // http://www.w3schools.com/jsref/prop_style_display.asp [Accessed 25 Mar. 2016].
      document.getElementById("btnSaveChanges").style.display = "inline"; // display the "Save Changes" button
    }
    else {
      document.getElementById("amendCostPerDay").disabled = true;
      document.getElementById("amendFiveDayDisc").disabled = true;
      document.getElementById("amendTenDayDisc").disabled = true;
      document.getElementById("amendBtn").value = "Amend";
      // hide the "Save Changes" button
      document.getElementById("btnSaveChanges").style.display = "none";
    }
  } // end toggleLock
  // confirmCheck() prompts user to confirm details before submiting
  function confirmCheck() {
    var response = confirm("Are you sure you want to save these changes");
    if(response == true) {
      return true;
    }
    else {
      populate();
      toggleLock();
      return false;
    }
  } // end confirmCheck
</script>
<?php 
	include 'footer.php';
?>