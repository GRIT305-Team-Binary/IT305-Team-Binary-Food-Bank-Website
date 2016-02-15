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
	$questions="";
	
	// Turn on error reporting
   ini_set('display_errors', 1);
   error_reporting(E_ALL);

	
	
	if (isset($_POST['submit'])) {
		$expected = [ 'appType', 'fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'clothing', 'office', 'food','whyVolunteer',
					 'commit', 'lift', 'limitation', 'questions'];
		$required = ['fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
					 'commit', 'lift', 'limitation'];
		$recipient = 'Nicole Bassen <nicolerbassen@gmail.com>';
		$headers = [];
		

	// Include the validation functions
	include ('./includes/process_mail.php');
       
    //Form has been submitted 
    if (isset($_POST['submit'])) {
		
	//Create a boolean flag to track validation errors	
	 $isValid = true;
	 
	  
    
		
		//Validate Type of Application
		if (!empty($_POST['appType'])) {
            $appType = $_POST['appType'];
			$appTypes = array('individual', 'group', 'organizational', 'school');
			
			if (!in_array($appType, $appTypes)) {
				echo '<p>There was an error please reload your page</p>';
			}
        } else {
            echo '<p>Please select the type of application you are submitting.</p>';
            $isValid = false;
			
	    }
		
 	 //Validate first name
        if (!empty($_POST['fname'])) {
            $fname = $_POST['fname'];
        } else {
            echo '<p>Please enter a first name.</p>';
            $isValid = false;
			
	    }

	 //Validate last name
        
		if (!empty($_POST['lname'])) {
            $lname = $_POST['lname'];
        } else {
            echo '<p>Please enter a last name.</p>';
            $isValid = false;
        }
		
	//Validate address
        
		if (!empty($_POST['address'])) {
            $address = $_POST['address'];
        } else {
            echo '<p> Please enter an address. </p>';
            $isValid = false;
        }
		
	//Validate city
        if (!empty($_POST['city'])) {
            $city = $_POST['city'];
        } else {
            echo '<p>Please enter a city.</p>';
            $isValid = false;
			
	    }

	 //Validate zip
        
		if (!empty($_POST['zip'])) {
            $zip = $_POST['zip'];
        } else {
            echo '<p>Please enter a zip code.</p>';
            $isValid = false;
        }
		
	//Validate phone number
        
		if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        } 

		//Validate email
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
			if (isSuspect($email)) {
				
			}
        }
		
		if (empty($_POST['email']) && empty($_POST['phone'])) {
            echo '<p>Please enter a phone number or email address.</p>';
            $isValid = false;
		}
		
		//Validate Volunteer Opprotunities
		if (empty($_POST['clothing']) && empty($_POST['office']) && empty($_POST['food'])) {
            echo '<p>Please select a Volunteer Opprotunity.</p>';
            $isValid = false;
		} else {
			$clothing = $_POST['clothing'];
			$office= $_POST['office'];
			$food= $_POST['food'];
		}
		
		//Validate Why are you interested in Volunteering
        
		if (!empty($_POST['whyVolunteer'])) {
            $whyVolunteer = $_POST['whyVolunteer'];
        }
			
		//Validate Any Questions
        
		if (!empty($_POST['questions'])) {
            $questions = $_POST['questions'];
        }
		
		
		
		
		
		if ($isValid) {
            //Send Form information in email
			$subject = 'Volunteer Application -'. $fname . " " . $lname;
			$headers = [];
			$headers[] = 'From: webmaster@example.com';
			$headers[] = 'Cc: another@example.com';
			$headers[] = 'Content-type: text/plain; charset=utf-8';
			$authorized = null;
			
			if ($mailSent) {
				//header('Location: Volunteer-thank-you.php');
				exit;
			}
			
			
           
        }
		
	}

	
	
}
?>
<!DOCTYPE html>

<html lang="en">

<?php  include ('includes/header.inc.php');  ?>


	 <div class="main" id="#top">
    <div class="container-fluid">
		<h1>Donate Time (Volunteer)</h1>
		 <!-- Donate Button on mobile site -->
		<!--<div class="row visible-xs">
			<a class="btn btn-warning btn-lg col-xs-11 text-center fullWidthBtn"
				 href="https://www.paypal.com/us/webapps/mpp/search-cause?charityId=75871&s=3">Donate!</>
           </a>
		</div>-->
		   <!-- Volunteer Button can go here with link to Volunteer form -->
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
            <?php  include ('includes/contribute-side.php');  ?>
        </div>
		         <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
					
					
			<!-- This is the Form -->
							 
							 
			<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>"> <!--Volunteer-thank-you.php -->
			   <div class="row ">
				   
				   <hr>
				   <p></p>
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pagination-centered " >
				   <!-- Application type -->
					   <fieldset class="form-group text-center">
							   <label>Type of Application*:</label><br>
							   <label class="radio-inline"><input type="radio" name="appType" id="Individual" value="individual">Individual</label>
							   <label class="radio-inline"><input type="radio" name="appType" id="Group" value="group">Group</label>
							   <label class="radio-inline"><input type="radio" name="appType" id="Organization" value="organization">Organization</label>
							   <label class="radio-inline"><input type="radio" name="appType" id="School" value="school">School</label>
						   
					   </fieldset>
				   </div>
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				   <!-- First Name field -->
					   <fieldset class="form-group">
						   <label for="fname">First Name*</label><br>
						   <input name="fname" class="input col-xs-12 form-control" type="text" placeholder="Enter your first name" value="<?php echo $fname; ?>">
					   </fieldset>
				   </div>
				   
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				   <!-- Last Name field -->
					   <fieldset class="form-group">
						   <label for="lname">Last Name*</label><br>
						   <input name="lname" class="input col-xs-12 form-control" type="text" placeholder="Enter your last name" value="<?php echo $lname; ?>">
					   </fieldset>
				   </div>
				   
				   
			   </div>
			   <div class="row">
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
					   <h2 class="text-center">WA</h2>
				   </div>
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
				   <!-- Zip -->
					   <fieldset class="form-group">
						   <label for="zip">Zip Code*</label><br>
						   <input name="zip" pattern="[0-9]*" class="input col-xs-12 form-control" id="zip" type="text" placeholder="Enter your zip" value="<?php echo $zip; ?>">
					   </fieldset>
				   </div>
			   </div>
			   </div>
			   
			   
			   <div class="row">
				   <fieldset class="form-group">
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <!-- Contact Phone -->
						   <label>Phone*</label><br>
						   <input name="phone" id="phone" class="input col-xs-12 form-control" id="phone"  type="tel" placeholder="Enter phone number" value="<?php echo $phone; ?>"><br><br>
					   </div>
			   
					   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <!-- Contact Email-->
						   <label>E-mail address*</label><br>
						   <input name="email" class="input col-xs-12 form-control" id="email" type="email" placeholder="Enter email" value="<?php echo $email; ?>">
						   <br><br>
					   </div>
				   </fieldset>
			   </div>
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					   <fieldset class="form-group">
						   
							   <label for="checkbox" >Volunteer Opportunities (check your interests)</label>
							   <div class="checkbox">
								   <label for="clothing">
								   <input type="checkbox" name="clothing" id="clothing"> Clothing
								   </label>
								   <p>Volunteers recieve, sort and organize donated clothing and assiting clients in their shopping</p>
						   
								   <label for="office">
								   <input type="checkbox" name="office" id="office"> Office
								   </label>
								   <p>Volunteers register clients by computer check in through a one on one client interview process and verify information. Assist with resource referral and other needs. </p>
						   
								   <label for="office">
								   <input type="checkbox" name="food" id="food"> Food
								   </label>
								   <p>Volunteers recieve, unload and organize donated items from the community. Assist clients one on one with their food line selections.</p>
						   </div>
					   </fieldset>
				   </div>
			   
			   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				   <fieldset class="form-group">
						   <label for="whyVolunteer">Why are you interested in volunteering?</label><br />
						   <textarea class="input col-xs-12 form-control" id="whyVolunteer" name="whyVolunteer" rows=10><?php echo $whyVolunteer; ?></textarea>
				   </fieldset>
			   </div>
			   </div>
			   
			   <div class="row">
				   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group" for="commit">
				   <label>Are you able to make a commitment of at leaset three (3) months one day a week?*<br />
				   (M, T, W, or F from 9am -2:30pm)</label>
				   <div class="radio">
					   <label class="radio-inline">
							   <input type="radio" name="commit" id="commitYes" value="commitYes">
							   Yes
					   </label>
				   
						   <label class="radio-inline">
							   <input type="radio" name="commit" id="commitNo" value="commitNo">
							   No
						   </label>
				   <?php
				   //Validate Commitment
					   if (!empty($_POST['commit'])) {
						   $commit = $_POST['commit'];
					   } else {
						   echo '<p class="radio-inline" >Please select Yes or No.</p>';
						   $isValid = false;
						   
					   }
					   ?>
				   </fieldset>
			   </div>
			   </div>
			   <div class="row">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
				   <label for="lift">Are you able to lift 10 pounds?*</label >
				   <div class="radio">
					   <label class="radio-inline">
							   <input type="radio" name="lift" id="liftYes" value="liftYes">
							   Yes
					   </label>
				 
						   <label class="radio-inline">
							   <input type="radio" name="lift" id="liftNo" value="liftNo">
							   No
						   </label>
				   
				   </fieldset>
			   </div>
			   </div>
			   <div class="row">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
				   <label for="limitation">Do you have any physical limitations that would impair your ability to perform as a volunteer without supplemental assistance?*</label>
				   <div class="radio">
					   <label class="radio-inline">
							   <input type="radio" name="limitation" id="limitationYes" name="limitationYes">
							   Yes
					   </label>
				   
						   <label class="radio-inline">
							   <input type="radio" name="limitation" id="limitationNo" value="limitationNo">
							   No
						   </label>
				   
				   </fieldset>
			   </div>
			   </div>	
			   <div class="row">
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				   <fieldset class="form-group">
						   <label for="questions">Any questions for or about the food bank, please use the provided space below and a staff member will respond using your preferred contact information.</label><br />
						   <textarea class="input col-xs-12 form-control" id="questions" name="questions" rows="7"><?php echo $questions; ?></textarea>
				   </fieldset>						
					   <button type="submit" class="btn btn-warning" name="submit">Submit</button>
					   <p class="asterisk">* = Required field</p>
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

