<?php
	include 'header.php';
?>
<!-- Todo your works -->
	<div class="form" id="changePassword-form">
		<form action="doChangePassword.php" method="post" onsubmit="return checkPassword()">
			<h1>Change Password</h1>
			<p id="error-msg">
				<?php
				if(isset($_GET['error_message'])) {
					if($_GET['error_message']=="true") {
						echo "Change password successful!";
					} else {
						echo "Your previous password is incorrect.";
					}
				} else {
					echo "&nbsp;";
				}
				?>
			</p><br>
			<label>Previous Password</label><br>
			<input type="password" name="pre_password"><br>
			<label>New Password</label><br>
			<input type="password" name="password" id="password"><br>
			<label>Confirm New Password</label><br>
			<input type="password" id="confirmPassword">
			<div class="btn-group">
				<button class="btnRed">Cancel</button>
				<button class="btnGreen">Submit</button>
			</div>
		</form>
	</div>

	<script>
		function checkPassword(){
			var password = document.getElementById('password').value;
			var confirmPassword = document.getElementById('confirmPassword').value;

			if (password == confirmPassword) {
				alert("Are you sure to change your password")
				return true;
			} else {
				alert("Your new password doesn't matched.");
				return false;
			}
		}
	</script>
<?php 
	include 'footer.php';
?>