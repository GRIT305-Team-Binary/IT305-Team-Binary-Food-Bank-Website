<?php
//Database connection
$dbHost = "teambinary.greenrivertech.net";
$dbUser = "teambina_kfbank";
$dbPass = "3R(.=kB~UNVx";
$dbName = "teambina_kentfoodbank";

$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

//Test if connection occured.
if(mysqli_connect_errno()){
  die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"

  );
}

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
  $phone = isset($_POST['phone']) ? str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $_POST['phone'])))) : '';
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
      }elseif (!ctype_digit($phone)) {
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

        //escape the input strings
        $sponserLvlRdo = mysqli_real_escape_string($connection, $sponserLvlRdo);
        $fName = mysqli_real_escape_string($connection, $fName);
        $mName = mysqli_real_escape_string($connection, $mName);
        $lName = mysqli_real_escape_string($connection, $lName);
        $busOrg = mysqli_real_escape_string($connection, $busOrg);
        $phone = mysqli_real_escape_string($connection, $phone);
        $email = mysqli_real_escape_string($connection, $email);

        $query = "INSERT INTO sponsors (sponsor_lvl, fname, mname, lname, Bus_Org, phone, email) ";
        $query .= "VALUES ('{$sponserLvlRdo}', '{$fName}', '{$mName}', '{$lName}', '{$busOrg}', '{$phone}', '{$email}')";


        $result = mysqli_query($connection, $query);
        if($result){
          //success
          echo "Query added";
        }else{
          die("Database query failed");
        }

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
