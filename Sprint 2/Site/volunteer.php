<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = [ 'appType', 'fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
				 'clothing', 'office', 'food','whyVolunteer',
				 'commit', 'lift', 'limitation', 'questions'];
    $required = ['fname', 'lname', 'address', 'city', 'zip', 'phone', 'email',
				 'commit', 'lift', 'limitation'];
    $recipient = 'Nicole Bassen <nicolerbassen@gmail.com>';
	if (!empty($_POST['subject'])) {
		$subject = $_POST['subject'];
	}
    else {
		$subject = 'Feedback from online form';
	}
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    require './includes/process_mail.php';
    if ($mailSent) {
        //header('Location: contact-thank-you.php');
       // exit;
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
         <form method="GET" action="Volunteer-thank-you.php">
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
				<label class="radio-inline"><input type="radio" name="appType" id="School" value="School">School</label>
			
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
	<!-- First Name field -->
		<fieldset class="form-group">
			<label for="fname">First Name*</label><br>
			<input name="fname" class="input col-xs-12 form-control" type="text" placeholder="Enter your first name" >
		</fieldset>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
	<!-- Last Name field -->
		<fieldset class="form-group">
			<label for="lname">Last Name*</label><br>
			<input name="lname" class="input col-xs-12 form-control" type="text" placeholder="Enter your last name" >
		</fieldset>
	</div>
	
	
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
	<!-- Address -->
	<fieldset class="form-group">
		<label for="address">Address*</label><br>
		<input name="address" class="input col-xs-12 form-control" type="text" id="address" placeholder="Enter your street address" >
	</fieldset>
	</div>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
	
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
	<!-- City -->
		<fieldset class="form-group">
			<label for="city">City*</label><br>
			<input name="city" class="input col-xs-12 form-control" type="text" id="city" placeholder="Enter your city" >
		</fieldset>
	</div>
	<div class="col-lg-3 visible-lg">
		<h2 class="text-center">WA</h2>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	<!-- Zip -->
		<fieldset class="form-group">
			<label for="zip">Zip Code*</label><br>
			<input name="zip" pattern="[0-9]*" class="input col-xs-12 form-control" id="zip" type="text" placeholder="Enter your zip" >
		</fieldset>
	</div>
</div>
</div>


<div class="row">
	<fieldset class="form-group">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<!-- Contact Phone -->
			<label>Phone*</label><br>
			<input name="phone" id="phone" class="input col-xs-12 form-control" id="phone"  type="tel" placeholder="Enter phone number" ><br><br>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<!-- Contact Email-->
			<label>E-mail address*</label><br>
			<input name="email" class="input col-xs-12 form-control" id="email" type="email" placeholder="Enter email" >
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
    		<textarea class="input col-xs-12 form-control" id="whyVolunteer" name="whyVolunteer" rows=10></textarea>
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
    		<label for="questions">Any questions for or about the foodback please use the provided space below and a staff member will respond using your preferred contact information.</label><br />
    		<textarea class="input col-xs-12 form-control" id="questions" name="questions" rows="7"></textarea>
  	</fieldset>						
		<button type="submit" class="btn btn-warning">Submit</button>
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

