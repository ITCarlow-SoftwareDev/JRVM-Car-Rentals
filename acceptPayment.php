<!-- Page Title: accept Payment
 Author: Vaidas Siupienius  
Date :02/16
Purpose:this screen is used to take payment from clients -->
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
	<option value="">Select Company</option>
<?php 
// getting companis list from list companies file 
	include 'listCompanies.php'; 	  
?>
</select>  
	 <!--not showed only holds company id -->
	 <input  type="hidden" name="companyID" id="companyID" >	
	 <label >Street</label>  
	 <input class="inputFields" type="text" name="street" id="street"  title="street" required readonly>	  
	 <label >Town</label>  
	 <input class="inputFields" type="text" id="town" name="town"  title="town" required readonly>	  
	 <label >County</label>  
	 <input class="inputFields" type="text" id="county" name="county"  title="county" required readonly>	  
	 <label >Current Balance</label>  
	 <input class="inputFields"  type="number" id="currentBalance" name="currentBalance"  title="currentBalance" required readonly>	  
	 <label >Credit Limit</label>   
	 <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required readonly>
</div>
<div id="formRight">	  
	 <label >Amount Paid by Cash</label>  
	 <input class="inputFields"  type="number" step=".01" id="amounByCash" name="amounByCash"  title="amounByCash" 	 >	  
	 <label >Payment Method</label>   
	 <select class="inputFields" name="paymentMethod" id="paymentMethod" onchange="paymentType()" required autofocus>
	 <option value="cash Payment">Cash Payment</option>
	 <option value="card Payment">Card Payment</option>
	 <option value="cash and Card Payment">Cash and Card Payment</option>
	 <option value="cheque Payment">Cheque Payment</option>
</select>
<label >Amount Paid by Cheque</label>  
	 <input class="inputFields" type="number" step=".01" id="amountByCheque" name="amountByCheque"  >
	 <label >Amount Paid by Card</label> 	 
	 <input class="inputFields" type="number" step=".01" id="amountByCard" name="amountByCard"  >	
	 <label >Name on Card</label>  
	 <input class="inputFields"  type="text" id="cardName" name="cardName"  title="cardName"  >	  
	 <label >Card Holder Address</label>   
	 <input class="inputFields" type="text" id="cardAddress" name="cardAddress"  title="cardAddress"   >	  
	 <label >Card Number</label>  
	 <input class="inputFields" type="text" id="cardNumber" name="cardNumber"  title="cardNumber" pattern="[0-9]{16}" >	  
	 <label >CVV</label>
	 <input class="inputFields" type="text" id="cvv" name="cvv"  title="cvv" pattern="[0-9]{3}" >	  
	 <label >Expire Date</label>
	 <input class="inputFields" type="month" id="expireDate" name="expireDate"  title="expireDate"  >	  
</div>
<div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return confirmation()" id="paymentBtn" value="Pay" > 
</div>
</form> 
<script>
//***********************************************************************************************************************************************
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
//****************need to finish **********************************************************************************************************************
 function confirmation(){ 
if (document.getElementById("amounByCash").value==0  && document.getElementById("paymentMethod").value=="cash Payment"){
	alert("Please enter valid amount paying by cash!");
		return false;
	 }	
if (document.getElementById("amounByCash").value==0  && document.getElementById("paymentMethod").value=="cash and Card Payment"){
	alert("Please enter valid amount paying by cash!")
	return false;
}	 
if ( document.getElementById("paymentMethod").value=="card Payment" || document.getElementById("paymentMethod").value=="cash and Card Payment" ){
	if (document.getElementById("amountByCard").value==0){
		alert("Please enter payed by card!");
		return false;
	}
	else if (document.getElementById("cardName").value==""){			
		alert("Please enter name on the card!");
		return false;
	}
	else if (document.getElementById("cardAddress").value==""){
		alert("Please enter card address!");
		return false;
	}
	else if (document.getElementById("cardNumber").value==""){
		alert("Please enter card number!");
		return false;
	}
	else if (document.getElementById("cvv").value==""){
		alert("Please enter card CVV Number!");
		return false;
	}
	else if (document.getElementById("expireDate").value==""){
		alert("Please enter card expire date!");
		return false;
	}	
		
}
if (document.getElementById("amountByCheque").value==""  && document.getElementById("paymentMethod").value=="cheque Payment"){
	alert("Please enter valid amount paying by check!");
		return false;
	 }
		
		var confirmation = confirm("Proceed payment? ");
		if (confirmation== true){
								
			return true;
		}
		
   else	{	  
    return false;	
   }	
}
</script>
<?php 
	include 'footer.php';
?>