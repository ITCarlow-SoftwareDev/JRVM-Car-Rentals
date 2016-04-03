<!-- Page Title: Add to Blacklist
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This screen is used for add companies blacklist  -->
<?php
	include 'header.php';
?>
<form class="form" id="blacklistForm" action="vpayment.php" method="post" >
<?php
	// printing message what company is added 
	if(ISSET($_GET['updated'])){
		if($_GET['updated']==true){
			echo "<p id='confirmationMessage'>Payment was accepted!<p>";
		}
	}
?>
  <h2>Payment</h2>
  <div id="formLeft">
	  <label >Select Company</label>
	  <select class="inputFields" name="listCompanies" id="listCompanies" onchange="populate()"  title="Companies" required autofocus>
	  <option value=""></option>
	  <?php 
		// getting companis list from list companies file 
		include 'listCompanies.php'; 	  
	  ?>
	  </select>  
	  <!--not showed only holds company id -->
	  <input class="inputFields" type="text" name="companyID" id="companyID" style="display: none;">
	
	  <label for="street">Street</label>  
	  <input class="inputFields" type="text" name="street" id="street"  title="street" required readonly>
	  
	  <label for="town">Town</label>  
	  <input class="inputFields" type="text" id="town" name="town"  title="town" required readonly>
	  
	  <label for="County">County</label>  
	  <input class="inputFields" type="text" id="county" name="county"  title="county" required readonly>
	  
	    <label for="town">Current Balance</label>  
	  <input class="inputFields"  type="number" id="currentBalance" name="currentBalance"  title="currentBalance" required readonly>
	  
	  <label for="town">Credit Limit</label>   
	  <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required readonly>
	  </div>
		<div id="formRight">
	  
	 
	  
	 <label for="town">Amount Paid by Cash</label>  
	  <input class="inputFields"  type="number" id="amounByCash" name="amounByCash"  title="amounByCash"  >
	  
	  <label for="town">Payment Method</label>   
	 <select class="inputFields" name="paymentMethod" id="paymentMethod" onchange="paymentType()" required autofocus>
	  <option value="cash Payment">Cash Payment</option>
	  <option value="card Payment">Card Payment</option>
	  <option value="cash and Card Payment">Cash and Card Payment</option>
	   <option value="cheque Payment">Cheque Payment</option>
</select>

	    <label for="town">Amount Paid by Card</label>  
	  <input class="inputFields" type="number" id="amountByCard" name="amountByCard"   >
	
	  <label for="town">Name on Card</label>  
	  <input class="inputFields"  type="text" id="cardName" name="cardName"  title="cardName"  >
	  
	  <label for="town">Card Holder Address</label>   
	  <input class="inputFields" type="text" id="cardAddress" name="cardAddress"  title="cardAddress"  >
	  
	  <label for="town">Card Number</label>  
	  <input class="inputFields" type="number" id="cardNumber" name="cardNumber"  title="cardNumber"  >
	  
	  <label >CVV</label>
	    <input class="inputFields" type="number" id="cvv" name="cvv"  title="cvv"  >
	  
	  
	  <label for="town">Expire Date</label>
	    <input class="inputFields" type="month" id="expireDate" name="expireDate"  title="expireDate"  >


	  
  </div> 

  <div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return validInputs()" id="paymentBtn" value="Pay" > 
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
	document.getElementById("currentBalance").value = companyDetails[5];
	document.getElementById("limit").value = companyDetails[6];
	
	} 
	function paymentType(){
		
		 var select = document.getElementById("paymentMethod");
    var payment = select.options[select.selectedIndex].value;
	}
		//function for confirmation
 function confirmation(){
	// pop message to confirm to move to blacklist
    var confirmation = confirm("Proceed payment? ");
    if (confirmation== true)
		
       return true;
   else	
    return false;

	}

	// form validation
function validInputs(){
confirmation();
}
</script>

<?php 
	include 'footer.php';
?>