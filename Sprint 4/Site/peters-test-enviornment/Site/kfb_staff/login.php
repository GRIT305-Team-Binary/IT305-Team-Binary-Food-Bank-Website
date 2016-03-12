<?php
	/* Kent Food Bank Staff
	 * Nicole Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/login.php
	 */

	 session_start();

$loginMessage	= "";
	 if(isset($_POST['submit'])){
				if(isset($_POST['username']) && isset($_POST['pword'])){

								$dbHost = "localhost";
								$dbUser = "teambina_kfbank";
								$dbPass = "3R(.=kB~UNVx";
								$dbName = "teambina_kentfoodbank";
								$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

								$sql = sprintf("SELECT * FROM admins WHERE username='%s'",
								mysqli_real_escape_string($connection, $_POST['username'])
							);

							$result = mysqli_query($connection, $sql);
							$row = mysqli_fetch_assoc($result);

							if($row){

								$hash = $row['password'];

								if($_POST['pword'] == $hash) {

									$_SESSION['username'] = $row['username'];

									header('Location: index.php');

								}else{
									$loginMessage	= "<span>Login failed</span>";
								}

							} else {
									$loginMessage	= "<span>Login failed</span>";
							}

	}
		mysqli_close($connection);
}

   include('nav.php');
?>

<div class="container-fluid">

	<div class="main">
		<div class="row">
			<!-- login form for staff page -->
			<?php echo $loginMessage;?>
			<form action="" method="post">
				<label for="username">Username:</label>
				<input type="text" size="20" maxlength="20" name="username"><br>
				<label for="pword">Password:</label>
				<input type="password" size="20" maxlength="20" name="pword"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
</div>

</body>
</html>
