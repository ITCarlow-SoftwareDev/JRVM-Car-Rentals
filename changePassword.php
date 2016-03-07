<?php
	include 'header.php';
?>
<!-- Todo your works -->
	<div class="form">
		<form action="doChangePassword.php" method="post" onsubmit="return checkPassword()">
			<label>Previous Password</label><br>
			<input type="password" name="pre_password"><br>
			<label>New Password</label><br>
			<input type="password" name="password" id="password"><br>
			<label>Confirm New Password</label><br>
			<input type="password" id="confirmPassword"><br>
			<br>
			<button class="btnGreen">Submit</button>
			<button class="btnRed">Cancel</button>
		</form>
	</div>

	<script>
		function checkPassword(){
			var password = document.getElementById('password').value;
			var confirmPassword = document.getElementById('confirmPassword').value;

			if (password == confirmPassword) {
				return true;
			} else {
				return false;
			}
		}
	</script>
<?php 
	include 'footer.php';
?>