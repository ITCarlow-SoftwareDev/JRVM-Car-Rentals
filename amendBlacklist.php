<!--Vaidas Siupienius  This screen is used for amend/ view companies in blacklist  -->
<?php
	include 'header.php';
?>

<form id="rental_form" class="form">

<h2>Amend/View Companies in Blacklist</h2>
  
   
  



     <label> List of Companies</label><br>
<!--table have to show : Company name, Street, town, county, amount owned, credit limit, number of times previous blacklisted -->





<div class="table" id ="amendViewTable">
<table >
<tr>
   <th>Company Name</th>
<th>Street</th>
<th>Town</th>
<th>County</th>
<th>Amount Owned at Blacklist Date</th>
<th>Amount Owned at Present</th>
<th>Credit Limit</th>
<th>Date Blacklisted</th>
 
</tr>
  <tr>
    <td> <input type="radio" name="gender" value="male"></td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>
</div>



  
 

 <div class="rental-form-btn">
      <button class="btnGreen"" type="Save">Save</button>
      <button class="btnBlue" " >View</button>
      <button class="btnRed" type="reset" onclick="clearForm()">Cancel</button>
    </div>
</form>

<?php 
	include 'footer.php';
?>