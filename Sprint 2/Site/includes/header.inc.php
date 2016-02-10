    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kent Food Bank & Emergency Services</title>



    <!-- Bootstrap Core CSS -->
    <link href="http://teambinary.greenrivertech.net/readable_css/bootstrap.css" rel="stylesheet">
    <link href="http://teambinary.greenrivertech.net/readable_css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <div class="container head">
      <!---Top of the page-->

    <div class="row">
        <div  class="col-xs-12 hidden-sm col-md-3 col-lg-3 col-xl-3">
			<div class="col-xs-12">
            <a href="index.php" class="navbar-brand" >
				<img id="logo" class="img-responsive"  alt="This is the logo" src="http://teambinary.greenrivertech.net/images/logo-transparent.png" >
			</a>
			</div>
        </div>

      <div class="col-xs-12 col-sm-10 col-md-8 navbar center-block" >
          <!--Centers Nav On Headers-->

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navHeaderCollapse">Menu<span class="caret"></span></button>
            <div class="collapse navbar-collapse" id="navHeaderCollapse">
              <ul class="nav navbar-nav">
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center ">
						<p><a class="text-center col-xs-12 nav-fonts" href="index.php">
								<span class="text-center icon-in-nav fa fa-home fa-3x"></span>
								<br />Home</span>
						</a></p>
					</li>
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
						<p><a class="text-center col-xs-12 nav-fonts" href="contribute.php">
								<span class="text-center icon-in-nav fa fa-users fa-3x"></span>
								<br />Contribute
						</a></p>
					</li>
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
						<p><a class="text-center col-xs-12 nav-fonts" href="gethelp.php">
								<span class="text-center icon-in-nav fa fa-cutlery fa-3x"></span>
								<br />Get&nbsp;Help
						</a></p>
					</li>
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
						<p><a class="text-center col-xs-12 nav-fonts" href="calendar.php">
								<span class="text-center icon-in-nav fa fa-calendar fa-3x"></span>
								<br />Calendar
						</a></p>
					</li>
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
						<p><a class="text-center col-xs-12 nav-fonts" href="location.php">
								<span class="text-center icon-in-nav fa fa-map-marker fa-3x"></span>
								<br />Location</a></p>
						</li>
                  <li class="nav  col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
						<p><a class="text-center col-xs-12 nav-fonts" href="contactus.php">
								<span class="text-center icon-in-nav fa fa-phone-square fa-3x"></span>
								<br />Contact&nbsp;Us
						</a></p>
					</li>
              </ul>
            
          </div>
    </div>


    <div class="hidden-xs col-sm-2 col-md-1 ">

        <!--<span class="glyphicon glyphicon-credit-card"></span> Donate -->
        <!--Paypal Donate Button-->
        <div style="width: auto">
            <form action="https://www.paypal.com/cgi-bin/webscr (Links to an external site.)" method="post" target="_top">

            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="HPNP9YXHUXN4G">
            <input type="image"   class="img-responsive" src="http://teambinary.greenrivertech.net/images/paypaldonate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
             <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

            </form>
        </div>
    </div>

	</div>

    <div class="row">
      <div class="row col-md-12 col-sm-12"><hr class="col-md-12 col-sm-12 hidden-xs"></div>
    </div>
    <div class="row">
      <div id="motto" class="pull-right"><p>Serving low-income residents of the Kent School District</p></div>

</div>
</div>
      <!--Bottom of the page-->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <script>
      //This javascript manipulates the logo size.
        $(document).ready(function(){
          var windowWidth = $(document).width();
          var imageSize = windowWidth/4;

          if(windowWidth > 767){
            $("#logo").css("width", imageSize + "px");
        }else{
            $("#logo").css("width", "100%");
        }

        });

          $(window).resize(function(){
            var windowWidth = $(document).width();
            var imageSize = windowWidth/4;

            if(windowWidth > 767){
              $("#logo").css("width", imageSize + "px");
          }else{
              $("#logo").css("width", "100%");
          }

        });


      </script> 