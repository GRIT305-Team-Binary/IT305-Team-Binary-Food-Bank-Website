<?php
	/* Top Ten Items 
	 * Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/update_top_ten_items.php
	 */

     //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
	//Connect to database
	require '../../db.php';
?>  

	

<?php
	include('nav.php');
?>
<div class="container-fluid">		
	<div class="main">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 ">
				<h2 class="text-center">Update Ten Most Needed Items List</h2>
				<?php
				$item="";
				
				//Form has been submitted
				
				if (isset($_POST['submit'])) {
					
				 //print_r($_POST);
				 $isValid = true;
				 
				foreach ($_POST as $key => $value) {
					
					if (empty($value) && $key >=0){
						$missing[] = $value;
						$$key = '';
						$isValid = false;
						echo '<p class="formError text-center">' . $key . ':  No value entered </p>';
					 } 
				 }
				if ($isValid) {
				   echo '<div class="row"><div class="col-xs-10 col-xs-offset-2 col-sm-10 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">'	; 
				foreach ($_POST as $key => $value) {
					   if ($key != "submit") {
						   $value = trim($value);
						   //Escape the data
						   $value = mysqli_real_escape_string($cnxn, $value);
						   //Send to Database
						   $sql = "UPDATE  top_ten_items  SET item = '$value'
								  WHERE item_id = $key";
							$result = @mysqli_query($cnxn, $sql);
							if (!$result) {
							   echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
							   return;
						   }
						   //Display Summary
						   echo '<p>' . $key . ': ' . $value . '</p>';
						  
					   }
				   
					}
					echo '</div></div><div class="row">';
			   echo '<div class="col-xs-12"><div class="row"><h3 class="text-center">Thank you. All your items have been updated</h3></div>'	;
			   echo '<div class="col-xs-12 col-sm-6 text-center"><p>Back to <a href="/">Kent Food Bank Home</a></p></div>';
			   echo '<div class="col-xs-12 col-sm-6 text-center"><p>Back to <a href="index.php">Kent Food Bank Staff</a></p></div>';
			   echo '<p class="text-center"><a href="' .$_SERVER['PHP_SELF']. '">Updade list</a></p>';
			   echo ' </div></div> </div>	</div>';
			   return;
				}
		   }
				
			?>
				<!--Form inputs start here -->
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form">
				    <div class="form-group">
						<!--Created inputs for each row in database -->
						<?php
							//Connect to database
							require '/home/teambinary/db.php';
						
							//Define the SELECT query
							$sql = "SELECT * FROM top_ten_items ORDER BY item_id";
						
							//Send the query to the database
							$result = @mysqli_query($cnxn, $sql);
							
							//Process the rows
							while ($row = mysqli_fetch_assoc($result)) {
						
								$item = $row['item'];
								$id = $row['item_id'];
								echo '<div class="form-group"> <label class="col-xs-2 col-sm-2 control-label text-right">';
								echo $id;
								echo '</label><div class="col-xs-10 col-sm-10"><input class="form-control" name="' . $id ;
								echo  '" type="text" value="';
								if ($_POST) {
									echo $_POST["$id"];
								} else {
									echo $item;
								}
								echo '"></div></div>';
							}
						?>
						
						<input class="pull-right" type="submit" value="Update" name="submit">
				    </div>
				    </form>
				</div>
			</div>
	  </div>
	</div>
</div>
</body>

</html>