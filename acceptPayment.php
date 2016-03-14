<!-- Page Title: Add to Blacklist
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This screen is used to take paymment from customers  -->
<?php
	include 'header.php';
?>
<form class="form" id="paymentForm" action="###############" method="post" >


  <h2>Payment</h2>
  <div id="formLeft">
	  <label >Select Company</label>
	  <select class="inputFields" name="listCompanies" id="listCompanies" onchange='populate()' title="Companies" required autofocus>
	  <option value=""></option>
	  <?php 
		// getting companis list from list companies file 
		include 'listCompanies.php'; 	  
	  ?>
	  </select>  
	  <!--not showed only holds company id -->
	  <label >Company ID</label> 
	  <input class="inputFields" type="text" name="companyID" id="companyID" >
	  
	  <label >Amount Due</label> 
	  <input class="inputFields" type="text" name="companyID" id="companyID" >
	  
	  <label >Payment Type</label>  
	   <select class="inputFields" name="listCompanies" id="listCompanies" onchange='populate()' title="Companies" required autofocus>
	  <option value="cashPayment">Cash Payment</option>
	  <option value="cashPayment">Card Payment</option>
	  <option value="cashPayment">Cash and Card Payment</option>
	  
	  </select> 
	  
	  <label for="town">Amount Paid by Cash</label>  
	  <input class="inputFields" type="text" id="town" name="town"  title="town" required disabled>
	  
	  <label for="town">Amount Paid by Card</label>  
	  <input class="inputFields" type="text" id="county" name="county"  title="county" required disabled>
	  </div>
		<div id="formRight">
	  
	  <label for="town">Name on Card</label>  
	  <input class="inputFields"  type="number" id="currentBalance" name="currentBalance"  title="currentBalance" required >
	  
	  <label for="town">Card Holder Address</label>   
	  <input class="inputFields" type="number" id="limit" name="limit"  title="limit" required disabled>
	  
	  <label for="town">Card Number</label>  
	  <input class="inputFields" type="number" id="previousBlacklisted" name="previousBlacklisted"  title="previousBlacklisted" required disabled>
	  
	  <label >CVV</label>
	  <label for="town">Expire Date</label>
	  
	  
  </div> 

  <div class="form-btn" id ="buttonCenter">
    <input type="reset" class="btnRed" id="cancelBtn" value="Clear">   
    <input type="submit" class="btnGreen" id="AddToBlacklist" value="Add Blacklist">
  </div>
</form> 



<?php 
	include 'footer.php';
?>