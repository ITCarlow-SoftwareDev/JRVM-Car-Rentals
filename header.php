<!DOCTYPE html>
<html>
<head>
	<title>Menu template</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/form.css">
</head>
<body>
	<div class="wrapper">
	    <header>
	    	<div class="topbar">
		    	<div class="logo">
		    		<a href="rental.php"><img id="logo" src="./images/logo.png"></a>
		    	</div>
		    	<!-- username -->
		    	<div class="top_username">
		    		<span><a href="#">Username&nbsp;<img id="dropdown_icon" src="./images/dropdown.png"></a></span>
					    <ul class="dropdown" id="username_dropdown">
					        	<a href="#"><li>Profile</li></a>
					        	<a href="#"><li>Set up</li></a>
					        	<a href="#"><li>Log out</li></a>
					    </ul>
		    	</div>
	    	</div>
	    	<!-- menu -->
	    	<nav class="secondbar">
	    		<ul class="top_menu">
					<li class="menu_active"><a href="#" class="secondbar_item">Rentals</a>&nbsp;<img id="dropdown_icon" src="./images/dropdown.png">
					    <ul id="rental" class="dropdown">
					    	<li><a href="#">Amend / View</a></li>
					    </ul>
					</li>
					<li><a href="#" class="secondbar_item">Returns</a></li>
					<li><a href="#" class="secondbar_item">File Maintenance</a>
					&nbsp;<img id="dropdown_icon" src="./images/dropdown.png">
				    	<ul id="fileMaintenance" class="dropdown">
					    	<li><a href="#">Add</a>
					    	    <ul class="dropdown_second_level">
					    	    	<li><a href="addNewCar.php">Car</a></li>
					    	    	<li><a href="addCompany.php">Company</a></li>
					    	    	<li><a href="addCategory.php">Category</a></li>
					    	    	<!-- <li><a href="#">Model</a></li> -->
					    	    </ul>
					    	</li>
					    	<li><a href="#">Delete</a>
								<ul class="dropdown_second_level" id="company">
					    	    	<li><a href="deleteCar.php">Car</a></li>
					    	    	<li><a href="deleteCompany.php">Company</a></li>
					    	    	<li><a href="deleteCategory.php">Category</a></li>
					    	    	<!-- <li><a href="#">Model</a></li> -->
					    	    </ul>
					    	</li>
					    	<li><a href="#">Amend / View</a>
								<ul class="dropdown_second_level" id="category">
					    	    	<li><a href="amendCar.php">Car</a></li>
					    	    	<li><a href="amendCompany.php">Company</a></li>
					    	    	<li><a href="amendCategory.php">Category</a></li>
					    	    </ul>
					    	</li>
					    </ul>
					</li>
					<li><a href="#" class="secondbar_item">Customers</a></li>
					<li><a href="#" class="secondbar_item">Reports</a>
					&nbsp;<img id="dropdown_icon" src="./images/dropdown.png">
						<ul id="reports" class="dropdown">
					    	<li><a href="companyReport.php">Company</a></li>
					    	<li><a href="carReport.php">Car</a></li>
					    	<li><a href="rentalReport.php">Rental</a></li>
					    </ul>
					</li>
					<li><a href="#" class="secondbar_item">Blacklist</a>
					&nbsp;<img id="dropdown_icon" src="./images/dropdown.png">
						<ul id="blacklist" class="dropdown">
					    	<li><a href="amendBlacklist.php">Amend / View</a></li>
					    	<li><a href="addBlacklist.php">Add</a></li>
					    	<li><a href="removeBlacklist.php">Remove</a></li>
					    </ul>
					</li>
	    		</ul>
	    	</nav>
	    </header>
	    <!-- content -->
	    <section class="content">
	    	<div class="container">