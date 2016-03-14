<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016
 Last edited 	:

 Unit 1
 Purpose        : Allow user to enter details of a new car which has been acquired by 
				  JRVM Rentals.
-->
<?php  
	include 'header.php';
?>
<form class="form" name="addCar" id="addCar" onsubmit="return confirmAddition()" action="doAddNewCar.php"  method="post">
			<h2>Add a New Car</h2>
			
			<label id="model">Select Model</label><br>
			<select name="retrievedDetails" id="retrievedDetails" title="Choose model from drop-down" onchange='populate()' required>
				<option value="Select model"</option>
				<?php include "selectModel.php"; ?>      <!--drop down for car models-->
			</select> <br> 
		
			
			<!-- to be populated with relevant data from particular model id -->
			<label>Body Style</label> <br>
			<input type="text" name="bodystyle" id="bodystyle" disabled> <br>
			
			<label>Version</label> <br>
			<input type="text" name="version" id="version" disabled> <br>
			
			<label>Manufacturer</label> <br>
			<input type="text" name="manufacturer" id="manufacturer" disabled> <br>
			
			
			<!-- 
			<label>Category</label> <br>
			<input type="text" name="category" id="category" disabled> <br>
			-->




			
			
			<label>Registration Number</label><br>
			<input type="text" name="regNum" id="theRegNum" title ="Enter Registration Number of car e.g. 1234-LS-2010" placeholder="e.g 1234-LS-161" required> <br> <!-- Make reg pattern, add required -->
			 
			<label>Colour</label> <br>
			<input type="text" name="colour" id="theColour" pattern="[a-zA-Z. ]+" title ="Alpha Characters only" placeholder="e.g Green" required> <br>
			
			<label>Chassis Number (VIN)</label> <br>
			<input type="text" name="chassisNumber" title ="Enter the chassis Number associated with your car. It can be number + letter format" id="theChassisNumber" placeholder="e.g JT164JA80XXXXXXXX" required> <br> <!-- add required -->
			
			<label>Number of Doors </label> <br>
			<input type="number"min="2"  max="10" name="numberOfDoors" title ="Enter number of doors only"  id="theNumOfDoors" placeholder="e.g 5" required><br>
			
			<label>Purchase Price (&euro;'s) </label> <br>
			<input type="number" min="0" step=".01" title="Numbers only indicating how much the car was purchased for" name="purchasePrice" id="thePurchasePrice" placeholder=" e.g 23,999.99" required> <br>   <!-- http://www.w3schools.com/tags/att_input_step.asp -->
			
			<label>Date added to fleet</label> <br>
			<input type="date" name="dateAddedToFleet" id="theAddedDate" required> <br> <!-- add function cant add date in future, add required -->
			
			<label>Engine Size</label><br>
			<input type="number" min="0" max="5" step=".1" name="engineSize" id="thengineSize" placeholder="e.g 1.2" required><br>
			
			<label>Fuel Type</label> 
			<br>
			<select name="fuelType" id="thefuelType">
					  <option value="Petrol">Petrol</option>
					  <option value="Diesel">Diesel</option>
			</select> <br>
			<div class="form-btn">
				<button class="btnRed" type="reset">Clear</button>
				<button class="btnGreen" type="submit">Submit</button>
			</div>
</form>
	<script>
	
		//function declaration
		function confirmAddition(){
			var userFeedback = confirm("Are you sure you want to add this car ???");///3 types alert, comfirm, prompt
			if(userFeedback == true){
				return true;
			}//end if
			else{
				return false;
			}//end else
		} //end confirmAddition()
	

	//function declaration -  
		function populate(){
		var selectM = document.getElementById("retrievedDetails");
		var chosenM = selectM.options[selectM.selectedIndex].value; //chosenM assigned value of the model selected from dropdown
		var retrievedDetails = chosenM.split(',');
		//alert ("The alltext is" + chosenM);
		document.getElementById("bodystyle").value = retrievedDetails[0];
		document.getElementById("version").value = retrievedDetails[1];
		document.getElementById("manufacturer").value = retrievedDetails[2];
		//document.getElementById("category").value = retrievedDetails[3];
		document.getElementById("category").value = "aaaaaaa";
		} // end populate	
	</script>
<?php 
	include 'footer.php';
?>