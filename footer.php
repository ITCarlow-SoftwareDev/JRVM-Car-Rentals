	    	</div>
	    </section>

	    <footer>
	    	<span class="copyright">Copyright &copy; 2016 All rights reserved.</span>
	    </footer>
    </div>

	<script>
		window.onload = function () {
			var path = window.location.pathname;
			var filename = path.split("/")[1];

			switch (filename) {
				case "rental.php": underline("menu-rental");
					break;
				case "return.php": underline("menu-return");
					break;
				case "addNewCar.php":
				case "addCategory.php":
				case "addCompany.php":
				case "deleteCar.php":
				case "deleteCategory.php":
				case "deleteCompany.php":
				case "amendCar.php":
				case "amendCategory.php":
				case "amendCompany.php": underline("menu-maintenance");
					break;
				case "accountStatements.php":
				case "acceptPayment.php": underline("menu-account");
					break;
				case "carReport.php":
				case "companyReport.php":
				case "rentalReport.php": underline("menu-report");
					break;
				case "amendBlacklist.php":
				case "addBlacklist.php":
				case "removeBlacklist.php": underline("menu-blacklist");
					break;

			}
		};

		function underline (tag) {
			var list = document.getElementById('top_menu').childNodes;

			// Clear all menu underlines
			for (var i = 1; i < list.length; i += 2) {
				list[i].className = "";
			}

			document.getElementById(tag).className = "menu_active";
		};
	</script>
</body>
</html>