<!-- Page Title: Add to Blacklist
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This screen is used for add companies from blacklist  -->
<?php
	include 'header.php';
?>


<form class="form" id="blacklistForm" action="addingBlacklist.php" method="post" >
  <h2>Add to Blacklist</h2>
    <div id="formLeft">
  <label >Select Company</label>
  <select class="inputFields" name="listCompanies" id="listCompanies" onchange='populate()' title="Companies" required autofocus>
    <option value=""></option>
    <?php 
      include 'listCompanies.php'; // display the companies id's in the select box
    ?>
  </select>
  <!-- hidden input box to store the category id -->
  
  <input class="inputFields" type="text" name="listCompanies" id="listCompanies" style="display: none;">
  
  <label for="street">Street</label>  
  <input class="inputFields" type="text" name="street" id="street"  title="street" required disabled>
  
    <label for="town">Town</label>  
  <input class="inputFields" type="text" id="town" name="town"  title="town" required disabled>
  
   <label for="town">County</label>  
  <input class="inputFields" type="text" id="county" name="county"  title="county" required disabled>
  </div>
    <div id="formRight">
  
   <label for="town">Current Balance</label>  
  <input class="inputFields"  type="number" id="balance" name="balance"  title="balance" required disabled>
  
   <label for="town">Credit Limit</label>   
  <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required disabled>
  
   <label for="town">Times Previous Blacklisted</label>  
  <input class="inputFields" type="number" id="previousBlacklisted" name="previousBlacklisted"  title="previousBlacklisted" required disabled>
  
  <label for="town">Description</label>
 <textarea name="description" id="description"  cols="50" rows="5"></textarea>
  </div> 

     <div class="rental-form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Clear">
   
    <input type="submit" class="btnGreen" id="AddToBlacklist" value="Add Blacklist">
  </div>
</form>

  
 

<script>

  // populate() displays the details for the selected category
  function populate(){
  
    var sel = document.getElementById("listCompanies");
    var result = sel.options[sel.selectedIndex].value;

    var companyDetails = result.split(',');
   // document.getElementById("listCompanies").value = companyDetails[0];
    document.getElementById("street").value = companyDetails[1];
    document.getElementById("town").value = companyDetails[2];
    document.getElementById("county").value = companyDetails[3];
	document.getElementById("balance").value = companyDetails[4];
	document.getElementById("limit").value = companyDetails[5];
	document.getElementById("previousBlacklisted").value = companyDetails[6];
	
    
  } // end populate

  


</script>







<?php 
	include 'footer.php';
?>