<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 29/3/2016

 Unit 4
 Purpose        : Allow user to amend/change details of a car which has been acquired by 
				  JRVM Rentals.				   
-->
<?php
	//Reuse code
	include 'header.php';
?>
<form class="form" name="amendCar" id="amendCarForm" onsubmit="return saveAmendments()" action="doAmendCar.php" method="post">

	<h2>Amend / View a Car</h2>
	<div id="formLeft">	
		<label id="reg">Select Registration Number</label><br>
		<!--drop down for existing car registration numbers-->
		<select name="selectedReg" id="selectedReg" title="Choose car registration from drop-down" onchange='populate()' required>
			<option value="Select Car"</option>
			<?php include "selectCar4Amend.php"; ?>      
		</select>  
	
		<h3>Details for Chosen Car</h3>
		<!-- to update Car table with ModelID if amended (using hidden) -->
		<!--  http://www.w3schools.com/tags/tag_input.asp --> 
		<input type="hidden" name="modelID" id="modelID" disabled>
		
		<!-- to be populated with relevant data from particular car registration number -->
		<label>Car Registration</label> <br>
		<!--All fields disabled until amend button clicked-->
		<input type="text" name="regNo" id="regNo" disabled > <br>
		
		<!--drop down for existing models-->
		<label>Model</label> <br>
		<input type="text" name="model" id="model" disabled > <br>
		
		<!--  <select name="model" id="model" title="Choose car model from drop-down" onchange='populate2()' required>
			<option value="Select Model"</option>
			PHP include "selectCar4Amend.php";       
		</select> 
		-->
		<label>Manufacturer</label> <br>
		<input type="text" name="manufacturer" id="manufacturer" disabled> <br>
	</div><!-- end form left -->
	<div id="formRight">
		<label>Version</label> <br>
		<input type="text" name="version" id="version" disabled> <br>
		
		<label>Chassis Number</label><br>
		<input type="text" name="chassisNo" id="chassisNo" disabled><br>
		 
		<label>Colour</label> <br>
		<input type="text" name="colour" id="colour" disabled> <br>

		<label>Body Style</label> <br>
		<input type="text" name="bStyle" id="bStyle" disabled> <br>
		
		<label>Date Added to Fleet </label> <br>
		<input type="date" name="dateAdded" id="dateAdded" disabled> <br>
		<!--***** end of fields to be populated ***** -->
	</div>		
			<div class="form-btn">
				<input type="reset" class="btnRed" id="btnCancel" value="cancel">
				<input type="button" class="btnBlue" id="btnAmend" value="amend" onclick = "toggle()"
			<!--http://www.w3schools.com/jsref/prop_style_display.asp -->
				<input type="submit" class="btnGreen" id="btnSave" value="save">
			</div>
</form>
<script>
	//Function Declaration
	//This functions enables fields which allows user to alter the records saved details 
	function toggle(){
		//If button amend clicked, enable these fields
		if(document.getElementById("btnAmend").value == "amend") {
			document.getElementById("chassisNo").disabled = false;
			document.getElementById("colour").disabled = false;
			document.getElementById("dateAdded").disabled = false;
			//Change text btnAmend
			document.getElementById("btnAmend").value = "View";
				// "inline" - show button btnSave
				// http://www.w3schools.com/jsref/prop_style_display.asp
				document.getElementById("btnSave").style.display = "inline";
		}//end if
		else{
		  document.getElementById("btnAmend").disabled = true;
		  document.getElementById("chassisNo").disabled = true;
		  document.getElementById("colour").disabled = true;
		  document.getElementById("dateAdded").value = true;
		  document.getElementById("btnAmend").value = "Amend";
		  // hide button
		   // http://www.w3schools.com/jsref/prop_style_display.asp
		  document.getElementById("btnSaveChanges").style.display = "none";
		}//end else	
	}//end toggle
		
	//function declaration
	function saveAmendments(){
						///3 types alert, confirm, prompt
		var userFeedback = confirm("Are you sure you want to save the changes made to this car?");
		
		if(userFeedback == true){
			//Fields need to be enabled to retrieve the values
			document.getElementById("regNo").disabled = false;
			document.getElementById("modelID").disabled = false;
			document.getElementById("model").disabled = false;
			document.getElementById("manufacturer").disabled = false;
			document.getElementById("version").disabled = false;
			document.getElementById("chassisNo").disabled = false;
			document.getElementById("colour").disabled = false;
			document.getElementById("bStyle").disabled = false;
			document.getElementById("dateAdded").disabled = false;
			return true;
		}//end if
		else {
			populate();
			toggleLock();
			return false;
		}//end else
	} //end saveAmendments()

	//function declaration 
	//function declaration 
	//Used to populate fields with data related to value of car registration
	function populate(){
		var selectM = document.getElementById("selectedReg");
		//chosenM assigned value of the model selected from dropdown
		var chosenM = selectM.options[selectM.selectedIndex].value; 
		var retrievedDetails = chosenM.split(',');
		
		document.getElementById("regNo").value = retrievedDetails[0];
		document.getElementById("modelID").value = retrievedDetails[1];
		document.getElementById("model").value = retrievedDetails[2];
		document.getElementById("manufacturer").value = retrievedDetails[3];
		document.getElementById("version").value = retrievedDetails[4];
		document.getElementById("chassisNo").value = retrievedDetails[5];
		document.getElementById("colour").value = retrievedDetails[6];
		document.getElementById("bStyle").value = retrievedDetails[7];
		document.getElementById("dateAdded").value = retrievedDetails[8];
		
		$retrievedDetails = "$regNo,$model,$manufacturer,$version,$chassisNum,$colour,$bStyle,$dateAdded";
	} // end populate
</script>	
<?php 
	//Reuse code
	include 'footer.php';
?>