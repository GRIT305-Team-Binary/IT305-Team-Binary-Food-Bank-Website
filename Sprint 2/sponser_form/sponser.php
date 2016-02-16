<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
.err{
  color:red;
  font-weight: bolder;
}
.sponserHeaderText{
  text-align: center;
}

.headerText{
  border-radius: 5px;
  border: 1px solid black;
  margin-top: 20px;
  font-size: 1.5em;
}

.sponserHeaderText{

  margin-top: 20px;
}

 #sponserFormSubmitBtn {
  width: 30%;
  height: 60px;
  border-radius: 5px;
  box-shadow: 2px 2px 2.5px #888888;
  margin-top: 20px;
}


.sponserBoxHeader{
  text-align: center;
}

h3.sponserBoxHeader{
  text-decoration: underline;
  margin-bottom: 20px;
}

.sponserBox{
    border-radius: 2.5px;
    margin-top: 15px;
    border: 1px solid black;
    box-shadow: 2px 2px 2.5px #888888;
}

.sponserFormTextBoxes{
  border-radius: 2.5px;
  padding: 15px .5% 15px .5%;
  margin-top: 20px;
  border: 1px solid black;
  box-shadow: 2px 2px 2.5px #888888;
}

.sponserLiEl li{
  list-style-type: none;
}

.sponser-radio-btn{
  width: 30px;
  height: 30px;
}

.rdoTxt{
  position: relative;
  bottom: 10px;
}

.sponserRadioBtnNTxt{
  width: 63%;
  margin-left: auto;
  margin-right: auto;
}

/* Custom, iPhone Retina */
    @media only screen and (min-width : 320px) and (max-width : 479px) {

      .sponserFormTextBoxes{
        position: relative;
        top: 10px;
        float: none;
        display: table;
        margin: 0 auto;

      }

    .inputFields{
      text-align: center;
    }

    #sponserFormSubmitBtn {
    position: relative;
    left: 19%;
   }

    }

    /* Extra Small Devices, Phones */
    @media only screen and (min-width : 480px) and (max-width : 767px) {

      .inputFields{
        text-align: center;
      }

      #sponserFormSubmitBtn {
      position: relative;
      left: 18%;
     }

    }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) and (max-width : 991px) {

      .sponserBox{
        margin-left: 2% !important;
        width: 31% !important;
        height: 700px;
      }

      .rdoTxt{
        position: relative;
        bottom: 25px;
        left: 25%;
        font-size: 1em;
      }
    }

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px) {

      .sponserRadioBtnNTxt{
        width: 78%;
      }

      .sponserBox{
        margin-left: 2% !important;
        width: 31% !important;
        height: 520px;
      }

    }


</style>

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
      $rdoNotSlectedErr = "<span class='err'><style> .sponserBox{
        height: 550px !important;
      }
      </style>Please Slect a Sponser level before you submit. <br /> </span>";
      $isValid = false;
    }else{
      $validSponserLvlsArr = array('bronze', 'silver', 'gold');

      if(!in_array($_POST['sponserLvl'], $validSponserLvlsArr)){
        $rdoNotSlectedErr = "The sponser you attempted to choose is not valid.";
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
        $fNameEmptyErr = "<span class='err'>Please enter a valid first name. <br /></span>";
        $isValid = false;
      }else {

      }



      //Phone Number Validation
      if(empty($_POST['phone'])){
        $phoneEmptyErr = "<span class='err'>Please enter a phone number. <br /></span>";
        $isValid = false;
      }elseif (!ctype_digit(str_replace(" ", "", str_replace("-", "", $_POST['phone'])))) {
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
        echo "This would return user to a thank you page.";
        return;
      }
    }
  }
 ?>

<div class="container">
<div class="headerText">
  <p class="col-md-10 col-md-offset-1 sponserHeaderText">We are excited this year to provide you with a number of different options to support the Kent Food Bank Annual Breakfast with your monetary donations. We have two different payment options, a one-time sponsorship payment or monthly installments. Both options will make a direct difference for families in need.
  </p>

  <p class="col-md-12 sponserHeaderText"><b>Your generosity is greatly appreciated!
  THANK YOU!!!
  </b></p>
</div>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal">

<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-1 sponserBox">
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
          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="gold" <?php echo $goldChecked; ?>><label class="rdoTxt">&nbsp;Donte at a Gold Level.</label>
        </div>
</div>

<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-1 sponserBox">
      <h2 class="sponserBoxHeader">Silver</h2>
      <h3 class="sponserBoxHeader">$1,500 or $125 per month for a year</h3>
        <ul class="sponserLiEl">
            <li>Logo and name recognition on printed materials</li><br />
            <li>Name recognition in annual report</li><br />
            <li>Logo and name recognition on our Facebook page</li><br />
            <li>Verbal recognition day of event</li><br>
            <li>Each Table of Honor guest will receive 3 raffle tickets</li><br />
        </ul>
        <br class="hidden-xs hidden-md hidden-lg"/>
        <br class="hidden-xs hidden-lg " />
        <br class="hidden-xs"/>
        <br class="hidden-xs "/>

        <div class="sponserRadioBtnNTxt">
          <?php echo $rdoNotSlectedErr; ?>
          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="silver" <?php echo $silverChecked; ?>><label class="rdoTxt">&nbsp;Donte at a Silver Level.</label>
        </div>
</div>

<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-1 sponserBox">
      <h2 class="sponserBoxHeader">Bronze</h2>
      <h3 class="sponserBoxHeader">$1,000 or $85 per month for a year</h3>
        <ul class="sponserLiEl">
            <li>Name recognition on printed materials</li><br />
            <li>Name recognition in annual report</li><br />
            <li>Name recognition on our Facebook page</li><br />
            <li>Verbal recognition day of event</li><br />
            <li>Table of Honor at event</li><br />
        </ul>
        <br class="hidden-xs hidden-md hidden-lg"/>
        <br class="hidden-xs hidden-md hidden-lg"/>
        <br class="hidden-xs hidden-md hidden-lg"/>
        <br class="hidden-xs hidden-md hidden-lg"/>
        <br class="hidden-xs" />
        <br class="hidden-xs" />
        <br class="hidden-xs" />
        <br  class="hidden-xs" />
        <br class="hidden-md hidden-xs" />
        <div class="sponserRadioBtnNTxt">
          <?php echo $rdoNotSlectedErr; ?>
          <input class="sponser-radio-btn" type="radio" name="sponserLvl" value="bronze" <?php echo $bronzeChecked; ?>><label class="rdoTxt">&nbsp;Donte at a Bronze Level.</label>
      </div>
  </div>

<div class="col-xs-10 col-xs-offset-1  col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 sponserFormTextBoxes" id="">
  <div class="row">
    <div class="inputFields col-xs-12  col-sm-4 col-md-4">
      &nbsp;<label>First Name:</label><br />
      <?php echo $fNameEmptyErr ?>
      &nbsp;<input type="text" name="fName" value="<?php echo $fName; ?>">
   </div>

    <div class="inputFields col-xs-12  col-sm-4 col-md-4">
      &nbsp;<label>Last Name:</label><br />
     <?php echo $lNameEmptyErr ?>
      &nbsp;<input type="text" name="lName" value="<?php echo $lName; ?>">
    </div>

    <div class="inputFields col-xs-12  col-sm-4 col-md-4">
      &nbsp;<label>Middle Initial:</label><br />
      &nbsp;<input type="text" name="mName" value="<?php echo $mName; ?>">
    </div>
  </div>

  <div class="row">
    <div class="inputFields col-xs-12 col-sm-4 col-md-4">
      &nbsp;<label>Business/Organization:</label><br />
      &nbsp;<input type="text" name="bus-org" value="<?php echo $busOrg; ?>">
    </div>

    <div class="inputFields col-xs-12 col-sm-4 col-md-4">
      &nbsp;<label>Phone:</label><br />
     <?php echo $phoneEmptyErr ?>
      &nbsp;<input type="text" name="phone" value="<?php echo $phone; ?>">
    </div>

    <div class="inputFields col-xs-12  col-sm-4 col-md-4">
      &nbsp;<label>Email:</label><br />
      <?php echo $emailEmptyErr ?>
      &nbsp;<input type="text" name="email" value="<?php echo $email; ?>">
    </div>
  </div>
</div>

  <input type="submit" name="submit" class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4" id="sponserFormSubmitBtn">

</form>
</div>
