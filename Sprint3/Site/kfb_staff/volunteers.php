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
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 ">
				<h3>Volunteer Applicants</h3>
            <?php
            //Connect to database
            require '../../db.php';
        
            
           //Define the SELECT query
            $sql = "SELECT * FROM volunteers ORDER BY date DESC;";
        
            //Send the query to the database
            $result = @mysqli_query($cnxn, $sql);
        
        
            echo '<table width="100%" class="table table-bordered table-striped">';
            echo '<tr><th class="text-center">Name</th><th class="text-center">Application</th>';
            echo '<th class="text-center" >Clothing Bank</th><th class="text-center">Office</th><th class="text-center">Food Bank</th>';
            echo '<th class="text-center">Phone</th><th class="text-center">Email</th>';
            echo '</tr>';
            //Process the rows
            while ($row = mysqli_fetch_assoc($result)) {
        
               
                $fname = $row['fname'];
                $lname = $row['lname'];
                $appType= $row['appType'];
                $phone = $row['phone'];
                $email = $row['email'];
                $clothing=$row['clothing']; //assuming this is a true false value
                $office= $row['office']; //assuming this is a true false value
                $food= $row['food']; //assuming this is a true false value
                
                
                echo  "<tr><td> $fname $lname </td><td>$appType</td>";
               
                 echo '<td>';
                 if ($clothing == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 } 
                 echo '</td><td>';
                 if ($office == 'Y'){
                    echo '<span class="glyphicon glyphicon-ok"></span>';
                 }
                 echo '</td><td>';
                
                 if ($food == 'Y'){
                     echo '<span class="glyphicon glyphicon-ok"></span>';
                 }     
                echo '</td>';
				echo "<td> $phone</td>";
                echo "<td> $email</td>";
				 echo '</tr>';
            }     
                
            echo '</table>';
        ?>
		
		<p>Volunteers can <a href="/volunteer.php">sign up online</a></p>
			
        </div>
    </div>
            
</body>
</html>