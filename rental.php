
<?php
	include 'header.php';
?>

<form id="rental_form" class="form">
  <div id="formLeft">
    <label for="company">Company Name</label>
    <select id="company" name="company" autofocus>
      <option value="">Select a Company:</option>
    
    </select>
    <label>Company Details</label>
    <textarea id="textarea" readonly></textarea>
    <label for="returnDate">Return Date of Vehicle</label><br>
    <input name="returnDate" class="returnDate" type="date"><br>
    <label>Rental Cost</label><br>
    <input class="returnDate" type="text" disabled><br>
  </div>
  <div id="formRight">
    <label>Available Cars</label>
    <div id="available_cars">
    </div>
  </div>
    <div class="rental-form-btn">
      <button class="btnGreen" id="rental_submit_btn" type="submit">Submit</button>
      <button class="btnBlue" id="btnPrint" >Print Rental Agreement</button>
      <button class="btnRed" type="reset" onclick="clearForm()">Clear</button>
    </div>
</form>

<?php 
	include 'footer.php';
?>