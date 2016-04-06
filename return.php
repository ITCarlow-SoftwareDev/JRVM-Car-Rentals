<!-- Page Title: Car return, file name:return.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:In this screen user will be able to select rentals from table where will be displayed all rentals ordered by date. 
then User can select what car have accident and write discription about accident. This charge company 250 extra for accident 
   -->
<?php
	include 'header.php';	
	include 'db.inc.php';
	date_default_timezone_set("UTC");
	// creating date 
	$date = date_create();
	// formating date 
	$date=date_format($date,"Y-m-d");
	// query for data from databases
$sql = "SELECT Rental.RegNo, RentalID,ReturnDate, CompanyName,Company.CompanyID,CurrentBalance,CreditLimit, Model,Category.CategoryID, CostPerDay FROM (((Rental INNER JOIN Company ON Company.CompanyID=Rental.CompanyID) INNER JOIN Car ON Rental.RegNo= Car.RegNo) INNER JOIN Model ON Car.ModelID=Model.ModelID) INNER JOIN Category ON Model.CategoryID=Category.CategoryID WHERE  ActualReturnDate ='0000-00-00' ORDER BY ReturnDate";
?>
<!-- table for headers -->
<form class="form" id="blacklistForm"  name="returnform" action="vReturnUpdateBalance.php" method="post" >
<?php
	// printing message what company is added 
	if(ISSET($_GET['updated'])){
		if($_GET['updated']==true){
			echo "<p id='confirmationMessage'>Rental Successful<p>";
		}
	}
?>
  <h2>Car Returns</h2>
  <div class="fullTable"> 
  <table  class="tableHead" >
    <tr >
    <th class="headerColumn1">Rental ID</th>
    <th class="headerColumn2">Registration Number</th>
	<th class="headerColumn3">Model Name</th>	
    <th class="headerColumn4">Company Name</th> 
    <th class="headerColumn5">Date Due Back</th>
	<th class="headerColumn6" >Select</th>
    </tr>
  </table>
  <div class="returnTable">
 <?php
    // getting information from 3 differente tables
	if(!$result = mysqli_query($con, $sql)){
		die('Error in quering the databases' . mysqli_error());
	}  
    echo "<div >";
    echo "<table   id='returnTableHeader'>";
    while($row = mysqli_fetch_array($result)) {
		$rentalID = $row['RentalID'];
		$companyID= $row['CompanyID'];		
		$regNo= $row['RegNo'];
		$returnDate= $row['ReturnDate'];
		$companyName = $row['CompanyName'];	
		$currentBalance =$row['CurrentBalance'];
		$creditLimit=$row['CreditLimit'];		
		$model = $row['Model'];
		$categoryID =$row['CategoryID'];	
		$costPerDay =$row['CostPerDay'];
		$fullString="$rentalID, $regNo,$companyName,$model,$returnDate,$costPerDay,$companyID,$currentBalance,$creditLimit ";
		$dateReturn = Date($returnDate);
		// if rental is overdue or due today will be displayed in red color in the table 
	if ($returnDate<=$date){			
		echo"<tr  id ='tableRow'>		
        <td  class='tableColumn' id='rentalID'>" . $rentalID ." </td> <td class='tableColumn'>" . $regNo ." </td> <td  class='tableColumn'>" .$model ." <td  class='tableColumn'>" . $companyName ." <td  class='tableColumn' >" . $returnDate ." <td  class='tableColumn'><input type='button'  class='btnBlue' onclick='showDetails(\"" . $fullString . "\" )'value='Select'>" ."
        </tr>";		
	}
	else{
		// if rental not due today or earlier will be displayed in normal black color
		echo"<tr  > 
        <td  class='tableColumn' id='rentalID'>" . $rentalID ." </td> <td class='tableColumn'>" . $regNo ." </td> <td  class='tableColumn'>" .$model ." <td  class='tableColumn'>" . $companyName ." <td  class='tableColumn' >" . $returnDate ." <td  class='tableColumn'><input type='button'  class='btnBlue' onclick='showDetails(\"" . $fullString . "\" )'value='Select'>" ."
        </tr>";
	}		 		  
    } 
    echo "</table>";
    echo "</div>";
	mysqli_close($con);	
?>
<!--**************form for display dataor enter data***********************************************************************************************************************-->
</div>
</div>
<div class="textareaReturn" id="formLeft">
<fieldset id="penaltiesFieldset">
<legend>Penalties</legend>
	<!--used to store data for other page usage hidden-->
	<input  type="hidden" name="rental_ID" id="rental_ID" >
	<input  type="hidden" name="regNumber" id="regNumber" >
	<input  type="hidden" name="companyID" id="companyID" >
	<input  type="hidden" name="currentBalance" id="currentBalance" >
	<input  type="hidden" name="limit" id="limit" >
	<input  type="hidden" name="returnDate" id="returnDate" >
	
	<label >Number of Days Late Return</label>
    <input  type="text" id="numDays" readonly>
	<label >Late Return Penalties</label>
    <input  type="text" id="lateReturnPenalties" name="lateReturnPenalties" readonly>
	<!-- will be working if will be clicked on checkbox or just on text-->
	<label id="accidentCheckBox"><input  id="returnForm" type="checkbox" name="HaveAccident" onclick="activeAccident()"> Car have Accident</label><br>
	<!--if there was accident company will be cherged 250euro extra with no different how big was accident-->
	<label >Accident Penalties</label>
    <input  type="text" name="accidentPenalties" id="accidentPenalties" readonly>	
    <label >Total Extra Cost</label>
    <input  type="text" id="totalExtraCost" name="totalExtraCost"readonly>	
</fieldset>	
</div>
<div class="textareaReturn" id="formRight">	
<textarea id="textArea"  rows="10"  type="text" Disabled ></textarea>
	
	<label>Accident Description</label>
	<textarea  rows="10"  type="text" name="accidentDiscription" id="accidentDiscription" disabled="true" ></textarea>
</div>
<div class="form-btn" >
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return confirmation()"value="Save"  > 
</div>
</form>
<script>
// checkbox activating accident fields**and sets total cost********************************************
function activeAccident(returnForm){ 
	var accidentCharge = 250; 	
	var totalExtraCost=document.getElementById("lateReturnPenalties").value;
// if car is not selected then message popup please select car its checking on penalties if its emty thats mean car is not selected	
if (document.getElementById("lateReturnPenalties").value==""){
	var confirmComSelected= confirm("Please select company!");
	document.returnform.returnForm.checked=false;
	var accidentPenalties=document.getElementById("accidentPenalties").value;
	return false;
}
if (document.returnform.returnForm.checked==true){		  
	document.returnform.accidentPenalties.value= accidentCharge;		
	document.getElementById("accidentDiscription").disabled=false; 			 
	document.getElementById("totalExtraCost").value;
	var accidentPenalties=document.getElementById("accidentPenalties").value;
// need parse because reeding as string	
	var total=parseInt(totalExtraCost)+parseInt(accidentPenalties);
	document.getElementById("totalExtraCost").value=total ;	 
	} 
else {
	document.returnform.accidentPenalties.value=0;
	document.getElementById("accidentDiscription").disabled=true;
	document.getElementById("accidentDiscription").value="";
	var lateReturnPenalties=document.getElementById("lateReturnPenalties").value;
	document.getElementById("totalExtraCost").value=lateReturnPenalties ;		  	   
	}	  
}
// display details in textarea for double check***************************************************
function showDetails(fullString){	
	var details=fullString.split(',');		
	document.getElementById("textArea").value = "Rental ID :" + details[0] + "\nCar Registration Number: "+details[1] + "\nCar Model:"+ details[3] + "\nCompany Name: " +details[2];
    document.getElementById("rental_ID").value=details[0];
    document.getElementById("regNumber").value=details[1];
    document.getElementById("companyID").value=details[6];
    document.getElementById("currentBalance").value=details[7];
    document.getElementById("limit").value=details[8];  
	penaltiesCal(details[4],details[5]);
}
// *****calculate penalties for late return if there is late return no discount is given penalties is calculated double full renting prices*******
function penaltiesCal(returnDate,costPerDay){
	var todaysDate = new Date();
	var returnDate= new Date(returnDate);	
	var days =parseInt((todaysDate.valueOf()-returnDate.valueOf())/(1000*24*60*60));
if(days>0){
	document.getElementById("numDays").value=days;
	document.getElementById("lateReturnPenalties").value=days*2*costPerDay;
	var lateReturnPenalties=document.getElementById("lateReturnPenalties").value;
	document.getElementById("totalExtraCost").value=lateReturnPenalties ;		
}
else{
	document.getElementById("numDays").value=0;
	document.getElementById("lateReturnPenalties").value=0;
	document.getElementById("totalExtraCost").value=0;
	}	
}
//function for confirmation*********************************************************************
 function confirmation(){ 
	if (document.getElementById("textArea").value!== ""){
	 var confirmation = confirm("Is returned details are correct? ");
		if (confirmation== true){
			var limit = document.getElementById("limit").value;	
			var currentBalance = document.getElementById("currentBalance").value;	
			var totalPenalties =document.getElementById("totalExtraCost").value;
			var newBalance= parseInt(currentBalance) + parseInt(totalPenalties);
			if(newBalance>=limit){
				alert("Company is reach the limit or over Limit! Please inform company to reduce the balance. Thank you");
			}	
			return true;
		}
 }		
   else	{
	   // alert message what car is not selected
	   alert("Please select which car is returned");
    return false;	
   }	
}	
</script>
<!--***************************************************************************-->
<?php 
	include 'footer.php';
?>