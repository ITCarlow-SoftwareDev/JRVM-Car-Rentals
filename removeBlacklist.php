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
	  <option value="">Select Company</option>
	  <?php 
		// getting companis list from list companies file 
		include 'vlistBlacklistedCompanies.php'; 	  
	  ?>
	  </select>  
	  <!--not showed only holds company id               -->
	  <input  type="hidden" name="companyID" id="companyID">
	  <input  type="hidden" name="companyName" id="companyName" >  
	
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
	  
	  <input  type="text" id="manager" name="manager"  title="manager" >
	  
	  
  </div> 

  <div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return validInputs()" id="btnRemove" value="Remove" > 
  </div>
</form> 

<script>
  // populate() displays the details for the selected category
function populate(){  
    var sel = document.getElementById("listCompanies");
    var result = sel.options[sel.selectedIndex].value;
	// dividing string to separate details 
    var companyDetails = result.split(',');	
	document.getElementById("companyID").value = companyDetails[0];
	document.getElementById("companyName").value = companyDetails[1];
    document.getElementById("street").value = companyDetails[2];
    document.getElementById("town").value = companyDetails[3];
    document.getElementById("county").value = companyDetails[4];	
	document.getElementById("balanceOnStarting").value = companyDetails[5];
	document.getElementById("currentBalance").value = companyDetails[6];
	document.getElementById("limit").value = companyDetails[7];
	document.getElementById("dateBlacklisted").value = companyDetails[8];
	document.getElementById("manager").value = companyDetails[9];    
	} 
	//function for confirmation
function confirmation(){
	// pop message to confirm to move to blacklist
    var confirmation = confirm("Are you sure you want remove this company from blacklist? ");
if (confirmation== true){
	return true;
}
    
else{
	 return false;
}	
   		
}
// form validation
function validInputs(){
	 var balance =document.getElementById("currentBalance").value;
	 var manager=document.getElementById("manager").value;	 
	 if (manager==1){
		 alert("Only the manager can remove compoanies from blacklist!");
		 return false;
	 }
if (balance>0){
	var ownMoney = confirm("The company still own money?");	
	var sel = document.getElementById("listCompanies");
    var result = sel.options[sel.selectedIndex].value;	
    var companyDetails = result.split(',');	
	var company =document.getElementById("companyName").value = companyDetails[1];     
	var confirmation = confirm("A you sure you want remove ____"+  company  +"___ company from blacklist!");
}
}
</script>

<?php 
	include 'footer.php';
?>