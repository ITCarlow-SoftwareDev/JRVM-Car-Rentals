<!-- Page Title: listCompanie.php
 Author: Vaidas Siupienius  
Date :02/16
Purpose:This file taking information from databases company table  -->


<?php
	include 'header.php';	
	include 'db.inc.php';
	
	
//WHERE  ActualReturnDate is null
	//SELECT RentalID,CompanyName, Colour FROM (Rental INNER JOIN Company ON Company.CompanyID=Rental.CompanyID) INNER JOIN Car ON Car.RegNo=Rental.RegNo
$sql = "SELECT Rental.RegNo, RentalID,ReturnDate, CompanyName,Company.CompanyID,CurrentBalance,CreditLimit, Model,Category.CategoryID, CostPerDay FROM (((Rental INNER JOIN Company ON Company.CompanyID=Rental.CompanyID) INNER JOIN Car ON Rental.RegNo= Car.RegNo) INNER JOIN Model ON Car.ModelID=Model.ModelID) INNER JOIN Category ON Model.CategoryID=Category.CategoryID WHERE  ActualReturnDate ='2016-04-01' ORDER BY ReturnDate";
?>
<form class="form" id="blacklistForm" onload="checkRentals()" name="returnform" action="vReturnUpdateBalance.php" method="post" >
  <h2>Return</h2>
  <div class="fullTable">
  <table  class="tableHead" id="returnTable">
    <tr >
    <th class="headerColumn">Rental ID</th>
    <th class="headerColumn">Registration Number</th>
	<th class="headerColumn">Model Name</th>	
    <th class="headerColumn">Company Name</th> 
    <th class="headerColumn">Date Due Back</th>
	<th class="headerColumn" >Select</th>
    </tr>
  </table>
  <div class="returnTable">

  <?php
    // getting information from 3 differente tables
  if(!$result = mysqli_query($con, $sql)){
	die('Error in quering the databases' . mysqli_error());
	}  
    echo "<div >";
    echo "<table >";
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
      echo"<tr  id ='low'> 
            <td  class='tableColumn' id='rentalID'>" . $rentalID ." </td> <td class='tableColumn'>" . $regNo ." </td> <td  class='tableColumn'>" .$model ." <td  class='tableColumn'>" . $companyName ." <td  class='tableColumn' id='returnDate' onload='checkRentals(\"" . $fullString . "\" )'>" . $returnDate ." <td  class='tableColumn'><input type='button'  class='btnGreen' onclick='showDetails(\"" . $fullString . "\" )'value='Select'>" ."
          </tr>"; 		  
    } 
    echo "</table>";
    echo "</div>";
	mysqli_close($con);	
?>
</div>
</div>

<div class="textareaReturn" id="formLeft">
	<!--used to store rentalid for other page usage-->
<input  type="hidden" name="rental_ID" id="rental_ID" >
<input  type="text" name="regNumber" id="regNumber" >
<input  type="text" name="companyID" id="companyID" >
<input  type="text" name="currentBalance" id="currentBalance" >
<input  type="text" name="limit" id="limit" >
<input  type="text" name="returnDate" id="returnDate" >

<textarea id="textArea"  rows="10"  type="text" Disabled ></textarea>


</div>
<div class="textareaReturn" id="formRight">
	
	<label >Number of Days Late Return</label>
    <input  type="text" id="numDays">
	<label >Late Return Penalties</label>
    <input  type="text" id="lateReturnPenalties" name="lateReturnPenalties">
	<!-- will be working if will be clicked on checkbox or just on text-->
	<label id="accidentCheckBox"><input  id="returnForm" type="checkbox" name="HaveAccident" onclick="activeAccident()"> Car have Accident</label><br>
	<!--if there was accident company will be cherged 250euro extra with no different how big was accident-->
	<label >Accident Penalties</label>
    <input  type="text" name="accidentPenalties" id="accidentPenalties" readonly>
	
    <label >Total Extra Cost</label>
    <input  type="text" id="totalExtraCost" name="totalExtraCost"readonly>
	
	<label>Accident Description</label>
	<textarea  rows="10"  type="text" name="accidentDiscription" id="accidentDiscription" disabled="true" ></textarea>

</div>

 <div class="form-btn" >
    <input type="reset" class="btnRed" id="cancelBtn" value="Cancel">   
    <input type="submit" class="btnGreen" onclick="return confirmation()"value="Save"  > 
  </div>
</form>
<script>
window.document.onload = checkRentals();
var accidentCharge = 250;	   
// checkbox activating accident fields
function activeAccident(returnForm){   
       if (document.returnform.returnForm.checked==true){
		     document.returnform.accidentPenalties.value= accidentCharge;		
			 document.getElementById("accidentDiscription").disabled=false;			 
			 var totalExtraCost=document.getElementById("totalExtraCost").value;
			 var accidentPenalties=document.getElementById("accidentPenalties").value;
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

// display details in textarea for double check
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

// need finish still not working should be red text if its late return
function checkRentals(){
//*********** creating date object ********************************************************************************
	
var d = new Date(fullString);
var day = d.getDate();
var month = d.getMonth()+1;
var year = d.getFullYear();
var yearString=day +"-"+month+"-"+year;

var details=fullString.split(',');		
	//var returnD= details[4];
    document.getElementById("returnDate").value=details[4];
	//if(yearString>=returnDate){
		//document.getElementById("row").style.color = "red";
		//alert(yearString);
	//}
	alert(returnD);
//alert(yearString);

//*****************************************************************************************************************

}
// **************calculate penalties for late return if there is late return no discount is given penalties is calculated double full renting prices*************
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
	}	
}
		//function for confirmation
 function confirmation(){ 
 if (document.getElementById("textArea").value!== ""){
	 var confirmation = confirm("Is returned details are correct? ");
	    if (confirmation== true){
		var limit = document.getElementById("limit").value;	
		var currentBalance = document.getElementById("currentBalance").value;	
		var totalPenalties =document.getElementById("totalExtraCost").value;
		var newBalance= currentBalance + totalPenalties;
		if(newBalance>=limit){
			alert("Company is over Limit! ");
		}	
		return true;
		}
 }		
   else	
	   alert("Please select which car is returned");
    return false;		
	}	
</script>
<?php 
	include 'footer.php';
?>