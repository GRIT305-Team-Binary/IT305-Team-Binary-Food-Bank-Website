<!DOCTYPE html>

<html lang="en">
	<?php
		include ('includes/header.inc.php');
	?>
	<div class="main">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-xs-12 ">
                <h2>Contact Us</h2>
            </div>
        </div>
		<div class="row">
			
		</div>
        <div class="row ">
			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				 
				  <!-- Contact Form -->
				 
				 <form method="POST" action="contact-form-process.php">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					 <label>Name*</label><br>
					 <input name="name" class="input col-xs-12" type="text" value="" size="40"><br><br>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					 <label>E-mail address*</label><br>
					 <input name="email" class="input col-xs-12" type="text" value="" size="40"><br><br>
					 </div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label>Subject</label><br>
							<input name="subject" class="input col-xs-12" type="text" value="" size="40"><br><br>
											   
							<label>Comments*</label><br>
							<textarea name="message" class="input col-xs-12" rows="5" cols="40"></textarea><br>
							
							<input type="submit" name="submit" value="Submit"><br>
							<p class="asterisk">* = Required field</p>
						</div>
					</div>
				 </form>
				 
				 
			 </div>
			
			
			
			        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 " role="group">
						<div class="btn-group-vertical col-xs-12">
							
							<div class="btn btn-warning">
								<!-- Hours -->
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								<a class="defaultLink" href="calendar.php">Hours of Operation</a>
							</div>
							
							<div class="btn btn-default">
							<!-- Phone -->
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (253) 520-3550
							</div>
							<div class="btn btn-default">
								<!-- Facebook Page -->
							<span class="facebook-hours">
							<span class="glyphicon"><img src="images/fb-icon-20.png" class="img-responsive" alt="facebook" /></span>
								<a class="defaultLink" href="http://facebook.com/kentfoodbank" target="_blank">
								<span class="hidden-xs hidden-sm contactInfo">facebook.com/kentfoodbank</span><span class="visible-xs visible-sm">Facebook</span>
								</a>
							</span>
							</div>
							<div class="btn btn-default">
							<!-- Email -->
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
								<a class="defaultLink" href="mailto:kentfoodbank@gmail.com">
									<span class="hidden-xs hidden-sm contactInfo">kentfoodbank@gmail.com</span><span class="visible-xs visible-sm">Email</span>
								</a>
							</div>
							<div class="btn btn-warning">
								<!-- Location -->
								<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
								<a class="defaultLink" href="location.php">Location</a>
							</div>
							
					</div>
			 </div>
 
		
		 </div>
	    </div>
    </div>
	
 <?php
            include('includes/footer.php');
        ?>