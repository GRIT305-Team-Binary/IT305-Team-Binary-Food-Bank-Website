<?php
	/* Contact Us
	 * Kent Food Bank 
	 * Nicole Team Binary
	 * http://teambinary.greenrivertech.net/volunteer.php
	 */
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'subject', 'comments'];
    $required = ['name', 'email', 'comments'];
    $recipient = 'Tina Ostrander <tostrander@greenriver.edu >';
	$subject = 'Feedback from online form';
	$headers = [];
    $headers[] = 'From: kentfoodbank@gmail.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = '-fkentfoodbank@gmail.com';
    require './includes/process_mail.php';
    if ($mailSent) {
        //header('Location: contact-thank-you.php');
       // exit;
    }
}
?>

<!DOCTYPE html>

<html lang="en">
<?php
include ('includes/header.inc.php');
?>
<div class="main">
	<div class="container-fluid ">
		<div class="row">
			<div class="col-xs-12 col-lg-offest-1 col-lg-10">
				<h2>Contact Us</h2>
			</div>
		</div>
		<div class="row ">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
					<h2 class="formError">Sorry, your mail couldn't be sent.</h2><br>
				<?php elseif ($errors || $missing) : ?>
					<h2 class="formError">Please fix the item(s) indicated:</h2>
				<?php endif; ?>
				<?php
					if ($_POST && $mailSent) {
					echo "<div class='row '>
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>
					<p class='form-confirm'>Your message has been sent. Thank you!</p>
					</div>
					</div>";
					}
				?>
				<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" role="form">
					<div class="row ">
					
						<!-- Name -->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
							<div class="form-group">
								<div class="col-xs-12">
									<p>
										<label for="name">
											<?php if ($missing && in_array('name', $missing)) : ?>
											<span class="formError">Please enter your name.</span>
											<?php endif; ?>
											<br>Name*
										</label><br>
										<!-- adding class if error -->
										<input type="text" name="name" id="name"  class="input form-control 
										<?php
											if ($errors || $missing) {
												echo 'has-error has-feedback" ';
												// adding value of previoulsy entered
												echo 'value="' . htmlentities($name) . '"';
											} else {
												echo '"';
											}
										?>
										>
									</p>
								</div> <!-- End of Name div-->
							</div> <!-- End of Form group -->
						</div><!-- End of div col-md-6 -->
						
						<!-- Email -->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right form-group">
							<div class="form-group">
								<div class="col-xs-12">
									<p>
										<label for="email" class="control-label">
											<?php if ($missing && in_array('email', $missing)) : ?>
											<span class="formError">Please enter your e-mail.</span>
											<?php elseif (isset($errors['email'])) : ?>
											<span class="formError ">Invalid email address</span>
											<?php endif; ?>
											<br>E-mail address*
										</label><br>
					
										<input type="email" name="email" id="email" class="input form-control"
										<?php
											if ($errors || $missing) {
												echo 'value="' . htmlentities($email) . '">';
											} else {
												echo 'value="' . htmlentities($email). '">'; 
											}	
										?> 
									</p>
								</div> <!-- End of Email -->
							</div> <!-- End of Form group -->
						</div><!-- End of div col-md-6 -->
					</div><!-- End of row-->
					
					<!-- Subject -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
								<div class="form-group">
									<p>
										<label for="subject">Subject</label><br>
										<input type="text" name="subject" id="subject" class="form-control
										<?php
										if ($errors || $missing) {
										echo 'has-error has-feedback" ';
										echo 'value="' . htmlentities($subject) . '"';
										} else {
										echo '"';
										}
										?> >
									</p>
								</div><!-- End of form group -->
							</div> <!-- End of div col-lg-12 -->
						</div> <!-- End of div col-lg-12 -->
					</div> <!-- End of row -->
				
					<!-- Comments -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="form-group">
								<p>
									<label for="comments">Comments*
										<?php if ($missing && in_array('comments', $missing)) : ?>
											<span class="formError">You forgot to add any comments.</span>
										<?php endif; ?>
									</label><br>
									<textarea name="comments" id="comments" rows="5" class="input form-control">
										<?php
											//If php is not on the line above it ands strange white space
											if ($errors || $missing) {
												echo htmlentities($comments);
											}
										?>
									</textarea>
								</p>
							</div><!-- End of form group-->
						</div> <!-- End of div col-lg-12 -->
					</div> <!-- End of row -->	
					<p>
						* = Required field<br><br>
						<input type="submit" name="send" id="send" value="Send Comments">
					</p>
				</form><!-- End of Form -->
			</div><!-- End of div col-lg-7 -->
			
			<!-- Side bar with Contact information for Kent Food Bank -->
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 " role="group">
				<?php
				include('includes/contact_KFB.php');
				?>	
			</div>
		</div><!-- End of row -->
	</div><!-- End of container-fluid -->
</div><!-- End of main -->
<?php
include('includes/footer.php');
?>
