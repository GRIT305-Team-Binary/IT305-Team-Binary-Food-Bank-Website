<?php
	/* Kent Food Bank Staff
	 * Nicole Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/login.php
	 */
?>
	
		
<?php
	include('nav.php');
	
	$valid = false;
	$user = "";
	$pass = "";
	
	if (isset($_POST['submit'])) {
		
		$username = $_POST['username'];
		$password = $_POST['pword'];
		
		if (strcmp($user, $username) == 0 && strcmp($pass, $password) == 0) {
			$valid = true;
		}
		
		if ($valid) {
			header('Location: index.php');
		} else {
			echo "Invalid login credentials.";
		}
		
	}
?>

<div class="container-fluid">	
		
	<div class="main">
		<div class="row">
			<!-- login form for staff page -->
			<form action="" method="post">
				<label for="username">Username:</label>
				<input type="text" size="20" maxlength="20" name="username"><br>
				<label for="pword">Password:</label>
				<input type="password" size="20" maxlength="20" name="pword"><br>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>
            
</body>
</html>