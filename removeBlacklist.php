<!--Vaidas Siupienius  This screen is used for removing companies from blacklist  -->
<?php
	include 'header.php';
?>

<form id="rental_form" class="form">

<h2> Remove from Blacklist</h2>
  <div id="formLeft">
   
  



     <label> Company Name</label><br>
         <select>
               <option value="####">####</option>
 
           </select>

  <label>Street</label><br>
  <input type="text" name="street"><br>

  <label>Town</label><br>
  <input type="text" name="town"><br>

  <label>County</label><br>
<input type="text" name="county"><br>

 

  
    

     </div>
  <div id="formRight">

   <label>Date of Blacklisting</label><br>
   <input type="text" name="dateOfBlacklisting"><br>

  <label>Amount Owned at Blacklist Date</label><br>
   <input type="text" name="amountOwnedAtStart"><br>

  <label>Amount Owned at Present</label><br>
  <input type="text" name="amountAtPresent"><br>

  <label>Credit Limit</label><br>
  <input type="text" name="creditLimit"><br>

   


 <div class="rental-form-btn">
      <button class="btnGreen"" type="Remove">Remove</button>
      <button class="btnBlue" " >remove</button>
      <button class="btnRed" type="reset" onclick="clearForm()">Clear</button>
    </div>
</form>

<?php 
	include 'footer.php';
?>