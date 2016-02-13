<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'subject', 'comments'];
    $required = ['name', 'email', 'comments'];
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
        header('Location: contact-thank-you.php');
        exit;
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
			  <!-- Contact Form 
				 
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
		-->
			<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
			<p>Sorry, your mail couldn't be sent.</p><br>
			<?php elseif ($errors || $missing) : ?>
			<p>Please fix the item(s) indicated:</p>
			<?php endif; ?>
			
			<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
			 <div class="row ">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
					<div class="form-group">
						<p>
							<label for="name">Name*
								<?php if ($missing && in_array('name', $missing)) : ?>
								<span class="formError">Please enter your name.</span>
								<?php endif; ?>
							</label><br>
							<div class="col-xs-12">
							<input type="text" name="name" id="name"  class="input form-control "
							<?php
								if ($errors || $missing) {
									echo 'value="' . htmlentities($name) . '"';
								}
							?>
							>
							</div>
						</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right form-group">
					
					<div class="form-group">
						<p><label for="email">E-mail address*
							<?php if ($missing && in_array('email', $missing)) : ?>
							<span class="formError">Please enter your email address.</span>
							<?php elseif (isset($errors['email'])) : ?>
							<span class="formError ">Invalid email address</span>
							<?php endif; ?>
						</label><br>
						<div class="col-xs-12">
							<input type="email" name="email" id="email" 	 class="input form-control"					<?php
								if ($errors || $missing) {
									echo 'value="' . htmlentities($email) . '"';
								}
							?> >
						</div>
						</p>
					</div>
				</div>
			</div>
			  
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="form-group">
						<p><label for="subject">Subject</label><br>
						<input type="subject" name="subject" id="subject" class="form-control"
						<?php
							if ($errors || $missing) {
								echo 'value="' . htmlentities($subject) . '"';
							}
						?>
						</p>
						</div>
					</div>
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="form-group">
		
							<p>
								<label for="comments">Comments*
									<?php if ($missing && in_array('comments', $missing)) : ?>
									<span class="formError">You forgot to add any comments.</span>
									<?php endif; ?>
								</label><br>
								<textarea name="comments" id="comments" rows="5" class="input form-control"><?php
									if ($errors || $missing) {
										echo htmlentities($comments);
									}
								?></textarea>
								
							</p>
						</div>
					</div>
					<p>
						* = Required field<br><br>
						<input type="submit" name="send" id="send" value="Send Comments">
					</p>
				</div>
			
				</div>
			
			</form>
				 
				<?php
					if ($_POST && $mailSent) {
						echo "<div class='row '>
								<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>
										Your message has been sent. Thank you!
								</div>";
					}
				?>
				 
				 
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
  
	
 <?php
            include('includes/footer.php');
        ?>