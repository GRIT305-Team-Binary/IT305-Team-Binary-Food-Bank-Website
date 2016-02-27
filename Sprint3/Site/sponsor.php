

<link rel="stylesheet" href="./css/sponsor-page.css" />

<?php
//Form Validation for the sponser form.

  $rdoNotSlectedErr = ""; //initializing the variable
  $fNameEmptyErr = ""; //initializing the variable
  $lNameEmptyErr = ""; //initializing the variable
  $phoneEmptyErr = ""; //initializing the variable
  $emailEmptyErr = ""; //initializing the variable
  $goldChecked = ""; //initializing the variable
  $silverChecked = ""; //initializing the variable
  $bronzeChecked = ""; //initializing the variable
  $errors = "";
  $missing = "";
  $suspect = "";
  $formProc = "";

  $mName = isset($_POST['mName']) ? $_POST['mName'] : '';
  $busOrg = isset($_POST['bus-org']) ? $_POST['bus-org'] : '';
  $fName = isset($_POST['fName']) ? $_POST['fName'] : '';
  $lName = isset($_POST['lName']) ? $_POST['lName'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $sponserLvlRdo = isset($_POST['sponserLvl']) ? $_POST['sponserLvl'] : '';

// makes the radio buttons sticky
  if(isset($_POST['submit'])){
    $isValid = true;



    if($sponserLvlRdo == 'gold'){
      $goldChecked = 'checked';
    }elseif($sponserLvlRdo == 'silver'){
      $silverChecked = "checked";
    }elseif ($sponserLvlRdo == 'bronze') {
      $bronzeChecked = "checked";
    }

    // Radio buttons validation
    if(!isset($_POST['sponserLvl'])){
      $rdoNotSlectedErr = "<span class='err'>Please select a sponsor level before you submit. <br /> </span>";
      $isValid = false;
    }else{
      $validSponserLvlsArr = array('bronze', 'silver', 'gold');

      if(!in_array($_POST['sponserLvl'], $validSponserLvlsArr)){
        $rdoNotSlectedErr = "The sponsor level you attempted to choose is not valid.";
        $isValid = false;
      }else{
        $sponserLvl = $_POST['sponserLvl'];
      }

      //First name validation
      if(empty($_POST['fName'])){
        $fNameEmptyErr = "<span class='err'>Please enter a first name. <br /></span>";
        $isValid = false;
      }elseif (!ctype_alpha($_POST['fName'])) {
        $fNameEmptyErr = "<span class='err'>Please enter a valid first name. <br /></span>";
        $isValid = false;
      }else{

      }

      //Last name validation
      if(empty($_POST['lName'])){
        $lNameEmptyErr = "<span class='err'>Please enter a last name. <br /></span>";
        $isValid = false;
      }elseif (!ctype_alpha($_POST['lName'])) {
        $lNameEmptyErr = "<span class='err'>Please enter a valid last name. <br /></span>";
        $isValid = false;
      }else {

      }



      //Phone Number Validation
      if(empty($_POST['phone'])){
        $phoneEmptyErr = "<span class='err'>Please enter a phone number. <br /></span>";
        $isValid = false;
      }elseif (!ctype_digit(str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $_POST['phone'])))))) {
        $phoneEmptyErr = "<span class='err'>Please enter a valid phone number. <br /></span>";
        $isValid = false;
      }else {

      }

      //email Validation
      if(empty($_POST['email'])){
        $emailEmptyErr = "<span class='err'>Please enter a email. <br /></span>";
        $isValid = false;
      }elseif (!strpos($_POST['email'], '@')) {
        $emailEmptyErr = "<span class='err'>Please enter a valid email. <br /></span>";
        $isValid = false;
      }else {

      }

      //check if all fields are valid and ready for submission
      if($isValid){

  			$formProc = "<h2>Thank you for sponsoring Kent Food Bank.</h2>" .
         "<p>We will contact you via email or phone regarding the steps to make you a sponsor. We are ever so grateful, Thank You!</p>";
         $formHd = "hidden";

         //message sent to user filling out this form
     $mailedMessage = 'Thank you for sponsoring the Kent Food Bank. One of our representatives will contact you for further steps regarding sponsorship.';

     //sends the user a reply after submitting the form.
     include('./mail-sender.php');

      }
    }
  }
 ?>
<!DOCTYPE html>

<html lang="en">

<?php  include ('includes/header.inc.php');  ?>


<div class="main" id="#top">
    <div class="container-fluid">
		<h1>Become a Sponsor</h1>
          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
                  <?php  include ('includes/contribute-side.php');  ?>
              </div>
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">

                <?php echo $formProc ?>

              <div class="headerText <?php echo $formHd ?>">
                <p class="col-md-10 col-md-offset-1 sponserHeaderText">We are excited this year to provide you with a number of different options to support the Kent Food Bank Annual Breakfast with your monetary donations. We have two different payment options, a one-time sponsorship payment or monthly installments. Both options will make a direct difference for families in need.
                </p>
              <?php if ($_POST && (!$suspect || !isset($errors['mailfail']))) : ?>
              <p class="col-md-12 sponserHeaderText formError"><b>There are errors with your submission <br>
              Please see below

                </b></p>
              <?php elseif (!$errors || !$missing) : ?>
                <p class="col-md-12 text-center"><b>Your generosity is greatly appreciated!
                THANK YOU!!!
                </b></p>

                <?php endif; ?>
              </div>

                <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal <?php echo $formHd ?>">

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1 sponserBox">
                      <h2 class="text-center">Gold</h2>
                      <h4 class="text-center">$3,000 or $250 per month for a year</h4>
                       
                            <p><b>Logo and name recognition on printed materials</b></p>
                            <p><b>Logo and name recognition in annual report</b></p>
                            <p><b>Logo and name recognition on our Facebook page</b></p>
                            <p>Verbal recognition day of event</p>
                            <p>Each Table of Honor guest will receive <b>7 raffle tickets</b></p>
                            <p><b>Certificate of Appreciation</b></p>
                            <p><hr></p>

                        <div class="radio">
                          <?php echo $rdoNotSlectedErr; ?>
                           <label class="radio-inline">
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="gold" <?php echo $goldChecked; ?>>
                          &nbsp;Donate at a Gold Level.</label>
                        </div>
                          <p>&nbsp;</p>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1 sponserBox">
                       <h2 class="text-center">Silver</h2>
                      <h4 class="text-center">$1,500 or $125 per month for a year</h4>
                        
                            <p><b>Logo and name recognition on printed materials</b></p>
                            <p>Name recognition in annual report</p>
                            <p><b>Logo and name recognition on our Facebook page</b></p>
                            <p>Verbal recognition day of event</p>
                            <p>Each Table of Honor guest will receive <b>3 raffle tickets</b></p>
                            <p>&nbsp;</p>
                            <p><hr></p>
                        
                        <div class="radio">
                          <?php echo $rdoNotSlectedErr; ?>
                          <label class="radio-inline">
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="silver" <?php echo $silverChecked; ?>>
                          &nbsp;Donate at a Silver Level.</label>
                        </div>
                          <p>&nbsp;</p>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1  btm2 sponserBox">
                       <h2 class="text-center">Bronze</h2>
                      <h4 class="text-center">$1,000 or $85 per month for a year</h4>
                            
                            <p>Name recognition on printed materials</p>
                            <p>Name recognition in annual report</p>
                            <p>Name recognition on our Facebook page</p>
                            <p>Verbal recognition day of event</p>
                            <p>Table of Honor at event</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p><hr></p>
                      
                        <div class="radio">
                          <?php echo $rdoNotSlectedErr; ?>
                          <label class="radio-inline">
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="bronze" <?php echo $bronzeChecked; ?>>
                          &nbsp;Donate at a Bronze Level.</label>
                      </div>
                        <p>&nbsp;</p>
                        
                  </div>

                <div class="col-xs-10 col-xs-offset-1  col-sm-10 col-sm-offset-1 col-md-12 col-md-pull-1 sponserFormTextBoxes" id="">
                  <div class="row">
                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>First Name:</label><br />
                      <?php echo $fNameEmptyErr ?>
                      &nbsp;<input type="text" name="fName" value="<?php echo $fName; ?>">
                   </div>
				   
				    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Middle Initial:</label><br />
                      &nbsp;<input type="text" name="mName" value="<?php echo $mName; ?>">
                    </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Last Name:</label><br />
                     <?php echo $lNameEmptyErr ?>
                      &nbsp;<input type="text" name="lName" value="<?php echo $lName; ?>">
                    </div>

                   
                  </div>

                  <div class="row">
                    <div class="inputFields col-xs-12 col-sm-12 col-md-4">
                      &nbsp;<label>Business/Organization:</label><br />
                      &nbsp;<input type="text" name="bus-org" value="<?php echo $busOrg; ?>">
                    </div>

                    <div class="inputFields col-xs-12 col-sm-12 col-md-4">
                      &nbsp;<label>Phone:</label><br />
                     <?php echo $phoneEmptyErr ?>
                      &nbsp;<input type="text" name="phone" value="<?php echo $phone; ?>">
                    </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Email:</label><br />
                      <?php echo $emailEmptyErr ?>
                      &nbsp;<input type="text" name="email" value="<?php echo $email; ?>">
                    </div>
                  </div>
                </div>

                  <input type="submit" name="submit" class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4" id="sponserFormSubmitBtn">

                </form>
               </div>
        </div>
      </div>
</div>
             <?php  include ('includes/footer.php');  ?>
