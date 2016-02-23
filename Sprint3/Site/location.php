<!DOCTYPE html>
<html>
        <?php
            include('includes/header.inc.php');
        ?>
        
        <div class="main">
                <div class="container-fluid">
            <h1>Locations</h1>
            <div class="row">
                 <div class="col-xs-12 col-sm-3">
                 <!-- Orange Side Panel Style -->
                 <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title text-center" id="foodbankcard">Come Visit Us</h3>
                </div>
                <div class="panel-body"> 
                    <!-- Option #2 for Header 
                    <br><p id="hoursOperation">Location</p>-->
                    <div id='foodBank'>
                    <h3>Main Food Bank</h3>
                    <p>515 W Harrison St, Ste 107 <br>
                    Kent, Washington 98032</p>
                    
                    <h3>Clothing Bank</h3>
                    <p>515 W Harrison St, Ste 107 <br>
                    Kent, Washington 98032</p>
					<br />
					<!--<button >Show</button>-->
                    </div>
                    <div id='annex'>
                    <h3>Birch Creek Annex*</h3>
                    <p>12961 SE 275th Street<br>
                    <span class="asterisk">* Food Bank services only</span></p><br>
					<!--<button >Show</button>-->
                    </div>
                </div>
                </div> 
                 </div>
                <!-- Main Kent Food Bank Map -->
                <div class="col-sm-9 hidden-xs pull-right" id="foodBankMap" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.5137724658625!2d-122.24086688437721!3d47.382407679170406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905bfdbff8f409%3A0x4dd23f30dde84be0!2sKent+Food+Bank+%26+Emergency!5e0!3m2!1sen!2sus!4v1454306759479"
                             height="550" style="border:0"  width="100%" allowfullscreen></iframe>
                </div>
                <!-- Birch Creek Annex Map -->
                <div class="col-sm-9 hidden-xs pull-right" id="annexMap" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2702.880990107552!2d-122.17104518415661!3d47.35572141326787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905f26f729fdc7%3A0xf65a73c1ac91a69d!2sKent+Food+Bank!5e0!3m2!1sen!2sus!4v1455522788593"
                         height="550" style="border:0"  width="100%" allowfullscreen></iframe>
                
                </div>
                <div class="col-xs-12 visible-xs" >
                    <p>Get directions with <a href="https://goo.gl/maps/r75mDcuyd2J2">Google Maps</a>.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                <h3>Parking</h3>
                <p> Please park in legal designated parking spots to avoid tickets and towing!</p>
                <p> HomeStreet Bank and Key Bank are private lots. Parking in their lots could result in your vehicle being towed at your own expense. </p>
				
                </div>
            </div>
            </div>
        </div>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/jquery.min.js"></script>
       <script>
	  
			$("div#annexMap").hide();
			$("div#foodBankMap").show();
			$("#annex").click(function(){
                $("#foodBankMap").hide();
				$("#annexMap").show();
				
			});
			
			$("#foodBank").click(function(){
                $("#annexMap").hide();
				$("#foodBankMap").show();
				
			});
                // function mapDisplay(show, hide) {
                    // document.getElementById(hide).style.visibility = "hidden";
                    // document.getElementById(show).style.visibility = "show";
                // }
                
                // document.getElementById("foodbank").onclick=function(){
                        // alert("string")
                        // mapDisplay("foodBankMap", "annexMap");
                        
                // };
                
                 // document.getElementById("annex").onclick=function(){
                        // mapDisplay("annexMap", "foodBankMap");
                // };
                
                
        </script>
        <?php
            include('includes/footer.php');
        ?>