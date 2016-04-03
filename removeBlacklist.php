<!-- Page Title: Add to Blacklist
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This screen is used remove companies from blacklist  -->
<?php
	include 'header.php';
?>
<form class="form" id="blacklistForm" action="vRemoveFromBlacklist.php" method="post" >
<?php
	// printing message what company is added 
	if(ISSET($_GET['updated'])){
		if($_GET['updated']==true){
			echo "<p id='confirmationMessage'>Company was REMOVED from blacklist!<p>";
		}
	}
?>
  <h2>Remove Companies from Blacklist</h2>
  <div id="formLeft">
	  <label >Select Company</label>
	  <select class="inputFields" name="listCompanies" id="listCompanies" onchange='populate()'  title="Companies" required autofocus>
	  <option value=""></option>
	  <?php 
		// getting companis list from list companies file 
		include 'vlistBlacklistedCompanies.php'; 	  
	  ?>
	  </select>  
	  <!--not showed only holds company id -->
	  <input class="inputFields" type="text" name="companyID" id="companyID" style="display: none;">
	
	  <label for="street">Street</label>  
	  <input class="inputFields" type="text" name="street" id="street"  title="street" required readonly>
	  
	  <label for="town">Town</label>  
	  <input class="inputFields" type="text" id="town" name="town"  title="town" required readonly>
	  
	  <label for="town">County</label>  
	  <input class="inputFields" type="text" id="county" name="county"  title="county" required readonly>
	  </div>
		<div id="formRight">
		
		 <label for="town">Date Blacklisted</label>  
	  <input class="inputFields" type="date" id="dateBlacklisted" name="dateBlacklisted"  title="dateBlacklisted" required readonly>
	  
	  <label for="town">Amount owed at Blacklist Date</label>  
	  <input class="inputFields"  type="number" id="balanceOnStarting" name="balanceOnStarting"  title="balanceOnStarting" required readonly>
	  
	  
	  <label for="town">Amount owed at Present</label>  
	  <input class="inputFields"  type="number" id="currentBalance" name="currentBalance"  title="currentBalance" required readonly>
	  
	  <label for="town">Credit Limit</label>   
	  <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required readonly>
	  
	 
	  
	  
  </div> 

  <div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return validInputs()" id="btnRemove" value="Remove" > 
  </div>
</form> 

<script>

//var newDate =document.getElementById("dateBlacklisted").value;




  // populate() displays the details for the selected category
  function populate(){  
    var sel = document.getElementById("listCompanies");
    var result = sel.options[sel.selectedIndex].value;
	// dividing string to separate details 
    var companyDetails = result.split(',');
	
	document.getElementById("companyID").value = companyDetails[0];
    document.getElementById("street").value = companyDetails[2];
    document.getElementById("town").value = companyDetails[3];
    document.getElementById("county").value = companyDetails[4];
	
	document.getElementById("balanceOnStarting").value = companyDetails[5];
	document.getElementById("currentBalance").value = companyDetails[6];
	document.getElementById("limit").value = companyDetails[7];
	document.getElementById("dateBlacklisted").value = companyDetails[8];
    
	} 
		//function for confirmation
 function confirmation(){
	// pop message to confirm to move to blacklist
    var confirmation = confirm("Are you sure you want remove this company from blacklist? ");
    if (confirmation== true)
       return true;
   else	
    return false;		
	}

	// form validation
function validInputs(){
	 var balance =document.getElementById("currentBalance").value;
	if (balance>0){
		var validation = confirm("The company still own money?");
		    if (validation== true)
				return true;
			else	
				return false;		
	}
	else{
		
			confirmation();
	}

}
</script>

<?php 
	include 'footer.php';
?>