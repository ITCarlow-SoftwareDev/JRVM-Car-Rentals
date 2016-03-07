<?php
	include 'header.php';
?>
<!-- Todo your works -->
	<div class="form">
		<form action="doAddCompany.php" method="post">
			<label>Company Name</label><br>
			<input type="text" name="companyName"><br>
			<label>Street</label><br>
			<input type="text" name="street"><br>
			<label>Town</label><br>
			<input type="text" name="town"><br>
			<label>County</label><br>
			<input type="text" name="county"><br>
			<label>Telephone Number</label><br>
			<input type="text" name="telephoneNumber"><br>
			<label>Credit Limit</label><br>
			<input type="number" name="creditLimite"><br>
			<br>
			<button class="btnGreen">Submit</button>
			<button class="btnRed">Cancel</button>
		</form>
	</div>
<?php 
	include 'footer.php';
?>