<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'email', 'comments'];
    $recipient = 'Nicole Bassen <nicolerbassen@gmail.com>';
    if (!empty($_POST['subject'])) {
		$subject = $_POST['subject'];
	}
    else {
		$subject = 'Feedback from online form';
	}
    $headers = [];
    $headers[] = 'From: Kentfoodbank@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    require './includes/process_mail.php';
    if ($mailSent) {
        header('Location: contact-thank-you.php');
        exit;
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
				<div class="col-xs-12 col-sm-8 col-md-7 col-lg-8">
					<!-- Details about what Kent Food Bank does -->
					
					<h2 class="text-center">Thank you!</h2>
					<p>Thank you for your interest in volunteering with the Kent Food Bank. Volunteers are a vital part of our ability
					to serve the needs of our community. Kent Food Bank would not be able to provide basic needs to our clients without
					our caring and dedicated volunteers. Kent Food Bank has volunteer positions to accommodate many different schedules,
					physical abilities and interests.<br><br>
					Thanks to people like you, we are able to spend 99 cents of every dollar donated on direct client services. Last year,
					community members donated more than 20,000 volunteer hours to support Kent Food Bank’s mission to end hunger. We cannot
					achieve our mission without you!<br><br>
					Once again, thank you for your interest.  A staff member will be in contact with you to set up orientation.<br><br>
					<strong>Jeniece Choate, Executive Director</strong><br>
					Kent Food Bank and Emergency Services<br><br>
					
					If you have any questions for or about the food bank please <a href="contactus.php">contact us</a>. </p>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
						<!-- Return to Contribute -->
						<p class="text-center"><a href="contribute.php" class="btn btn-warning text-center">Return to  <br /> How You Can Help</a></p></span>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
						<!-- Return to Home -->
						<p class="text-center"><a href="index.php" class="btn btn-warning text-center">Return to  <br /> Home</a></p></span>
					</div>	
				
				
				</div>
			</div>
		</div>
 </div>

<?php  include ('includes/footer.php');  ?>

