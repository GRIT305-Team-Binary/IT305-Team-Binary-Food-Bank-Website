<!DOCTYPE html>

<html lang="en">

<?php  include ('includes/header.inc.php');  ?>


	 <div class="main" id="#top">
    <div class="container-fluid">
		<h1>Contribute</h1>
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
         <form method="GET" action="">
<h1>Volunteer Application</h1>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
<!-- Name field -->
	<fieldset class="form-group">
		<label>Name*</label><br>
		<input name="name" class="input col-xs-12 form-control" type="text" value="" >
	</fieldset>
	</div> 
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
<!-- Application type -->
<fieldset class="form-group">
	<label >
  
	<div class="radio">
    		<label class="radio-inline">
     			<input type="radio" name="appType" id="Individual" value="individual" >
      			Individual
    		</label>
  	</div>
  	<div class="radio">
   	 	<label class="radio-inline">
      			<input type="radio" name="appType" id="Group" value="group">
     		 	Group
  		</label>
  	</div>
  	<div class="radio">
    		<label class="radio-inline">
      			<input type="radio" name="appType" id="Organization" value="organization">
     		 	Organization
    		</label>
  	</div>
	<div class="radio">
    		<label class="radio-inline">
      			<input type="radio" name="appType" id="School" value="School">
     		 	School
    		</label>
  	</div>
</fieldset>
</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<!-- Address -->
	<fieldset class="form-group">
		<label>Address*</label><br>
		<input name="name" class="input col-xs-12 form-control" type="text" value="" >
	</fieldset>
	</div>
</div>

<div class="row">
	<fieldset class="form-group">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<!-- Contact Phone -->
		<label>Phone*</label><br>
		<input name="phone" class="input col-xs-12 form-control" id="phone"  type="tel" value="Enter phone number" ><br><br>
	</div>
	</fieldset>
	<fieldset class="form-group">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<!-- Contact Email-->
		<label>E-mail address*</label><br>
		<input name="email" class="input col-xs-12 form-control" id="email" type="email" value="Enter email" >
		<br><br>
	</div>
	</fieldset>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
	Volunteer Opprotunities (check your interests)
		<div class="checkbox">
    			<label>
      			<input type="checkbox" name="clothing" id="clothing"> Clothing
    			</label>
  		</div>
		<div class="checkbox">
    			<label>
      			<input type="checkbox" name="office" id="office"> Office
    			</label>
  		</div>
		<div class="checkbox">
    			<label>
      			<input type="checkbox" name="food" id="food"> Food
    			</label>
  		</div>
	</fieldset>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
    		<label for="whyVolunteer">Why are you interested in volunteering?</label><br />
    		<textarea class="input col-xs-12 form-control" id="whyVolunteer" name="whyVolunteer" rows="3"></textarea>
  	</fieldset>
</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
	<p>Are you able to make a commitment of at leaset three (3) months one day a week?<br />
	(M, T, W, or F from 9am -2:30pm)</p>
	<div class="radio">
   	 	<label class="radio-inline">
      			<input type="radio" name="appType" id="commitYes" value="commitYes">
     		 	Yes
  		</label>
  	</div>
  	<div class="radio">
    		<label class="radio-inline">
      			<input type="radio" name="appType" id="commitNo" value="commitNo">
     		 	No
    		</label>
	
	</fieldset>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
	<p>Are you able to lift 10 pounds</p>
	<div class="radio">
   	 	<label class="radio-inline">
      			<input type="radio" name="appType" id="liftYes" value="liftYes">
     		 	Yes
  		</label>
  	</div>
  	<div class="radio">
    		<label class="radio-inline">
      			<input type="radio" name="appType" id="liftNo" value="liftNo">
     		 	No
    		</label>
	
	</fieldset>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
	<p>Do you have any physical limitations that would impair your ability to perform as a volunteer without supplemental assistance</p>
	<div class="radio">
   	 	<label class="radio-inline">
      			<input type="radio" name="appType" id="limitationYes" value="limitationYes">
     		 	Yes
  		</label>
  	</div>
  	<div class="radio">
    		<label class="radio-inline">
      			<input type="radio" name="appType" id="limitationNo" value="limitationNo">
     		 	No
    		</label>
	
	</fieldset>
</div>
</div>	
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<fieldset class="form-group">
    		<label for="questions">Any questions for or about the foodback please use the provided space below and a staff member will respond using your preferred contact information.</label><br />
    		<textarea class="input col-xs-12 form-control" id="questions" name="questions" rows="3"></textarea>
  	</fieldset>						
		<button type="submit" class="btn btn-warning">Submit</button>
		<p class="asterisk">* = Required field</p>
	</div>
</div>
</form></div>
			</div>
		</div>
	 </div>

<?php  include ('includes/footer.php');  ?>

