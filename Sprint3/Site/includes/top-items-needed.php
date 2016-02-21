<link href="../css/print.css"    rel="stylesheet" media="print">

<div class="hidden text-center">
	<img alt="Kent Food Bank" src="../images/logo-transparent.png">
 </div>
	 
	 <div class="panel panel-warning">
<!-- Top Ten Items needed at Food Bank now -->
	<div class="panel-heading">Top Items We Need</div>
	<div class="panel-body">
<?php
	//Connect to database
	require '/home/teambinary/db.php';

    
   //Define the SELECT query
    $sql = "SELECT item FROM top_ten_items ORDER BY item_id";

	//Send the query to the database
    $result = @mysqli_query($cnxn, $sql);

	
	echo '<ul class="list-group">';
	//Process the rows
    while ($row = mysqli_fetch_assoc($result)) {

        $item = $row['item'];
        echo  '<li class="list-group-item"><input id="box1" type="checkbox" class="hidden" />';
		echo "$item</li>";        
	}
	
	echo '</ul>';
?>
		<!--<ul class="list-group">
			 <li class="list-group-item">Soup - condensed and ready to eat </li>
			 <li class="list-group-item">Canned vegetables  </li>
			 <li class="list-group-item"> Canned tomato products </li>
			 <li class="list-group-item"> Canned fruit  </li>
			 <li class="list-group-item">Canned proteins - SPAM, tuna, chicken  </li>
			 <li class="list-group-item">Ready to eat meals - chili, Chef Boyardee  </li>
			 <li class="list-group-item">Canned or bagged beans  </li>
			 <li class="list-group-item">Toiletries</li>
			 <li class="list-group-item">Diapers and Formula </li>
			 <li class="list-group-item">Office supplies - paper, pens, garbage bags </li>
		 </ul>-->
	 </div>
</div>
	 
 <div class="hidden">
	<h3>Bring all items to Kent Food Bank</h3>
	<p>515 W Harrison St, Ste 107 <br />
Kent, Washington 98032</p>
	<p>Thank you for your donations and support.</p>
	<p class="print"><form><input type="button" value=" Print this page "
onclick="window.print();return false;" class="print" /></form></p>
	<p class="print"><form><input type="button" value=" Return to Contribute "
onClick="location.href='../contribute.php'" class="print" /></form></p>
 </div>
	 	 