<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 01/04/2016
 Last edited 	:

 Unit 5 
 Purpose        : 
 
-->
<?php
	include 'header.php';
?>
<form class="form" name="prepareAccount" id="prepareAccount" onsubmit="" action="" method="post">
	
	<h2>Company Account Statements</h2>
	<div id="formLeft">	
		<label>Select Company</label>
		<!--drop down for existing companies-->
		<select name="selectedAcc" id="selectedAcc" title="Choose Company from drop-down" onchange='populate()' >
			<option value="Select Company"</option>
			<?php include "selectAccount.php"; ?>      
		</select>  
	
		<h3>Details for Account</h3>
		<!-- to store store compID to retrieve relevant rentalID's later (using hidden) -->
		<!--  http://www.w3schools.com/tags/tag_input.asp --> 
		<input type="hidden" name="compID" id="compID" readOnly>
	
		<!-- to be populated with relevant data from particular car registration number -->
		<label>Company Name</label> <br>
		<input type="text" name="compName" id="compName" readOnly > <br>
		
		<label>Street</label> <br>
		<input type="text" name="street" id="street" readOnly > <br>

		<label>Town</label> <br>
		<input type="text" name="town" id="town" readOnly> <br>
	
		<label>County</label> <br>
		<input type="text" name="county" id="county" readOnly> <br>
		 
		<label>Current Balance</label><br>
		<input type="number" name="currentBalance" id="currentBalance" readOnly><br>
	 	 
		<label>Cumulative Rentals</label> <br>
		<input type="number" name="cumulativeRentals" id="cumulativeRentals" readOnly> <br>
	</div><!--end formLeft -->
	<div id="formRight">
		<h3>Account Statement</h3>
		<input type = "text" name="date" id="date" readonly />
		
		<h4>This statement covers the following rentals : </h4> <br>
		<div>
			<!--invoke php to create and populate the table-->
			<?php include "doAccountStatement.php"; ?> <br> 
			<div>
				<label for="confirm">Balance at last statement date :</label>
				<input type = "text" name="bal" id="bal" readonly /> <br>
				
				<label for="confirm">Amount paid:</label>
				<input type = "text" name="paid" id="paid" readonly /> <br>
				
				<label for="confirm">Total Rentals (As above) :</label>
				<input type = "text" name="rent" id="rent"  readonly /> <br>
			</div>
		</div>
	
	</div><!--end formRight -->
	
</form>
 
<script>
//function declaration 
		function populate(){
			var selectedAcc = document.getElementById("selectedAcc");
			//chosenAcc assigned value of the Company Account selected from dropdown
			var chosenAcc = selectedAcc.options[selectedAcc.selectedIndex].value; 
			var retrievedDetails = chosenAcc.split(',');
			document.getElementById("compID").value = retrievedDetails[0];
			document.getElementById("compName").value = retrievedDetails[1];
			document.getElementById("street").value = retrievedDetails[2];
			document.getElementById("town").value = retrievedDetails[3];
			document.getElementById("county").value = retrievedDetails[4];
			document.getElementById("currentBalance").value = retrievedDetails[5];
			document.getElementById("cumulativeRentals").value = retrievedDetails[6];
		
			$retrievedDetails = "$compID,$compName,$street,$town,$county,$currentBalance,$cumulativeRentals";
		
			var selectedCompanyID = document.getElementById("compID");
			alert("CimpID is: " + selectedCompanyID);
			
			
			//alert ("For debug,Retrieved details are :" + retrievedDetails ); //For Debug **********DELETE
		} // end populate
</script>
<?php 
	include 'footer.php';
?>