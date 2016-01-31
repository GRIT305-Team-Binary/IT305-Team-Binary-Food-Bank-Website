    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kent Food Bank & Emergency Services</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style type="text/css">
        .carousel{
            background: #2f4357;
            margin-top: 20px;
        }
        .carousel .item img{
            margin: 0 auto; /* Align slide image horizontally center */
        }
        .bs-example{
            margin: 20px;
        }

        .center-block{
          margin-bottom: 0;
        }
      
        .navbar{
          margin-bottom:0;
        }
      
        hr{
          margin: 0;
          padding: 0;
          height: 2px;
          background-color: black;
          border:none
        }
      
        #donateBtn{
          margin-top: 10px; ;
        }
        /* Extra Small Devices, Phones */
          @media only screen and (max-width : 767px) and (min-width : 0px) {
      
            hr{
              display: none;
            }
      
            #donateBtn {
              display: none;
            }
      
            #moto p {
              display: none;
            }
      
            .fa{
              display: none;
            }
      
          .navbar-toggle {
          position:static;
          float: none;
          padding:0 0 5px 0;
          margin: 0;
          background-color: gray ;
          background-image: none;
          border: 1px solid transparent;
          border-radius:2px;
          width: 100%;
          font-size: 1.5em;
          font-synthesis: weight;
      }
      
      .navbar-brand {
           float:none;
          height: 0;
          padding: 0;
          font-size: 0;
          line-height: 0;
      }
      
      nav li {
        font-size: 2em;
        text-align: center;
        border-bottom: 1px solid black;
        padding: 5px 0 5px 0;
      }
      
        #logo img {
          width: 100%;
        }
      
          }
      
      
        /* Small Devices, Tablets */
        @media only screen and (min-width : 768px) and (max-width : 991px) {
      
          #logo img{
            position: relative;
            max-width:12.5em;
            right: 25%;
            display: block;
      
          }
      
          .fa{
            display: block;
            text-align: center;
            padding-bottom: 15px;
            color: black;
            font-size: 2em;
          }
      
          #navEl{
            font-size: .95em;
            color: black;
          }
      
          #moto p{
            display: inline-block;
            text-align: left;
          }
      
      
      
        }
      
        /* Medium Devices, Desktops */
        @media only screen and (min-width : 992px) and (max-width : 1199px) {
          .fa{
            display: block;
            text-align: center;
            padding-bottom: 15px;
            color: black;
          }
      
        #logo img{
          position: relative;
          max-width:250px;
          display: block;
          right:12%;
      
        }
      
      
          #navEl{
            font-size: 1.2em;
            color: black;
          }
      
      
      
          #moto p{
            display: inline-block;
            text-align: left;
          }
      
          nav{
            padding-bottom: 0;
          }
        }
      
        /* Large Devices, Wide Screens */
           @media only screen and (min-width : 1200px) {
             .fa{
               display: block;
               text-align: center;
               padding-bottom: 15px;
               color: black;
               font-size: 3em;
             }
      
             #navEl{
               font-size: 1.5em;
               color: black;
             }
      
             #logo img{
               max-width:300px;
               position: relative;
               display: block;
               right:12%;
      
             }
      
             nav{
               padding-bottom: 0;
             }
           }
      
        </style>

    <div class="container">
      <!---Top of the page-->


      <div id="logo" class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <a href="#" class="navbar-brand"><img alt="This is the logo" src="../images/logo.png"></a>
      </div>

      <nav class="col-lg-8 col-md-8 col-sm-9 col-sx-12 navbar center-block">
          <div class="container"><!--Centers Nav On Headers-->

            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" >Menu<span class="caret"></span></button>
            <div class="collapse navbar-collapse navHeaderCollapse">
              <ul class="nav navbar-nav">
                  <li class="nav"><a href="#"><i class="fa fa-home fa-3x"></i><span id="navEl">Home</span></a></li>
                  <li class="nav"><a href="#"><i class="fa fa-users fa-3x"></i><span id="navEl">Contribute</span></a></li>
                  <li class="nav"><a href="#"><i class="fa fa-cutlery fa-3x"></i><span id="navEl">Get Help</span></a></li>
                  <li class="nav"><a href="#"><i class="fa fa-calendar fa-3x"></i><span id="navEl">Calendar</span></a></li>
                  <li class="nav"><a href="#"><i class="fa fa-map-marker fa-3x"></i><span id="navEl">Location</span></a></li>
                  <li class="nav"><a href="#"><i class="fa fa-phone-square fa-3x"></i><span id="navEl">Contact Us</span></a></li>
              </ul>
            </div>
        </div>
      </nav>

      <a href="#" id="donateBtn" class="btn btn-md btn-default col-lg-1 col-md-1 hidden-sm"><span class="glyphicon glyphicon-credit-card"></span> Donate</a>
      <div><hr class="col-md-12 col-sm-12 hidden-xs"></div>

      <div id="moto" class="col-md-5 col-md-offset-7 col-sm-7 col-sm-offset-5"><p>Serving low-income residents of the Kent School District</p></div>


      <!--Bottom of the page-->
    </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

      </script>
  </body>
</html>
