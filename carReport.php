<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 30/3/2016
 Last edited 	:

 Unit 4 
 Purpose        : Allow user to view all details for each car currently in the fleet. The user
				  can also view these details in a different order i.e. in order of popularity
				  and in order of oldest to newest.
				  
//From plesk -
SELECT Car.RegNo,Status,DateAdded,CumulativeRentals,
	   Model.Model,Manufacturer
FROM Car INNER JOIN Model ON
	   Car.ModelID = Model.ModelID
WHERE  Car.DeleteFlag = 0 Order By Model  

-->
<?php
	include 'header.php';
	require_once 'functions.php';
	$conn = getConnection();
?>
	&nbsp
	<!-- when the user clicks each button the form data is sent to the php using POST -->
	<form action="carReport.php" method="POST" class="form" id="carReport" name ="carReport">
	
		<h2>Rental Report</h2>
		<input type="hidden" name="choice"/> <!-- to hold value of button clicked -->
		<div align = 'center'>
			<h5>Click button to change details in desired order</h5>
			<!-- Buttons -->
			<input type ='button' class="btnGreen" id = "orderOnModel"  value ="Model"
			onclick = 'modelOrder()' title = 'Click to view car details in in order of Model name'>
			
			<input type ='button' class="btnBlue" id = "orderOldToNew" value ="Oldest To New"
			onclick = 'oldestOrder()' title = 'Click to view car details in order of Date added to fleet'>
			
			<input type ='button' class="btnRed" id = "orderOnPop" value ="Popularity"
			onclick = 'popularityOrder()' title = 'Click to view car details in order of popularity'>
		</div><br/>
	<form/>
<script>
	//this function will change the car details in order of Model name 
	function modelOrder(){
		document.carReport.choice.value = "Model";  // Change Value of choice 
		document.carReport.submit();
	}
	//this function will change the car details in order of the date the car was added to database 
	function oldestOrder(){	
		document.carReport.choice.value = "Oldest To New"; // Change Value of choice
		document.carReport.submit();
	}
	//this function will change the car details in order of times each car has been rented
	function popularityOrder(){
		document.carReport.choice.value = "Popularity"; // Change Value of choice
		document.carReport.submit();	
	}
	
</script>
	<?php
		$choice = "Model";         
		if (ISSET($_POST['choice'])){
			$choice = $_POST['choice'];
		}
		if($choice == "Model"){
	?>
			<script>
				document.getElementById("orderOnModel").disabled = true;
				document.getElementById("orderOnPop").disabled = false;
				document.getElementById("orderOldToNew").disabled = false;
			</script>
					<?php
						//This query will select fields from the Car table and the Model table
						//Be aware the two tables are joined creating one big table (Car/Model)
						//This will display Car details in descending order of the Model field 
						$sql = "SELECT Model, Manufacturer, RegNo, Status, DateAdded, CumulativeRentals
								FROM Car INNER JOIN Model ON
								Car.ModelID = Model.ModelID
								WHERE  Car.DeleteFlag = '0' Order By Model";
								
						//when user clicks on Model button function will be called
						produceReport($conn,$sql);
		}
		else if($choice == "Oldest To New"){
		 			?>
			<script>
				document.getElementById("orderOnModel").disabled = false;
				document.getElementById("orderOnPop").disabled = false;
				document.getElementById("orderOldToNew").disabled = true;
			</script>
					<?php
						//This will display car details in order of popularity 
						$sql = "SELECT Model, Manufacturer, RegNo, Status, DateAdded, CumulativeRentals
								FROM Car INNER JOIN Model ON Car.ModelID = Model.ModelID
							 	WHERE Car.DeleteFlag = '0' Order By DateAdded";
						produceReport($conn,$sql);
		}
		else {// if ($choice == "Popularity") 
		
					?>
			<script>
				document.getElementById("orderOnModel").disabled = false;
				document.getElementById("orderOnPop").disabled = true;
				document.getElementById("orderOldToNew").disabled = false;
			</script>
					<?php
						//This will display car details in order of the date the car was added to the database  
						$sql = "SELECT Model, Manufacturer, RegNo, Status, DateAdded, CumulativeRentals 
								FROM Car INNER JOIN Model ON Car.ModelID = Model.ModelID 
								WHERE Car.DeleteFlag = '0' Order By CumulativeRentals DESC";
						produceReport($conn,$sql);
		}
		//end else
		//The purpose of this function is to display a table to the user containing each car(s)
		//The order of that information depends on which one of the above queries (buttons clicked) is called 
		function produceReport($conn,$sql){
			//mysqli_query will perform a query against the database
			$result = mysqli_query($conn,$sql);
			
			echo "<div id='reportView'>
			<div align = 'center'>
				<table>
					<tr>
						<th>&nbsp ModelName &nbsp  </th>
						<th>&nbsp Manufacturer &nbsp  </th>
						<th>&nbsp Registration Number &nbsp  </th>
						<th>&nbsp Status &nbsp  </th>
						<th>&nbsp Date Added &nbsp  </th>
						<th>&nbsp Cumulative Rentals &nbsp  </th>
					</tr>
			</div>";
					
			while ($row=mysqli_fetch_array($result)){ 
					//set up the date for display 
					echo "<tr>
					<td>" . $row ['Model'] . "</td>
					<td>" . $row ['Manufacturer'] . "</td>
					<td>" . $row ['RegNo'] . "</td>
					<td>" . $row ['Status'] . "</td>
					<td>" . $row ['DateAdded'] . "</td>
					<td>" . $row ['CumulativeRentals'] . "</td>
					</tr>";
			}//end while		
		echo "</table> <br>";
		}//end produceReport
				mysqli_close($conn);
						?>
		</div>							
<?php 
	include 'footer.php';
?>