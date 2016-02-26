<?php
        include('includes/sponsor-page-script.php');
        include ('includes/header.inc.php');  

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
                          <?php echo $rdoNotSlectedErr; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="gold" <?php echo $goldChecked; ?>><label class="rdoTxt">&nbsp;Donate at a Gold Level.</label>
                        </div>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1 sponserBox">
                      <h2 class="sponserBoxHeader">Silver</h2>
                      <h3 class="sponserBoxHeader">$1,500 or $125 per month for a year</h3>
                        <ul class="sponserLiEl">
                            <li>Logo and name recognition on printed materials</li><br />
                            <li>Name recognition in annual report</li><br />
                            <li>Logo and name recognition on our Facebook page</li><br />
                            <li>Verbal recognition day of event</li><br>
                            <li>Each Table of Honor guest will receive 3 raffle tickets</li><br />
                        </ul>
                        <br class="hidden-xs hidden-sm hidden-md hidden-lg"/>
                        <br class="hidden-xs hidden-sm" />
                        <br class="hidden-xs hidden-sm"/>
                        <br class="hidden-xs "/>

                        <div class="sponserRadioBtnNTxt">
                          <?php echo $rdoNotSlectedErr; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="silver" <?php echo $silverChecked; ?>><label class="rdoTxt">&nbsp;Donate at a Silver Level.</label>
                        </div>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-3 col-lg-offset-1  btm2 sponserBox">
                      <h2 class="sponserBoxHeader">Bronze</h2>
                      <h3 class="sponserBoxHeader">$1,000 or $85 per month for a year</h3>
                        <ul class="sponserLiEl">
                            <li>Name recognition on printed materials</li><br />
                            <li>Name recognition in annual report</li><br />
                            <li>Name recognition on our Facebook page</li><br />
                            <li>Verbal recognition day of event</li><br />
                            <li>Table of Honor at event</li><br />
                        </ul>
                        <br class="hidden-xs hidden-sm hidden-md hidden-lg"/>
                        <br class="hidden-xs hidden-sm hidden-md hidden-lg"/>
                        <br class="hidden-xs hidden-sm hidden-md hidden-lg"/>
                        <br class="hidden-xs hidden-sm hidden-md hidden-lg"/>
                        <br class="hidden-xs hidden-sm" />
                        <br class="hidden-xs hidden-sm" />
                        <br class="hidden-xs hidden-sm" />
                        <br  class="hidden-xs hidden-sm" />
                        <br class="hidden-md hidden-xs" />
                        <div class="sponserRadioBtnNTxt">
                          <?php echo $rdoNotSlectedErr; ?>
                          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="bronze" <?php echo $bronzeChecked; ?>><label class="rdoTxt">&nbsp;Donate at a Bronze Level.</label>
                      </div>
                  </div>

                <div class="col-xs-10 col-xs-offset-1  col-sm-10 col-sm-offset-1 col-md-12 col-md-pull-1 sponserFormTextBoxes" id="">
                  <div class="row">
                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>First Name:</label><br />
                      <?php echo $fNameEmptyErr ?>
                      &nbsp;<input type="text" name="fName" value="<?php echo $fName; ?>">
                   </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Last Name:</label><br />
                     <?php echo $lNameEmptyErr ?>
                      &nbsp;<input type="text" name="lName" value="<?php echo $lName; ?>">
                    </div>

                    <div class="inputFields col-xs-12  col-sm-12 col-md-4">
                      &nbsp;<label>Middle Initial:</label><br />
                      &nbsp;<input type="text" name="mName" value="<?php echo $mName; ?>">
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
             <?php

                //Add the footer to the page
                 include ('includes/footer.php');

                 //close the databas
                 mysqli_close($connection);

             ?>
