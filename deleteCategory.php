<!-- 
  Author: Mark Kelly
  Date: 27/02/2016
  File Name: deleteCategory.php
  Purpose: To allow user to delete a rental category
-->
<?php
	include 'header.php';
?>
<form name="delCat" id="delCat" class="form" onsubmit="return confirmCheck()" action="doDeleteCategory.php" method="post">
  <h2>Delete a Rental Category</h2>
  <label for="listDeleteCat">Categories</label>
  <select name="listDeleteCat" id="listDeleteCat" onchange='populate()' title="List of category id's" required autofocus>
  <option value="">Select a category to delete</option>
    <?php 
      include 'doListCategoryA.php'; // display the category id's in the select box
    ?>
  </select>
  <!-- hidden input box to store the category id -->
  <input type="text" name="delCatId" id="delCatId" style="display: none;">
  <label for="delCostPerDay">Cost per Day</label>
  <input type="number" name="delCostPerDay" id="delCostPerDay" readonly>
  <label for="delFiveDayDisc">Five Day Discount (%)</label>
  <input type="number" name="delFiveDayDisc" id="delFiveDayDisc" readonly>
  <label for="delTenDayDisc">Ten Day Discount (%)</label>
  <input type="number" name="delTenDayDisc" id="delTenDayDisc" readonly>
  <div class="form-btn">
    <button class="btnRed" type="reset">Cancel</button>
    <button class="btnGreen" type="submit">Delete</button>
  </div>
</form>
<!-- image -->
<div class="home_car">
  <img id="car" src="./images/car.png">
</div>
<script>
  // display the details for the selected category
  function populate(){
    var sel = document.getElementById("listDeleteCat");
    var result = sel.options[sel.selectedIndex].value;
    var categoryDetails = result.split(',');
    document.getElementById("delCatId").value = categoryDetails[0];
    document.getElementById("delCostPerDay").value = categoryDetails[1];
    document.getElementById("delFiveDayDisc").value = categoryDetails[2];
    document.getElementById("delTenDayDisc").value = categoryDetails[3];
  } // end populate
  // prompt user to confirm details before submiting
  function confirmCheck() {
    var response = confirm("Are you sure you want to delete this record!?");
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