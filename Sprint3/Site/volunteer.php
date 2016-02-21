<?php
$errors = [];
$missing = [];
//Create placeholder text for entry forms
	$fname="";
	$lname="";
	$address="";
	$city="";
	$zip="";
	$phone="";
	$email="";
	$whyVolunteer="";
	$commit ="";
	$lift = "";
	$limitation ="";
	$questions="";
	$clothing="";
	$office="";
	$food="";
	$appType="";
	$crime="";
	// Turn on error reporting
   ini_set('display_errors', 1);
   error_reporting(E_ALL);

	
	//Form has been submitted 
	if (isset($_POST['submit'])) {
		$expected = [ 'appType', 'fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'clothing', 'office', 'food','whyVolunteer',
					 'commit', 'lift', 'limitation', 'questions'];
		//'crime' is added below if they have court ordered community service
		$required = ['appType','fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'whyVolunteer','commit', 'lift', 'limitation'];
		$recipient = ''; //we should set to users email 
		$subject = 'Volunteer Application -'. $fname . " " . $lname; 
		$headers[] = 'From: kentfoodbank@gmail.com';
		$headers[] = 'Content-type: text/plain; charset=utf-8';
		$authorized = '-fkentfoodbank@gmail.com';
		     
    
    	
	//Create a boolean flag to track validation errors	
	 $isValid = true;
	 
	   //Validate Court
			if ($_POST && $_POST['appType'] == 'court') {
				array_push ( $required , 'crime' );
				array_push ( $expected , 'crime' );
				echo "<script>court_ordered();</script>";
			}
			
		
		 //Validate Checkboxes
			if ($_POST && empty($_POST['clothing']) && empty($_POST['office']) && empty($_POST['food'])) {
				array_push ( $required , 'clothing', 'office', 'food' );
			}
			
		
		
		
		if ($isValid) {
           
			// Include the validation functions
			include ('./includes/process_mail.php');
			
			
			if ($mailSent) {
				header('Location: volunteer-thank-you.php');
				exit;
			}
			
			
           
        }
		
	}

	
	

?>
<!DOCTYPE html>

<html lang="en">

<?php
include ('includes/header.inc.php');
require ("../db.php");
?>


	 <div class="main" id="#top">
    <div class="container-fluid">
		<h1>Donate Time (Volunteer)</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
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
							 
						 
			<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>"> <!--volunteer-thank-you.php -->
			   <div class="row ">
				   <hr>
				   <p></p>
				   <p class="asterisk pull-right">* = Required field</p>	
				   
				   
				   
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pagination-centered " >
					<?php
						//Validate Type of Application
						//print_r ($missing);
						$appTypes = array('individual', 'group', 'organizational', 'student', 'court');
						if ($missing && in_array('appType', $missing))  {
							echo '<p class="formError text-center">Please select the type of application you are submitting.</p>';
							$isValid = false;
							
							
						} elseif ($_POST) {
							//print_r($_POST);
							//$appType = $_POST['appType'];
							//echo 'appType: ';
							//echo $appType;
							
							//echo '<br >appTypes: ';
							//print_r($appTypes);
							if (!in_array($appType, $appTypes )) {
								echo '<p class="formError text-center">There was an error please reload your page</p>';
							}
						}
						
					?>
				   <!-- Application type -->
					   <fieldset class="form-group text-center">
							   <label>Type of Application*:</label><br>
							   
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
						   <label for="fname">First Name*</label><br>
						   <input name="fname" id="fname" class="input col-xs-12 form-control" type="text" placeholder="Enter your first name" value="<?php echo $fname; ?>">
					   </fieldset>
				   </div>
				   
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
					<!-- Last Name field -->
					   <fieldset class="form-group">
						   <label for="lname">Last Name*</label><br>
						   <input name="lname" id="lname" class="input col-xs-12 form-control" type="text" placeholder="Enter your last name" value="<?php echo $lname; ?>">
					   </fieldset>
				   </div>
				   
				   
			   </div>
			   <div class="row">
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
					   <label for="address">Address*</label><br>
					   <input name="address" class="input col-xs-12 form-control" type="text" id="address" placeholder="Enter your street address" value="<?php echo $address; ?>">
				   </fieldset>
				   </div>
			   
			   
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
				   
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 form-group">
				   <!-- City -->
					   <fieldset class="form-group">
						   
						   <label for="city">City*</label><br>
						   <input name="city" class="input col-xs-12 form-control" type="text" id="city" placeholder="Enter your city" value="<?php echo $city; ?>">
						   
					   </fieldset>
				   </div>
				   <div class="col-lg-3 visible-lg">
					<span class="bfh-states" data-country="US" data-state="WA"></span>
					   <!--<h2 class="text-center">WA</h2>-->
				   </div>
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
				   <!-- Zip -->
					   <fieldset class="form-group">
						   <label for="zip">Zip Code*</label><br>
						   <input name="zip" pattern="[0-9]*.{5,}" class="input col-xs-12 form-control" id="zip" type="text" placeholder="#####" value="<?php echo $zip; ?>">
					   </fieldset>
				   </div>
			   </div>
			   </div>
			   
			   
			   <div class="row">
				 <!-- Validate phone OR email is entered -->
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
						   <label>Phone*</label><br>
						   <input name="phone" class="input col-xs-12 form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"" id="phone"  type="tel" placeholder="Enter phone number xxx-xxx-xxxx" value="<?php echo $phone; ?>"><br><br>
					   </div>
			   
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <!-- Contact Email-->
						   <label>E-mail address*</label><br>
						   <input name="email" class="input col-xs-12 form-control" id="email" type="email" placeholder="Enter email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $email; ?>">
						   <br><br>
					   </div>
				   </fieldset>
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php
					//Validate Volunteer Opprotunities
					
						if ($_POST && empty($_POST['clothing']) && empty($_POST['office']) && empty($_POST['food'])) {
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
						}
					?>
					   <fieldset class="form-group">
						   
							   <label >Volunteer Opportunities (check your interests)*</label>
							   <div class="checkbox">
								   <label for="clothing">
								   <input type="checkbox" name="clothing" id="clothing"
								   <?php if ($clothing) : ?>
									checked
									<?php endif; ?>
								   > Clothing
								   </label>
								   <p>Volunteers receive, sort and organize donated clothing and assiting clients in their shopping</p>
						   
								   <label for="office">
								   <input type="checkbox" name="office" id="office"
								   <?php if ($office) : ?>
									checked
									<?php endif; ?>
								   >Office
								   </label>
								   <p>Volunteers register clients by computer check in through a one on one client interview process and verify information. Assist with resource referral and other needs. </p>
						   
								   <label for="food">
								   <input type="checkbox" name="food" id="food"
									<?php if ($food) : ?>
									checked
									<?php endif; ?>
								 
								   > Food
								   </label>
								   <p>Volunteers recieve, unload and organize donated items from the community. Assist clients one on one with their food line selections.</p>
						   </div>
					   </fieldset>
				   </div>
			   
			   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<?php
				   //Validate Commitment
					   if ($missing && in_array('whyVolunteer', $missing)) {
						   echo '<p class="text-center formError" >Please tell us why you want to Volunteer.</p>';
						   $isValid = false;
						   
					   }
					   ?>
				
				   <fieldset class="form-group">
						   <label for="whyVolunteer">Why are you interested in volunteering?*</label><br />
						   <textarea class="input col-xs-12 form-control" id="whyVolunteer" name="whyVolunteer" rows=10><?php echo $whyVolunteer; ?></textarea>
				   </fieldset>
			   </div>
			   </div>
			   
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
				   <label>Are you able to make a commitment of at leaset three (3) months one day a week?*<br />
				   (M, T, W, or F from 9am -2:30pm)</label>
				   <div class="radio">
					   <label class="radio-inline">
							   <input type="radio" name="commit" id="commitYes" value="Yes"
							   <?php if (strcmp($commit, "Yes") == 0 ) : ?>
							  checked
							  <?php endif; ?>
							  >
							   Yes
					   </label>
				   
						   <label class="radio-inline">
							   <input type="radio" name="commit" id="commitNo" value="No"
							   <?php if (strcmp($commit, "No") == 0) : ?>
							  checked
							  <?php endif; ?>
							  >
							  
							   No
						   </label>
				   <?php
				   //Validate Commitment
					   if ($missing && in_array('commit', $missing)) {
						   echo '<p class="radio-inline formError" >Please select Yes or No.</p>';
						   $isValid = false;
						   
					   }
					   ?>
						   </div>
				   </fieldset>
			   
			   </div>
				   </div>
			   <div class="row">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
				   <label>Are you able to lift <span id="liftLB">10</span> pounds?*</label >
				   <div class="radio">
					   <label class="radio-inline">
							   <input type="radio" name="lift" id="liftYes" value="Yes"
							   <?php if (strcmp($lift, "Yes") == 0) : ?>
							  checked
							  <?php endif; ?>
							  />
							   Yes
					   </label>
				 
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
			   <div class="row">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
				   <label>Do you have any physical limitations that would impair your ability to perform as a volunteer without supplemental assistance?*</label>
				   <div class="radio">
					
					   <label class="radio-inline">
							   <input type="radio" name="limitation" id="limitationYes" value="Yes"
							   <?php if (strcmp($limitation, "Yes") == 0) : ?>
							  checked
							  <?php endif; ?>
							  />
							   Yes
					   </label>
				   
						   <label class="radio-inline">
							   <input type="radio" name="limitation" id="limitationNo" value="No"
							  <?php if (strcmp($limitation, "No") == 0) : ?>
							  checked
							  <?php endif; ?>
							   />
							   No
						   </label>
				    <?php
				   //Validate Physical Limiations
					   if ($missing && in_array('limitation', $missing)) {
						   echo '<p class="radio-inline formError" >Please select Yes or No.</p>';
						   $isValid = false;
						   
					   }
					   ?>
				  </div>
				   </fieldset>
			   
			   </div>
			   </div>
			   <div class="row hidden" id="crime">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				   <fieldset class="form-group">
				   <label>I have committed theft, fraud, assault, or a crime against children.*</label>
				   <div class="radio">
					
					   <label class="radio-inline">
							   <input type="radio" name="crime" id="crimeYes" value="Yes"
							   <?php if (strcmp($crime, "Yes") == 0) : ?>
							  checked
							  <?php endif; ?>
							  >
							   Yes
					   </label>
				   
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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<fieldset class="form-group">
								<label for="questions">Any questions for or about the food bank, please use the provided space below and a staff member will respond using your preferred contact information.</label><br />
								<textarea class="input col-xs-12 form-control" id="questions" name="questions" rows="7"><?php echo $questions; ?></textarea>
						</fieldset>						
							<p><button type="submit" class="btn btn-warning" name="submit">Submit</button></p>
							
				   </div>
			   </div>
			   </form>
		 	<p></p>
		 	<hr>
				</div>
			</div>
		</div>
	 </div>

<?php  include ('includes/footer.php');  ?>
<script>
	$(document).ready(function(){
		$('#court').on('click', court_ordered);
		$('#indvidual').on('click', normal);
		$('#group').on('click', normal);
		$('#organizational').on('click', normal);
		$('#student').on('click', normal);
		
		function court_ordered() {
            //if they answer court ordered comunity service ask type of crime
			$('#crime').removeClass('hidden');
			$('#liftLB').html('40');
	
		}
		function normal() {
            //if they do not have court ordered community service
			$('#crime').addClass('hidden');
			$('#liftLB').html('10');	
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
