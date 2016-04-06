<!-- Page Title: Add to Blacklist
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This screen is used for add companies blacklist  -->
<?php
	include 'header.php';
?>
<form class="form" id="blacklistForm" action="vAmandingBlacklist.php" method="post" >
<?php
	// printing message what company is added 
	if(ISSET($_GET['updated'])){
		if($_GET['updated']==true){
			echo "<p id='confirmationMessage'>Company details was updated!<p>";
		}
	}
?>
  <h2>Amend/View Companies in Blacklist</h2>
  <div id="formLeft">
	  <label >Select Company</label>
	  <select class="inputFields" name="listCompanies" id="listCompanies" onchange='populate()'  title="Companies" required autofocus>
	  <option value="">Select Company</option>
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
	  
	  <label for="town">Amount owed at Blacklist Date</label>  									
	  <input class="inputFields"  type="text" id="balanceOnStarting" name="balanceOnStarting"  title="balanceOnStarting" required >	<!-- d is for number -->
	  
	  
	  <label for="town">Amount owed at Present</label>  
	  <input class="inputFields"  type="number" id="currentBalance" name="currentBalance"  title="currentBalance" required readonly>
	  
	  <label for="town">Credit Limit</label>   
	  <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required readonly>
	  
	  <label for="town">Date Blacklisted</label>  
	  <input class="inputFields" type="date" id="dateBlacklisted" name="dateBlacklisted"  title="dateBlacklisted" required >
	  
	  
  </div> 

  <div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Clear">   
    <input type="submit" class="btnGreen" onclick="return validInputs()" id="AddToBlacklist" value="Amend" > 
  </div>
</form> 

<script>

var newDate =document.getElementById("dateBlacklisted").value;
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
    var confirmation = confirm("Are you sure you want change details? ");
    if (confirmation== true)
		
       return true;
   else	
    return false;

	}

	// form validation
function validInputs(){
	//http://www.webdeveloper.com/forum/showthread.php?67608-Date()-format-as-mm-dd-yyyy at 05-04-2016 date format
var today = new Date(); 
var dd = today.getDate(); 
var mm = today.getMonth()+1;//January is 0! 
var yyyy = today.getFullYear(); 
if(dd<10){dd='0'+dd}; 
if(mm<10){mm='0'+mm}; 
 // end of reference
var date = yyyy+'-'+mm+'-'+dd; 
var newDate =document.getElementById("dateBlacklisted").value;

	if (document.getElementById("balanceOnStarting").value ==0){
		alert("Please enter valid amount Balance on Start (Can't be 0)");
		return false;
	}
	else if(date<newDate){
		alert("Please enter valid date (Can't be future date)");		
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