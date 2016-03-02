<?php
        //require('includes/sponsor-page-script.php');

        //Database connection
        $dbHost = "localhost";
        $dbUser = "teambina_kfbank";
        $dbPass = "3R(.=kB~UNVx";
        $dbName = "teambina_kentfoodbank";
        $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

        //adds the header page
        include ('includes/header.inc.php');

        //initializing the error handling arrays
        $errors = [];
        $missing = [];

        //initializing the isValid variable to true if it is ever set to false the page wil not submit.
        $isValid = true;

        //initializing the $_POST['sponserLvl'] data
        $sponsorLevel = isset($_POST['sponserLvl']) ? $_POST['sponserLvl'] : '';

        //This phone number accepts hyphens, prens, and spaces and replaces them with an emty string.
        $phoneNumber = isset($_POST['phone']) ? str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $_POST['phone'])))) : '';
        $appType = null;

        //initializing variable, used to hide elements on the page.
        $hideElement = "";

        //This logic makes the sponser level radio buttons sticky
        if (isset($_POST['sponserLvl']) && $_POST['sponserLvl'] == 'gold'){
            $goldSponsorSticky = 'checked';
        } else {
                $goldSponsorSticky = '';
        }

        //This logic makes the sponser level radio buttons sticky
        if (isset($_POST['sponserLvl']) && $_POST['sponserLvl'] == 'silver'){
            $silverSponsorSticky = 'checked';
        } else {
            $silverSponsorSticky = '';
        }

        //This logic makes the sponser level radio buttons sticky
        if (isset($_POST['sponserLvl']) && $_POST['sponserLvl'] == 'bronze'){
            $bronzeSponsorSticky = 'checked';
        } else {
            $bronzeSponsorSticky = '';
        }

        //sponsor form validation/sendemail
        if (isset($_POST['submit'])) {

            // setting expected and required arrays for the proccess_mail.php script validation
            $expected = ['sponserLvl', 'fName', 'lName', 'mName', 'busorg', 'phone', 'email'];
            $required = ['sponserLvl', 'fName', 'lName', 'phone', 'email'];

            //setting values for the proccess_mail.php script
            $recipient = 'The Kent Food Bank <peterlkim1337@gmail.com>';
            $subject = 'A new sponsor has applied';
            $headers = [];
            $headers[] = 'From: KFB Sponsor form noreply@teambinary.greenrivertech.net';
            $headers[] = 'Content-type: text/plain; charset=utf-8';
            $authorized = '-fnoreply@teambinary.greenrivertech.net';

            //setting values for the proccess_mail.php script
            $recipient2 = $_POST['fName'] . " " . $_POST['lName'] . "<" . $_POST['email'] . ">";
            $subject2 = 'Thank you for you interest in sponsoring';
            $headers2 = [];
            $headers2[] = 'From: The Kent Food Bank noreply@teambinary.greenrivertech.net';
            $headers2[] = 'Content-type: text/plain; charset=utf-8';
            $authorized2 = '-fnoreply@teambinary.greenrivertech.net';
            $message2 = 'Thank you for sponsoring the Kent Food Bank. One of our representatives will contact you for further steps regarding sponsorship.';
            $message2 = wordwrap($message2);
            $headers2 = implode("\r\n", $headers2);

            //setting subject line for the proccess_mail.php script
            $_POST['subject'] = $subject;


            //array of expected sponsor levels
            $sponsorLvlExpected = array('gold', 'silver', 'bronze');

            //setting default boolean for sponsor validation
            $validRdoBtn = false;

            //checks to see if the sponsorlvl data is in the expected array
            if(in_array($sponsorLevel, $sponsorLvlExpected)) {
                $validRdoBtn = true;
            }

            //If it is not in the expected array then throws an error.
            if(!$validRdoBtn) {
                $errors['sponorRadioBtn'] = true;
                $isValid = false;
            }

             //checks to see if name field is only letters or highens or apostraphies
            if (preg_match("/[^A-Za-z'-]/", $_POST['fName'])){
                $errors['fName'] = true;
                $isValid = false;
            }

             //checks to see if name field is only letters or highens or apostraphies
            if (preg_match("/[^A-Za-z'-]/", $_POST['lName'])){
                $errors['lName'] = true;
                $isValid = false;
            }

            //checks to see if name field is only letters or highens or apostraphies
            if (preg_match("/[^A-Za-z'-]/", $_POST['mName'])){
                $errors['mName'] = true;
                $isValid = false;
            }

            //checks to see if phone number are digits
            if(!ctype_digit($phoneNumber)) {
                $errors['phone'] = true;
                $isValid = false;
            }

            //validation block
            if($isValid) {

                //escape the input strings
                $sponserLvlRdo = mysqli_real_escape_string($connection, $sponsorLevel);
                $fName = mysqli_real_escape_string($connection, $_POST['fName']);
                $mName = mysqli_real_escape_string($connection, $_POST['mName']);
                $lName = mysqli_real_escape_string($connection, $_POST['lName']);
                $busOrg = mysqli_real_escape_string($connection, $_POST['busorg']);
                $phone = mysqli_real_escape_string($connection, $phoneNumber);
                $email = mysqli_real_escape_string($connection, $_POST['email']);

                //database query to insert data into the database.
                $query = "INSERT INTO sponsors (sponsor_lvl, fname, mname, lname, Bus_Org, phone, email) ";
                $query .= "VALUES ('{$sponserLvlRdo}', '{$fName}', '{$mName}', '{$lName}', '{$busOrg}', '{$phone}', '{$email}')";


                $result = mysqli_query($connection, $query);

                //hides elements
                $hideElement = 'hidden';

                $mailSent2 = mail($recipient2, $subject2, $message2, $headers2, $authorized2);
                //kills page if query fails
                if($result){
                //success


                }else{


                 die("Database query failed");

                }




            }

            require('includes/process_mail.php');

    }



?>

<link rel="stylesheet" href="./css/sponsor-page.css" />

<div class="main" id="#top">
    <div class="container-fluid">
		<h1>Become a Sponsor</h1>
          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
                  <?php  include ('includes/contribute-side.php');  ?>
              </div>
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">

          <?php if(empty($errors) && empty($missing) && $isValid && isset($_POST['submit'])) : ?>

           <h2>Thank you for sponsoring Kent Food Bank.</h2>
           <p><b>We will contact you via email or phone regarding the steps to make you a sponsor. We are ever so grateful, Thank You!</b></p>

       <?php endif; ?>

              <div class="headerText <?php echo $hideElement ?>">
                <p class="col-md-10 col-md-offset-1 sponserHeaderText">We are excited this year to provide you with a number of different options to support the Kent Food Bank Annual Breakfast with your monetary donations. We have two different payment options, a one-time sponsorship payment or monthly installments. Both options will make a direct difference for families in need.
                </p>
              <?php if($_POST && ($suspect || isset($errors['mailfail']))) :  ?>
                  <p class="col-md-12 sponserHeaderText formError"><b>Sorry, your mail couldn't be sent.</b></p>

              <?php elseif($errors || $missing) : ?>
                  <p class="col-md-12 sponserHeaderText formError"><b>There are errors with your submission <br>
                  Please see below</b></p>
              <?php  endif; ?>

                <p class="col-md-12 text-center"><b>Your generosity is greatly appreciated!
                THANK YOU!!!
                </b></p>


              </div>

                <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal <?php echo $hideElement ?>">



                <div id="gold" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1 sponserBox">
                      <h2 class="sponserBoxHeader">Gold</h2>
                      <h3 class="sponserBoxHeader">$3,000 or $250 per month for a year</h3>
                        <ul class="sponserLiEl">
                            <li>Logo and name recognition on printed materials</li><br />
                            <li>Logo and name recognition in annual report</li><br />
                            <li>Logo and name recognition on our Facebook page</li><br />
                            <li>Verbal recognition day of event</li><br />
                            <li>Each Table of Honor guest will receive 7 raffle tickets</li><br />
                            <li>Certificate of Appreciation</li><br />
                        </ul>

                        <div class="sponserRadioBtnNTxt">
                        <?php if($missing && in_array('sponserLvl', $missing)) : ?>
                            <span class="formError"><b>Please choose a sponsor level.</b></span><br>
                        <?php endif; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="gold" <?php
                            if($errors || $missing) {
                                echo $goldSponsorSticky;
                            }
                           ?>><label class="rdoTxt">&nbsp;Donate at a Gold Level.</label>
                        </div>
                </div>

                <div id="silver" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1 sponserBox">
                      <h2 class="sponserBoxHeader">Silver</h2>
                      <h3 class="sponserBoxHeader">$1,500 or $125 per month for a year</h3>
                        <ul class="sponserLiEl">
                            <li>Logo and name recognition on printed materials</li><br />
                            <li>Name recognition in annual report</li><br />
                            <li>Logo and name recognition on our Facebook page</li><br />
                            <li>Verbal recognition day of event</li><br>
                            <li>Each Table of Honor guest will receive 3 raffle tickets</li><br />
                        </ul>


                        <div class="sponserRadioBtnNTxt">
                        <?php if($missing && in_array('sponserLvl', $missing)) : ?>
                            <span class="formError"><b>Please choose a sponsor level.</b></span><br>
                        <?php endif; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="silver" <?php
                            if($errors || $missing) {
                                echo $silverSponsorSticky;
                            }
                           ?>><label class="rdoTxt">&nbsp;Donate at a Silver Level.</label>
                        </div>
                </div>

                <div id="bronze" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1  btm2 sponserBox">
                      <h2 class="sponserBoxHeader">Bronze</h2>
                      <h3 class="sponserBoxHeader">$1,000 or $85 per month for a year</h3>
                        <ul class="sponserLiEl">
                            <li>Name recognition on printed materials</li><br />
                            <li>Name recognition in annual report</li><br />
                            <li>Name recognition on our Facebook page</li><br />
                            <li>Verbal recognition day of event</li><br />
                            <li>Table of Honor at event</li><br />
                        </ul>

                        <div class="sponserRadioBtnNTxt">
                        <?php if($missing && in_array('sponserLvl', $missing)) : ?>
                            <span class="formError"><b>Please choose a sponsor level.</b></span><br>
                        <?php endif; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="bronze" <?php
                            if($errors || $missing) {
                                echo $bronzeSponsorSticky;
                            }
                           ?>><label class="rdoTxt">&nbsp;Donate at a Bronze Level.</label>
                      </div>
                  </div>

                <div class="col-xs-10 col-xs-offset-1  col-sm-10 col-sm-offset-1 col-md-12 col-md-pull-1 sponserFormTextBoxes" id="">

                    <?php if($errors && isset($errors['sponorRadioBtn'])) : ?>
                        <p class="formError"><b>You chose a sponser level that doesn't exists.</b></p><br>
                    <?php endif; ?>

                  <div class="row">
                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>First Name:</label>
                      <?php if($missing && in_array('fName', $missing)) : ?>
                          <span class="formError"><b>Please provide a first name for this form.</b></span>
                      <?php elseif($errors && isset($errors['fName'])) : ?>
                          <span class="formError"><b>Please provide a valid first name.</b></span>
                      <?php endif; ?>
                      <br />
                      &nbsp;<input type="text" name="fName" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($fName) . '"';
                        }
                      ?>>
                   </div>
                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Middle Initial:</label>
                  <?php if($errors && isset($errors['mName'])) : ?>
                      <span class="formError"><b>Please provide a valid middle initial.</b></span>
                  <?php endif; ?>
                      <br />
                      &nbsp;<input type="text" name="mName" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($mName) . '"';
                        }
                      ?>>
                    </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Last Name:</label>
                      <?php if($missing && in_array('lName', $missing)) : ?>
                          <span class="formError"><b>Please provide a last name for this form.</b></span>
                      <?php elseif($errors && isset($errors['lName'])) : ?>
                          <span class="formError"><b>Please provide a valid last name.</b></span>
                      <?php endif; ?>
                      <br />
                      &nbsp;<input type="text" name="lName" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($lName) . '"';
                        }
                      ?>>
                    </div>

                    
                  </div>

                  <div class="row">
                    <div class="inputFields col-xs-12 col-sm-12 col-md-4">
                      &nbsp;<label>Business/Organization:</label><br />
                      &nbsp;<input type="text" name="busorg" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($busorg) . '"';
                        }
                      ?>>
                    </div>

                    <div class="inputFields col-xs-12 col-sm-12 col-md-4">
                      &nbsp;<label>Phone:</label>
                      <?php if($missing && in_array('phone', $missing)) : ?>
                          <span class="formError"><b>Please provide a phone number for this form.</b></span>
                      <?php elseif($errors && isset($errors['phone'])) : ?>
                          <span class="formError"><b>Please provide a valid phone number.</b></span>
                      <?php endif; ?>
                      <br />
                      &nbsp;<input type="text" name="phone" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($phone) . '"';
                        }
                      ?>>
                    </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Email:</label>
                      <?php if ($missing && in_array('email', $missing)) : ?>
                          <span class="formError"><b>Please provide a email for this form.</b></span>
                      <?php elseif (isset($errors['email'])) : ?>
                           <span class="formError"><b>Invalid email address.</b></span>
                      <?php endif; ?>
                      <br />
                      &nbsp;<input type="text" name="email" <?php
                        if($errors || $missing) {
                            echo 'value="' . htmlentities($email) . '"';
                        }
                      ?>>
                    </div>
                  </div>
                </div>

                  <input type="submit" name="submit" class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4" id="sponserFormSubmitBtn">

                </form>
               </div>
        </div>
      </div>
</div>
             <?php

                //Add the footer to the page
                 include ('includes/footer.php');

                 //close the databas
                 mysqli_close($connection);

             ?>
