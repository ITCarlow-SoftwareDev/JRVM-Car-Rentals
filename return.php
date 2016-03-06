<?php
	include 'header.php';
?>

<form id="rental_form" class="form">
  <div id="formLeft">
   
  



     <label> Return</label><br><br><br>


  <label>Search by Rental ID</label><br><br><br>
  
  
    
    


       

     </div>
  <div id="formRight">
     <label>Car Details</label><br><br><br>

 <label>Return late(days)</label><br><br><br>
 <label>Penalties Type</label><br><br><br>
 <label>Penalties Amount</label><br><br><br>
 <label>Total Amount Due</label><br><br><br>
  </div>
    <div class="rental-form-btn">
      <button class="btnGreen" id="rental_submit_btn" type="submit">Submit</button>
      <button class="btnBlue" id="btnPrint" >Make Payment</button>
      <button class="btnRed" type="reset" onclick="clearForm()">Clear</button>
    </div>
</form>

<?php 
	include 'footer.php';
?>