 <!-- Footer -->
 <div class="footer">

        <footer>

              <div class="row text-center ">
              		<!-- Location -->
                     <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="btn-lg btn-warning col-xs-12">

                            <p class="footerBtn"><a class="defaultLink foot-btn" href="location.php"  >
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    Location
                            </a></p>
					</div>

                </div>
					 <div class="visible-xs">
					 <p>&nbsp;</p>

					</div>
                 <!-- Phone Number -->
				 <div class="col-sm-4 col-md-4 col-lg-4 hidden-xs">
					 <h3 class="footerTitle">Kent Food Bank</h3>
					 <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (253) 520-3550<br>
                    515 W Harrison St, Ste 107 <br />
                    Kent, Washington 98032</p>
                </div>
                <div class="col-xs-12 visible-xs">
                    <div class="btn-lg btn-warning col-xs-12">
							<!-- Phone -->
							<p class="footerBtn"><a class="defaultLink foot-btn" href="tel:1-253-520-3550"  ><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (253) 520-3550</a></p>
					</div>
                </div>

				<div class="visible-xs">
					 <p>&nbsp;</p>

					</div>
                 <!-- Contact -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="btn-lg btn-warning col-xs-12">
							<!-- Phone -->
							<p class="footerBtn"><a class="defaultLink foot-btn" href="contactus.php" >
                                   <span  class="glyphicon glyphicon-phone" aria-hidden="true"></span> Contact Us
                            </a></p>
					</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right asterisk">
                    <p>Copyright &copy; 2016 Kent Food Bank. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
 </div>

	<!--Bottom of the page-->

	<!-- jQuery -->
    <script async src="js/jquery.js"></script>
	<script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script async src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      var windowWidth = $(document).width();
      var imageSize = windowWidth/4;

      if(windowWidth > 767){
        $('#logo').width(imageSize);
    }else{
        $('#logo').width('100%');
    }

    });


        $(window).resize(function(){
            var windowWidth = $(document).width();
            var imageSize = windowWidth/3.5;

            if(windowWidth > 767){
              $('#logo').width(imageSize);
          }else{
              $('#logo').width('100%');
          }
     });

    </script>





</body>

</html>
