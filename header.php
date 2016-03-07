<!DOCTYPE html>
<html>
<head>
	<title>JRVM Rentals</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/form.css">
	<link rel="stylesheet" type="text/css" href="./css/vaidasCss.css">
	<script src="javascript/rental.js"></script>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location: index.php?error_message=3");
}
?>
<div class="wrapper">
	<header>
		<div class="topbar">
			<div class="logo">
				<a href="rental.php"><img id="logo" src="./images/logo.png"></a>
			</div>
			<!-- username -->
			<div class="top_username">
				<span><a href="#"><?php echo $_SESSION['username']; ?>&nbsp;<img id="dropdown_icon" src="./images/dropdown.png"></a></span>
				<ul class="dropdown" id="username_dropdown">
					<a href="changePassword.php"><li>Change Password</li></a>
					<a href="#"><li>Set up</li></a>
					<a href="doLogout.php"><li>Log out</li></a>
				</ul>
			</div>
		</div>
		<!-- menu -->
		<nav class="secondbar">
			<ul class="top_menu">
				<li class="menu_active"><a href="rental.php" class="secondbar_item">Rentals</a>&nbsp;<img id="dropdown_icon" src="./images/dropdown.png">
					<ul id="rental" class="dropdown">
						<li><a href="#">Amend / View</a></li>
					</ul>
				</li>
				<li><a href="return.php" class="secondbar_item">Returns</a></li>
				<li><a href="#" class="secondbar_item">Maintenance</a>
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
				<li><a href="#" class="secondbar_item">Payments</a></li>
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