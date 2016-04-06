<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016

 Unit 2 
 Purpose        : Allow user to delete a car which has been acquired by 
				  JRVM Rentals.
-->
<?php
	//Reuse code
	include 'header.php';
?>													<!--Invoke function when button clicked -->
<form class="form" name="deleleACar" id="deleteCarForm" onsubmit="return confirmDeletion()" action="doDeleteCar.php" method="post">

	<h2>Delete a Car</h2>
	<!--Splits data into left column for attractiveness i.e. not one long form -->
	<div id="formLeft">	
		<label id="reg">Select Registration Number</label><br>
		<!--drop down for existing car registration numbers-->
		<select name="selectedReg" id="selectedReg" title="Choose car registration from drop-down" onchange='populate()' required>
			<option value="Select Car"</option>
			<!--drop down for existing car registrations-->
			<?php include "selectCarReg.php"; ?>      
		</select> <br>  
	
		<h3>Details for selected Car</h3>
		<!-- to be populated with relevant data from particular car registration number 
			  fields disabled so user cannot change existing data-->
		<label>Car Registration</label> <br>
		<input type="text" name="regNo" id="regNo" disabled > <br>
		
		<label>Model</label> <br>
		<input type="text" name="model" id="model" disabled > <br>

		<label>Manufacturer</label> <br>
		<input type="text" name="manufacturer" id="manufacturer" disabled> <br>
	</div><!-- end form left -->
	<!--Splits data into right column for attractiveness i.e. not one long form -->
	<div id="formRight">
			<label>Version</label> <br>
			<input type="text" name="version" id="version" disabled> <br>
			
			<label>Engine Size</label><br>
			<input type="number" name="engineSize" id="engineSize" disabled><br>
			 
			<label>Colour</label> <br>
			<input type="text" name="colour" id="colour" disabled> <br>
	
			<label>Body Style</label> <br>
			<input type="text" name="bStyle" id="bStyle" disabled> <br>
			
			<label>Number of Doors </label> <br>
			<input type="number" name="numOfDoors" id="numOfDoors" disabled> <br>
	</div>		
	<!-- class form-btn used to ensure all buttons look the same,when button clicked
		 confirmDeletion() is invoked-->
			<div class="form-btn">
				<button class="btnRed" type="reset">Clear</button>
				<button class="btnGreen" type="submit">Delete</button>
			</div>
</form>
<script>
		//function declaration
		//Asks the user to confirm the deletion of a new record
		function confirmDeletion(){
							///3 types alert, confirm, prompt
			var userFeedback = confirm("Are you sure you want to delete this car from the database?");
			if(userFeedback == true){
				//Fields need to be enabled now so value can be retrieved 
				document.getElementById("regNo").disabled = false;
				document.getElementById("model").disabled = false;
				document.getElementById("manufacturer").disabled = false;
				document.getElementById("version").disabled = false;
				document.getElementById("engineSize").disabled = false;
				document.getElementById("colour").disabled = false;
				document.getElementById("bStyle").disabled = false;
				document.getElementById("numOfDoors").disabled = false;
				return true;
			}//end if
			else{
				return false;
			}//end else
		} //end confirmDeletion

		//function declaration 
		//Used to populate fields with data related to value of registration number chosen
		function populate(){
		var selectM = document.getElementById("selectedReg");
		//chosenM assigned value of the model selected from dropdown
		var chosenM = selectM.options[selectM.selectedIndex].value; 
		var retrievedDetails = chosenM.split(',');
		document.getElementById("regNo").value = retrievedDetails[0];
		document.getElementById("engineSize").value = retrievedDetails[1];
		document.getElementById("colour").value = retrievedDetails[2];
		document.getElementById("numOfDoors").value = retrievedDetails[3];
		document.getElementById("model").value = retrievedDetails[4];
		document.getElementById("manufacturer").value = retrievedDetails[5];
		document.getElementById("version").value = retrievedDetails[6];
		document.getElementById("bStyle").value = retrievedDetails[7];
		
		$retrievedDetails = "$regNo,$model,$manufacturer,$version,$engineSize,$colour,$bStyle,$numOfDoors";
		} // end populate
</script>	
<?php 
	//Reuse code
	include 'footer.php';
?>