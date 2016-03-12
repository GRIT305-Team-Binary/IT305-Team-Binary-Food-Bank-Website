<?php
	/* Volunteer Application Form 
	 * Kent Food Bank 
	 * Jami, Nicole Team Binary
	 * http://teambinary.greenrivertech.net/volunteer.php
	 */

	//Set up arrays needed for process_mail.php
	$errors = [];
	$missing = [];
	//All of the fields expected to have values from form
	$form_fields = ['appType', 'fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'clothing', 'office', 'food', 'drive', 'whyVolunteer',
					  'lift', 'questions', 'crime'];
	//'crime' & 'lift' is added below if they have court ordered community service
	
	//Create placeholder text for entry forms
	foreach ($form_fields as $field) {
		$$field = "";
	}
	
								
	
	

	// Turn on error reporting
   ini_set('display_errors', 1);
   error_reporting(E_ALL);


	//Form has been submitted
	if (isset($_POST['submit'])) {
		//All of the fields expected to have values from form
		$expected = ['appType', 'fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'clothing', 'office', 'food', 'drive', 'whyVolunteer',
					  'questions'];
				
		//All of the fields required to have user entered content in the form
		$required = ['appType','fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'whyVolunteer'];
		$recipient = 'teambinarykfb@gmail.com'; //Kent Food Bank
		$subject = 'Volunteer Application -'. $fname . " " . $lname;
		$headers[] = 'From: kentfoodbank@gmail.com';
		$headers[] = 'Content-type: text/plain; charset=utf-8';
		$authorized = '-fkentfoodbank@gmail.com';
		
		//Create a boolean flag to track validation errors
		$isValid = true;
		
		 //Validate Checkboxes for Volunteer Opportunities
		if ($_POST && empty($_POST['clothing']) && empty($_POST['office']) && empty($_POST['food'])) {
			array_push ( $required , 'clothing', 'office', 'food' );
			$isValid = false;
		} else {
			$isValid = true;
		}
		//Adding Validation for Court Ordered Community Service
		if ($_POST) {
			if (!empty($_POST['appType'])) {
				if ($_POST['appType'] == 'court') {
					array_push ( $required , 'crime' );
					array_push ( $expected , 'crime' );
					array_push ( $required , 'lift' );
					array_push ( $expected , 'lift' );
					$crime = '';
					if (empty($_POST['crime']) || empty($_POST['lift'])) {
						$isValid = false;
					}
				}
			} else {
				$isValid = false;
			}
			
		}
		
		// Include the validation functions
		// This will make sure every field marked as required has a value entered.
		include ('includes/process_mail.php');

		if ($isValid) {
			//message sent to user filling out this form
			// $mailedMessage = 'Thank you for supportings the Kent Food Bank. One of our representatives will contact you for further steps to volenteer at the kent food bank.';

			//sends the user a reply after submitting the form.
			// include('./mail-sender.php');
			
			/* test - printing the values from the user's input
			foreach ($required as $item) {
				echo $_GET[$item];
			}
			*/

			require ("../db.php");
			
			$allItems = "";
			$allValues = "";
			
			// 
			foreach ($expected as $item) {
				
				if (isset($_POST[$item])) {
					$value = trim($_POST[$item]);
					if ($value == "on" || $value == "Yes") {
						$value = "Y";
					} else if ($value == "No") {
						$value = "N";
					}
					
					$value = mysqli_real_escape_string($cnxn, $value);
					$allValues .= "\"$value\", ";
				} else {
					$value = "null";
					$allValues .= "$value, ";
				}
				
				$allItems .= $item . ", ";
										
			}
			// trim values to remove final comma
			$allValues = substr($allValues, 0, strlen($allValues) - 2);
			
			// trim field names to remove final comma
			$allItems = substr($allItems, 0, strlen($allItems) - 2);
			
			/* test printing fields and values
			echo "<br>$allItems<br><br>";
			echo $allValues;
			*/
			
			// insert all values
			$sql = "INSERT INTO `volunteers` ($allItems) VALUES ($allValues)";
			@mysqli_query($cnxn, $sql) or
					  die ("Error executing query: $sql");
			
			
			
			if ($mailSent) {

				$recipient = $_POST['email']; //email user submitted
				$subject = 'Kent Food Bank Volunteer Application ';
				$message = "Thank you!\r\n\r\n";
				$message .= "Thank you for your interest in volunteering with the Kent Food Bank. Volunteers are a vital part of our ability to serve the needs of our community. Kent Food Bank would not be able to provide basic needs to our clients without our caring and dedicated volunteers. Kent Food Bank has volunteer positions to accommodate many different schedules, physical abilities and interests.\r\n\r\n";
				$message .= "Thanks to people like you, we are able to spend 99 cents of every dollar donated on direct client services. Last year, community members donated more than 20,000 volunteer hours to support Kent Food Bank’s mission to end hunger. We cannot achieve our mission without you!\r\n\r\n";
				$message .= "Once again, thank you for your interest.  A staff member will be in contact with you to set up orientation.\r\n\r\n";
				$message .= "Jeniece Choate, Executive Director\r\n";
				$message .= "Kent Food Bank and Emergency Services\r\n\r\n";
				$message .= "If you have any questions for or about the food bank please contact us. \r\n\r\n";
				$message = wordwrap($message, 70, "\r\n");
			   // This will send an email to the applicant
			    $mailApplicant = mail($recipient, $subject, $message, $headers, $authorized);
				header('Location: volunteer-thank-you.php');
				
				exit;
			}
		
		
        }
	}
?>
<!DOCTYPE html>

<html lang="en">

<?php
//Adding page header
include ('includes/header.inc.php');

//link to database file

?>


<div class="main" id="#top">
    <div class="container-fluid">
		<h1>Donate Time (Volunteer)</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
				<!-- Side Navigation for Contribute pages -->
				<?php  include ('includes/contribute-side.php');  ?>
			</div>
		    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">

				<!-- Space for error message -->
				
				<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
					<h1 class="formError text-center">Sorry, your mail couldn't be sent.</h1><br>
				<?php elseif ($errors || $missing) : ?>
					<h1 class="formError text-center">Please fix the item(s) indicated:</h1><br>
				<?php endif; ?>

			<!-- This is the Form -->


			<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>"> <!-- Will reload volunteer.php after form submits -->
				<div class="row ">
				   <hr>
				   <p></p>
				   <p class="asterisk pull-right"><span class="required">*</span> = Required field</p>
				</div>
				<div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pagination-centered"  >
						<?php
							//Validate Type of Application
							$appTypes = array('individual', 'group', 'organizational', 'student', 'court');
							if (($missing && in_array('appType', $missing)) )  {
								echo '<p class="formError text-center">Please select the type of application you are submitting.</p>';
								$isValid = false;


							} elseif ($_POST) {
								
								if (!in_array($appType, $appTypes )) {
									echo '<p class="formError text-center">There was an error please reload your page</p>';
								}
							}

						?>
					   <!-- Application type -->
						<fieldset class="form-group text-center" >
							<label>Type of Application<span class="required">*</span>:</label><br>

						<!-- Create Radio Buttons -->
						<?php
							foreach ($appTypes as $appValue) {
								echo '<label class="radio-inline"><input type="radio" name="appType" id="';
								echo strtolower($appValue);
								echo '" value="';
								echo strtolower($appValue);

								if (strcmp($appValue, $appType) == 0){
									echo '" checked>';
									
								} else {
									echo'">';
								}
								echo ucfirst($appValue);
								echo '</label>';
							}
							
							
						?>
							
						</fieldset>
					</div>
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
						<!-- Error Message if first name not entered -->
						<?php if ($missing && in_array('fname', $missing)) : ?>
								<span class="formError text-center">Please enter your first name.</span>
						<?php endif; ?>
				   </div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
						<!-- Error Message if last name not entered -->
						<?php if ($missing && in_array('lname', $missing)) : ?>
								<span class="formError text-center">Please enter your last name.</span>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
						<!-- First Name field -->
					   <fieldset class="form-group">
						   <label for="fname">First Name<span class="required">*</span></label><br>
						   <input name="fname" id="fname" class="input col-xs-12 form-control" type="text" placeholder="Enter your first name" value="<?php echo $fname; ?>">
					   </fieldset>
				   </div>
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
						<!-- Last Name field -->
					   <fieldset class="form-group">
						   <label for="lname">Last Name<span class="required">*</span></label><br>
						   <input name="lname" id="lname" class="input col-xs-12 form-control" type="text" placeholder="Enter your last name" value="<?php echo $lname; ?>">
					   </fieldset>
				   </div>
				</div>
			   <div class="row">
					<!-- Error Message if any part of address is missing -->
					<?php if ($_POST) {
						if ($missing && in_array('address', $missing) || in_array('city', $missing) || in_array('zip', $missing)) {
							echo '<p class="formError text-center">Please enter your street address, city, and zip code.</p>';
							$isValid = false;
						}
					}
					?>
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
				   <!-- Address -->
					   <fieldset class="form-group">
						   <label for="address">Address<span class="required">*</span></label><br>
						   <input name="address" class="input col-xs-12 form-control" type="text" id="address" placeholder="Enter your street address" value="<?php echo $address; ?>">
					   </fieldset>
				   </div>


					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
				   <!-- City and Zip will take up half the screen when on large monitor -->
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 form-group">
						<!-- City -->
						   <fieldset class="form-group">
							   <label for="city">City<span class="required">*</span></label><br>
							   <input name="city" class="input col-xs-12 form-control" type="text" id="city"
									  placeholder="Enter your city" value="<?php echo $city; ?>">
							</fieldset>
					   </div>
					   <!-- State visible only on large screens -->
					   <div class="col-lg-3 visible-lg">
							<span class="bfh-states" data-country="US" data-state="WA"></span>
							<h4 class="text-center">WA</h4>
					   </div>
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
					   <!-- Zip -->
						   <fieldset class="form-group">
							   <label for="zip">Zip Code<span class="required">*</span></label><br>
							   <input name="zip" pattern="[0-9]*.{5,}" class="input col-xs-12 form-control" id="zip" type="text" placeholder="#####" value="<?php echo $zip; ?>">
						   </fieldset>
					   </div>
				   </div>
				</div> <!-- End of Address Row -->


			   <div class="row">
				 <!-- Validate phone and email is entered -->
					<?php if ($_POST) {
						if (empty($_POST['email']) || empty($_POST['phone'])) {
							echo '<p class="formError text-center">Please enter a phone number and email address.</p>';
							$isValid = false;
						}
					}
					?>

				   <fieldset class="form-group">
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <!-- Contact Phone -->
						   <label>Phone<span class="required">*</span></label><br>
						   <input name="phone" class="input col-xs-12 form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" id="phone"  type="tel" placeholder="Enter phone number xxx-xxx-xxxx" value="<?php echo $phone; ?>"><br><br>
					   </div>

					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <!-- Contact Email-->
						   <label>E-mail address<span class="required">*</span></label><br>
						   <input name="email" class="input col-xs-12 form-control" id="email" type="email" placeholder="Enter email"  pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $email; ?>">
						   <br><br>
					   </div>
				   </fieldset>
			   </div> <!-- End of phone/email Row -->
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<?php
						//Validate Volunteer Opportunities

						if ($_POST && empty($_POST['clothing']) && empty($_POST['office']) && empty($_POST['food']) && empty($_POST['drive'])) {
							echo '<p class="formError text-center">Please select a Volunteer Opportunity.</p>';
							$isValid = false;
						} else {
							if (!empty($_POST['clothing'])) {
								$clothing = $_POST['clothing'];

							}
							if (!empty($_POST['office'])) {
								$office= $_POST['office'];
							}
							if (!empty($_POST['food'])) {
								$food= $_POST['food'];
							}
							if (!empty($_POST['drive'])) {
								$drive= $_POST['drive'];
							}
						}
						?>
					   <fieldset class="form-group">

						   <label >Volunteer Opportunities (check your interests)<span class="required">*</span></label>
						   <div class="checkbox">
							   <label for="clothing">
							   <input type="checkbox" name="clothing" id="clothing"
							   <?php if ($clothing) : ?>
								checked
								<?php endif; ?>
							   > Clothing
							   <!-- if Clothing was selected, add checked to the input field -->
							   </label>
							   <p>Volunteers receive, sort and organize donated clothing and assisting clients in their shopping</p>

							   <label for="office">
							   <!-- if Office was selected, add checked to the input field -->
							   <input type="checkbox" name="office" id="office"
							   <?php if ($office) : ?>
								checked
								<?php endif; ?>
							   >Office
							   </label>
							   <p>Volunteers register clients by computer check in through a one on one client interview process and verify information. Assist with resource referral and other needs. </p>

							   <label for="food">
							   <!-- if Food was selected, add checked to the input field -->
								<input type="checkbox" name="food" id="food"
							   <?php if ($food) : ?>
								checked
								<?php endif; ?>
							  > Food
							   </label>
							   <p>Volunteers receive, unload and organize donated items from the community. Assist clients one on one with their food line selections.</p>
							   
							   <label for="drive">
							   <!-- if Driver was selected, add checked to the input field -->
							   <input type="checkbox" name="drive" id="drive"
							   <?php if ($drive) : ?>
								checked
								<?php endif; ?>
							   >Driver
							   </label>
							   <p>Selected Volunteers will be responsible for driving.</p>
							   
						   </div>
					   </fieldset>
				   </div>
					<!-- Text Area to explain why you want to volunteer -->
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php
					   //Validate Commitment
						   if ($missing && in_array('whyVolunteer', $missing)) {
							   echo '<p class="text-center formError" >Please tell us why you want to Volunteer.</p>';
							   $isValid = false;

						   }
						   ?>

					   <fieldset class="form-group">
							   <label for="whyVolunteer">Why are you interested in volunteering?<span class="required">*</span></label><br />
							   <textarea class="input col-xs-12 form-control" id="whyVolunteer" placeholder="Please tell us why you want to Volunteer." name="whyVolunteer" rows=10><?php echo $whyVolunteer; ?></textarea>
					   </fieldset>
				   </div>
			   </div> <!-- End of Opportunities and Text Area Row -->

			   <!-- Yes No Questions -->
			   <!--<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					   <fieldset class="form-group">
						   <label>Are you able to make a commitment of at least three (3) months one day a week?*<br />
						   (M, T, W, or F from 9am -2:30pm)</label>
						   <div class="radio">-->
								<!-- Yes Radio Button -->
							    <!-- <label class="radio-inline">
									   <input type="radio" name="canCommit" id="commitYes" value="Yes"
									   <?php if (strcmp($canCommit, "Yes") == 0 ) : ?>
									  checked
									  <?php endif; ?>
									  >
									   Yes
							   </label>-->
								<!-- No Radio Button -->
							    <!-- <label class="radio-inline">
								   <input type="radio" name="canCommit" id="commitNo" value="No"
								   <?php if (strcmp($canCommit, "No") == 0) : ?>
								  checked
								  <?php endif; ?>
								  >

								   No
							   </label>-->
							   <?php
							//   //Validate Commitment of at least 3 months
							//	   if ($missing && in_array('canCommit', $missing)) {
							//		   echo '<p class="radio-inline formError" >Please select Yes or No.</p>';
							//		   $isValid = false;
							//		}
								?>
						   <!--  </div>
						</fieldset>
					</div>
				</div>-->
			   <div class="row hidden" id="liftLB">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					   <fieldset class="form-group">
						   <label>Are you able to lift 40 pounds?<span class="required">*</span></label >
						   <div class="radio">
								<!-- Yes Radio Button -->
							   <label class="radio-inline">
									   <input type="radio" name="lift" id="liftYes" value="Yes"
									   <?php if (strcmp($lift, "Yes") == 0) : ?>
									  checked
									  <?php endif; ?>
									  />
									   Yes
							   </label>
								<!-- No Radio Button -->
							   <label class="radio-inline">
								   <input type="radio" name="lift" id="liftNo" value="No"
								   <?php if (strcmp($lift, "No") == 0) : ?>
								  checked
								  <?php endif; ?>
								  />
								   No
							   </label>
							   <?php
							   //Validate Ability to Lift
									if ($missing && in_array('lift', $missing)) {
									   echo '<p class="radio-inline formError">Please select Yes or No.</p>';
									   $isValid = false;

								   }
								?>
							</div>
					   </fieldset>

					</div>
			   </div>
			   <!--<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					   <fieldset class="form-group">
						   <label>Do you have any physical limitations that would impair your ability to perform as a volunteer without supplemental assistance?<span class="required">*</span></label>
						   <div class="radio">-->
								<!-- Yes Radio Button -->
								 <!--<label class="radio-inline">
									   <input type="radio" name="limitation" id="limitationYes" value="Yes"
									   <?php if (strcmp($limitation, "Yes") == 0) : ?>
									  checked
									  <?php endif; ?>
									  />
									   Yes
								</label>-->
								<!-- No Radio Button -->
								 <!--<label class="radio-inline">
								   <input type="radio" name="limitation" id="limitationNo" value="No"
								  <?php if (strcmp($limitation, "No") == 0) : ?>
								  checked
								  <?php endif; ?>
								   />
								   No
								</label>
								<?php
							//   //Validate Physical Limitations
							//	   if ($missing && in_array('limitation', $missing)) {
							//		   echo '<p class="radio-inline formError" >Please select Yes or No.</p>';
							//		   $isValid = false;
							//
							//	   }
								?>
							</div>
						</fieldset>

					</div>
			   </div>-->
			   <div class="row hidden" id="crime">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
					   <fieldset class="form-group">
							<label>I have committed theft, fraud, assault, or a crime against children.<span class="required">*</span></label>
							<div class="radio">
								<!-- Yes Radio Button -->
							   <label class="radio-inline">
									   <input type="radio" name="crime" id="crimeYes" value="Yes"
									   <?php if (strcmp($crime, "Yes") == 0) : ?>
									  checked
									  <?php endif; ?>
									  >
									   Yes
							   </label>
								<!-- No Radio Button -->
							   <label class="radio-inline">
								   <input type="radio" name="crime" id="crimeNo" value="No"
								  <?php if (strcmp($crime, "No") == 0) : ?>
								  checked
								  <?php endif; ?>
								   >
								   No
							   </label>
								<?php
							   //Validate Crime
								   if ($missing && in_array('crime', $missing)) {
									   echo '<p class="radio-inline formError" >Please select Yes or No.</p>';
									   $isValid = false;

								   }
								?>
							</div>
						</fieldset>

					</div>
			   </div>
			   <div class="row">
					<!-- Text Area for Additional Comments/Questions -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<fieldset class="form-group">
								<label for="questions">Any questions for or about the food bank, please use the provided space below and a staff member will respond using your preferred contact information.</label><br />
								<textarea class="input col-xs-12 form-control" id="questions" name="questions" rows="7"><?php echo $questions; ?></textarea>
						</fieldset>
						<p><button type="submit" class="btn btn-warning" name="submit">Submit</button></p>

				   </div>
			   </div>
			</form> <!-- End of Form -->
		 	<p></p>
		 	<hr>
			</div>
		</div><!-- End of Page Row -->
	</div><!-- End of Container -->
 </div> <!-- End of Main -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- jQuery to modify questions for Court Ordered Service -->
<script>
	$(document).ready(function(){
		$('#court').on('click', court_ordered);
		$('#indvidual').on('click', normal);
		$('#group').on('click', normal);
		$('#organizational').on('click', normal);
		$('#student').on('click', normal);

		function court_ordered() {
            //if they answer court ordered community service ask type of crime
			$('#crime').removeClass('hidden');
			$('#liftLB').removeClass('hidden');

		}
		function normal() {
            //if they do not have court ordered community service
			$('#crime').addClass('hidden');
			$('#liftLB').addClass('hidden');
        }


		<?php if ($_POST && $_POST['appType'] == 'court') {
			echo "court_ordered();";
			}
		?>
		$('#crimeYes').click(function(){
			$('form').attr('action', 'volunteer-c-thank-you.php');
		});
		$('#crimeNo').click(function(){
			$('form').attr('action', '<?= $_SERVER['PHP_SELF']; ?>');
		});
	});
</script>

 <!-- Insert Footer -->
<?php  include ('includes/footer.php');  ?>