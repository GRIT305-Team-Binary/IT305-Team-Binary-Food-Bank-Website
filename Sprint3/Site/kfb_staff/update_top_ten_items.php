<?php
	
     //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
	//Connect to database
	require '../../db.php';
?>  
<!DOCTYPE html>

<html>
<head>
    <title>Items most Needed</title>
</head>

<body>
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
			echo '<p class="formErr">' . $key . ':  No value entered </p>';
		 } 
	 }
		 
		 if ($isValid) {
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
		echo '<h1>Thank you. All your items have been updated</h1>'	;
		echo '<p>Back to <a href="/">Kent Food Bank Home</a></p>';
		echo '<p>Back to <a href="index.php">Kent Food Bank Staff</a></p>';
		echo '<p><a href="' .$_SERVER['PHP_SELF']. '">Updade list</a></p>'; 
		return;
	 }
	}
	
?>

   <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
   
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
        
		echo  "<p><input type='text' name='$id' size='40' value='";
		if ($_POST) {
			echo $_POST["$id"];
		} else {
			echo $item;
		}
		echo "'></p>";        
	}
	
	
?>
	        
	<input type="submit" value="Update" name="submit">
   </form>
   
</body>

</html>