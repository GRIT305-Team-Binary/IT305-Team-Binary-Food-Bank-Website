<?php
	/* Breakfast Sponsors
	 * Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/sponsers.php
	 */
	 
?>

	<!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"
          rel="stylesheet">

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


				echo '<table width="100%" class="table table-bordered table-striped" id="sponsors">';
				echo '<thead>';
				echo '<tr><th class="">Name</th><th class=" hidden-xs">Organization</th>';
				echo '<th class="">Phone</th><th class="">Email</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				//Process the rows
				while ($row = mysqli_fetch_assoc($result)) {


					$fname = htmlentities($row['fname']);
					$mname = htmlentities($row['mname']);
					$lname = htmlentities($row['lname']);
					$org = htmlentities($row['Bus_Org']);
					$phone = htmlentities($row['phone']);
					$email = htmlentities($row['email']);

					//Print rows
					echo  "<tr><td> $fname $mname  $lname </td>";
					echo "<td class='hidden-xs'>$org</td>";
					echo "<td> $phone</td>";
					echo "<td> $email</td>";
					echo '</tr>';
					echo '</tbody></table>';

				}     
					

			?>
			<p>Breakfast sponsors can <a href="/sponsor.php">sign up online</a>.</p>

			</div>
		</div>
	</div>
</div>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="//maxcdn.bootstrapcdn.com/3.3.6/js/bootstrap.min.js"></script>
      <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
      

	<script>
		$('#sponsors').DataTable();    
	</script>

</body>
</html>
