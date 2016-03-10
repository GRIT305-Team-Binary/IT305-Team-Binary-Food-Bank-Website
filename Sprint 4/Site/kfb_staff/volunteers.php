<?php
	/* Volunteer Applications
	 * Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/volunteers.php
	 */

    include('nav.php');
?>

<div class="container-fluid">

    <div class="main">
        <div class="row">
            <!-- Kent Food Bank Staff - View Volunteer Applications -->
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0">
				<h3>Volunteer Applicants</h3>
            <?php
            //Connect to database
            require '../../db.php';


           //Define the SELECT query
            $sql = "SELECT * FROM volunteers ORDER BY date DESC;";

            //Send the query to the database
            $result = @mysqli_query($cnxn, $sql);

			//Create table

            echo '<table width="100%"zz class="table table-bordered table-striped">';
            echo '<tr><th class="text-center">Name</th><th class="text-center hidden-xs">Application</th>';
            echo '<th class="text-center" >Clothing Bank</th><th class="text-center">Office</th><th class="text-center">Food Bank</th> <th class="text-center">Driver</th>';
            echo '<th class="text-center hidden-sm hidden-xs">Phone</th><th class="text-center hidden-sm hidden-xs">Email</th>';
            echo '</tr>';

            //Process the rows
            while ($row = mysqli_fetch_assoc($result)) {

                $id = htmlentities($row['Volunteer_index']);
                $fname = htmlentities($row['fname']);
                $lname = htmlentities($row['lname']);
                $appType= htmlentities($row['appType']);
                $phone = htmlentities($row['phone']);
                $email = htmlentities($row['email']);
                $clothing=htmlentities($row['clothing']);
                $office= htmlentities($row['office']);
                $food= htmlentities($row['food']);
				$drive= htmlentities($row['drive']);

                $url = "volunteer_detail.php?" . http_build_query(array('id'=>$id));
                echo  "<tr><td> <a href='$url'>$fname $lname</a> </td><td class='hidden-xs'>$appType</td>";

                 echo '<td class="text-center">';
                 if ($clothing == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td class="text-center">';
                 if ($office == 'Y'){
                    echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td class="text-center">';

                 if ($food == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
				 echo '</td><td class="text-center">';

                 if ($drive == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                echo '</td>';
				echo "<td class='hidden-sm hidden-xs'> $phone</td>";
                echo "<td class='hidden-sm hidden-xs'> $email</td>";
				 echo '</tr>';
            }

            echo '</table>';
        ?>

		<p>Volunteers can <a href="/volunteer.php">sign up online</a></p>

        </div>
    </div>

</body>
</html>
