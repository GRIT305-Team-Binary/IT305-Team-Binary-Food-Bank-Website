<?php
	/* Breakfast Sponsors 
	 * Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/sponsers.php
	 */
?>
	

<?php
include('nav.php');
?>

<div class="container-fluid">	

	<div class="main">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 ">
			<!-- Kent Food Bank Staff - View Breakfast Sponsors -->
			<h3>Breakfast Sponsors</h3>
			<?php
				//Connect to database
				require '/home/teambinary/db.php';
			
				
			   //Define the SELECT query
				$sql = "SELECT * FROM `sponsors`";
				// SELECT `sponsor_id`, `sponsor_lvl`, `fname`, `mname`, `lname`, `Bus_Org`, `phone`, `email` FROM `sponsors` -->
			
			
				//Send the query to the database
				$result = @mysqli_query($cnxn, $sql);
			

				echo '<table width="100%" class="table table-bordered table-striped">';
				echo '<tr><th class="text-center">Name</th><th class="text-center hidden-xs">Organization</th>';
				echo '<th class="text-center">Phone</th><th class="text-center">Email</th>';
				echo '</tr>';
				//Process the rows
				while ($row = mysqli_fetch_assoc($result)) {
			
				   
					$fname = $row['fname'];
					$mname = $row['mname'];
					$lname = $row['lname'];
					$org= $row['Bus_Org'];
					$phone = $row['phone'];
					$email = $row['email'];
							
					//Print rows
					echo  "<tr><td> $fname $mname  $lname </td>";
					echo "<td class='hidden-xs'>$org</td>";
					echo "<td> $phone</td>";
					echo "<td> $email</td>";
					echo '</tr>';
				}     
					
				echo '</table>';
			?>
			<p>Breakfast sponsors can <a href="/sponsor.php">sign up online</a>.</p>
			
			</div>
		</div>
	</div>
</div>            
</body>
</html>
        