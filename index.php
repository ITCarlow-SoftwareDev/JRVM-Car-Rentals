<!DOCTYPE html>
<html>
<head>
	<title>JRVM Rentals</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href="./css/form.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./css/MINGJIE.css">
</head>
<body>
<?php
/**
 * Check user session and login status:
 *   if user has logged in, back to rental.php
 *   if not, stay in this page for user to login
 */
session_start();
if(isset($_SESSION['username'])) {
	header("location: rental.php");
}
?>
<div class="wrapper">
	<header>
		<div class="topbar">
			<div class="logo">
				<img id="logo" src="./images/logo.png">
			</div>
		</div>
	</header>
	<!-- content -->
	<section class="content">
		<div class="container">
			<h1 id="index-h1">Welcome to JRVM Car Rentals</h1>
			<div class="index-form">
				<form action="doLogin.php" method="post" class="form" id="index-form">
					<label>Username</label><br>
					<input type="text" name="username" class="index-input"><br>
					<label>Password</label><br>
					<input type="password" name="password" class="index-input">
					<p id="error-msg">
						<?php
						/**
						 * Solve error parameters from url by GET method:
						 *   1. The username which user typed in does not exist in database.
						 *   2. The password for the user was incorrect.
						 *   3. Session does not available anymore.
						 */
						if(isset($_GET['error_message'])) {
							switch($_GET['error_message']) {
								case '1': echo "Username doesn't exist.";
									break;
								case '2': echo "Password is incorrect.";
									break;
								case '3': echo "You haven't logged in.";
							}
						} else {
							echo "&nbsp;";
						}
						?>
					</p>
					<button class="btnGreen" type="submit" id="index-login">Login</button>

				</form>
			</div>

<?php
	include 'footer.php';
?>