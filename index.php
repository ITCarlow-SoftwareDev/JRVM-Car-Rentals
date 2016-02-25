<!DOCTYPE html>
<html>
<head>
	<title>Menu template</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href="./css/form.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		session_start();
		if (isset($_SESSION['username'])) {
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
				<div class="index-form">
					<form action="doLogin.php" method="post">
						<label>Username</label><br>
						<input type="text" name="username"><br>
						<label>Password</label><br>
						<input type="password" name="password"><br>
						<button class="btnRed" type="reset">Cancel</button>
						<button class="btnGreen" type="submit">Login</button>
					</form>
				</div>
	    	</div>
	    </section>

	    <footer>
	    	<span class="copyright">Copyright &copy; 2016 All rights reserved.</span>
	    </footer>
    </div>
</body>
</html>