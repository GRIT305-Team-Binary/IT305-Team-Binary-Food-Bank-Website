<?php
	/* Volunteer Applicant
	 * Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/volunteer_detail.php
	 * Shows detail of one volunteer's application
	 */

    include('nav.php');
?>

<div class="container-fluid">

    <div class="main">
        <div class="row">
            <!-- Kent Food Bank Staff - View Volunteer Applications -->
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 ">
				<h3>Volunteer Applicant</h3>
            <?php
            //Connect to database
            require '../../db.php';

            $id = $_GET['id'];
           //Define the SELECT query
            $sql = "SELECT * FROM `volunteers` WHERE Volunteer_index ='$id' ;";

            //Send the query to the database
            $result = @mysqli_query($cnxn, $sql);


            echo '<table width="100%" class="table table-bordered table-striped">';


            //Process the rows
            while ($row = mysqli_fetch_assoc($result)) {

                $id = htmlentities($row['Volunteer_index']);
				$date = date('l F j, Y', strtotime(htmlentities($row['date'])));
				$appType= htmlentities($row['appType']);
				$fname = htmlentities($row['fname']);
                $lname = htmlentities($row['lname']);
				$address = htmlentities($row['address']);
                $city = htmlentities($row['city']);
				$zip = htmlentities($row['zip']);
                $phone = htmlentities($row['phone']);
                $email = htmlentities($row['email']);
                $clothing=htmlentities($row['clothing']);
                $office= htmlentities($row['office']);
                $food= htmlentities($row['food']);
				$drive= htmlentities($row['drive']);
				$whyVolunteer = htmlentities($row['whyVolunteer']);
				$lift = htmlentities($row['lift']);
				$crime = htmlentities($row['crime']);
				$questions = htmlentities($row['questions']);
				$monday = htmlentities($row['monday']);
				$tuesday = htmlentities($row['tuesday']);
				$wednesday = htmlentities($row['wednesday']);
				$thursday = htmlentities($row['thursday']);
				$friday = htmlentities($row['friday']);
				$weekends = htmlentities($row['weekends']);
				
				echo '<tr><th class="text-center" colspan="6">Date</th>';
                echo  "<tr><td class='text-center' colspan='6'>$date</td>";

				// Name and Application Type
                echo '<tr><th class="text-center" colspan="3">Name</th><th class="text-center" colspan="3">Application Type </th></tr>';
                echo  "<tr><td class='text-center' colspan='3'>$fname $lname</td><td class='text-center' colspan='3'>$appType</td></tr>";

			    //Phone and Email
				echo '<th class="text-center" colspan="2">Address</th><th class="text-center" colspan="2">City</th><th class="text-center" colspan="2">Zip Code</th></tr>';
				echo '<tr>';
                echo "<td class='text-center' colspan='2'> $address</td>";
                echo "<td class='text-center' colspan='2'> $city</td>";
				echo "<td class='text-center' colspan='2'> $zip</td>";
				echo '</tr>';

			   //Phone and Email
				echo '<tr><th class="text-center" colspan="3">Phone Number</th><th class="text-center" colspan="3">E-mail Address</th></tr></tr>';
				echo '<tr>';
                echo "<td class='text-center' colspan='3'> $phone</td>";
                echo "<td class='text-center' colspan='3'> <a href='mailto:$email'>$email</a></td>";
				echo '</tr>';

				//Volunteer Opprotunities
				echo '<tr><th class="text-center"  colspan="2">Clothing Bank</th>';
				echo '<th class="text-center" colspan="1">Office</th>';
				echo '<th class="text-center" colspan="2">Food Bank</th>';
				echo '<th class="text-center" colspan="1">Driver</th></tr>';
                echo '<tr>';
				echo '<td class="text-center" colspan="2">';
				if ($clothing == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td class="text-center" colspan="1">';
                 if ($office == 'Y'){
                    echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td class="text-center" colspan="2">';

                if ($food == 'Y'){
                    echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td class="text-center" colspan="1">';

                 if ($drive == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                echo '</td></tr>';

				//Supplemental Questions
				echo '<tr><th class="text-center" colspan="3">Can lift 40 pounds?</th><th class="text-center" colspan="3">Committed a crime?</th></tr>';
				echo '<tr>';
                echo "<td class='text-center' colspan='3'>" ;
				if ($lift == 'Y'){
                    echo '<span class="glyphicon glyphicon-ok-circle"></span>';
                 }  elseif ($lift=='N') {
					echo '<span class="glyphicon glyphicon-remove-circle"></span>';
				 } elseif ($lift == null) {
					echo '<span class="glyphicon glyphicon-ban-circle"></span>';
				 }
				echo "</td>";
                echo "<td class='text-center' colspan='3'>";
				if ($crime == 'N'){
                    echo 'NO';
                 } elseif ($crime == null) {
					echo 'Not Applicable';
				 }
				echo "</td>";
				echo '</tr>';

				 // Name and Application Type
                echo '<tr><th class="text-center" colspan="3">Reason to Volunteer</th><th class="text-center" colspan="3">Questions</th></tr>';
                echo  "<tr><td class='text-center' colspan='3'>$whyVolunteer</td><td class='text-center' colspan='3'>$questions</td></tr>";
				echo '<tr><th class="text-center" colspan="6">Availability:</th>';
				echo '<tr><th class="text-center" colspan="1">Monday</th>';
				echo '<th class="text-center" colspan="1">Tuesday</th>';
				echo '<th class="text-center" colspan="1">Wednesday</th>';
				echo '<th class="text-center" colspan="1">Thursday</th>';
				echo '<th class="text-center" colspan="1">Friday</th>';
				echo '<th class="text-center" colspan="1">Weekends</th>';
				echo '</tr>';
				echo "<tr><td class='text-center' colspan='1'>";
				if ($monday != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo "</td><td class='text-center' colspan='1'>";
				if ($tuesday != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo "</td><td class='text-center' colspan='1'>";
				if ($wednesday != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo "</td><td class='text-center' colspan='1'>";
				if ($thursday != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo "</td><td class='text-center' colspan='1'>";
				if ($friday != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo "</td><td class='text-center' colspan='1'>";
				if ($weekends != null) { echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo "X"; }
				echo '</td>';
				echo '</tr>';
				

            }

            echo '</table>';
        ?>
		<p>Back to <a href="volunteers.php">list of Volunteers</a></p>
		<p class="pull-right">Volunteers can <a href="/volunteer.php">sign up online</a></p>

        </div>
    </div>

</body>
</html>
