<!DOCTYPE html>

<html lang="en">

<?php  include ('includes/header.inc.php');  ?>


	 <div class="main" id="top">
    <div class="container-fluid">
        <h1>Get Help</h1>
		
		
     <!-- Side navigation -->
 <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
            <div class="btn-group-vertical col-xs-12">
				 <!-- Contact Us Button on mobile site -->
                <a href="contactus.php" class="btn btn-warning visible-xs">Contact Us</a>
				 <!-- Services We Provide header displays on larger screens -->
                <a href="#services" class="btn btn-warning ">Our Services</a>
				
                <a href="#clothingbank" class="btn btn-default">Clothing Bank</a>
                <a href="#foodbankcard" class="btn btn-default">Food Bank Card</a>
				<div class="btn btn-warning">Other Support</div>
				<!--Community Services that might be helpful to clients of Food Bank -->
				<a href="https://www.uwkc.org/need-help/" class="btn btn-default" target="_blank">United Way</a>
				<a href="https://www.kcls.org/esl/" class="btn btn-default" target="_blank">ESL</a>
				<a href="http://crisisclinic.org/education/2-1-1-community-resources/" class="btn btn-default" target="_blank">2-1-1</a>
				<a href="https://www.dshs.wa.gov/esa/community-services-offices/community-services-office" class="btn btn-default" target="_blank">D S H S</a><br>
            
            </div>
			<p>&nbsp;</p>
			<!--<div class="col-xs-12">
			<h3>Hours of Service</h3>	-->
			<div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title text-center" id="hours">Hours of Operation</h3>
                </div>
                <div class="panel-body">
			<!-- List of Hours -->
			<?php  include ('includes/hours.php');  ?>
			</div>
			</div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9" >
            <!-- Main Content -->
            <div class="col-lg-7 ">
				<h3>Main Location</h3>
				<a href="location.php"><img class="img-responsive buildingImg" src="images/building.JPG" alt="Main Location"></a>
            <!-- List of main services available from Kent Food Bank -->
            <h3 id="services">Services We Provide</h3>
            <ul>
                <li>Food and clothing to low-income residents of the Kent School District, comprised of ZIP codes 98030 and 98031, and parts of 98032, 98042 and 98058.</li>
                <li>Each household may have two visits to the Food Bank per month</li>
                <li>Remember to bring your own bags or boxes to carry your food</li>
            </ul>
			
			
            <!-- Link to top of Page -->
			<!-- <div class="row"><div class="col-xs-6 col-xs-offset-6 visible-xs">
			<p><span class="top-link-block right">
				<a href="#top" class="well well-sm" >
					<i class="glyphicon glyphicon-chevron-up"></i> Back to Top
				</a>
				</span>
				</div>
			</div>
				 /top-link-block-->
			
			
			
			
             <!-- Information about the Clothing Bank-->
            
            <h3 id="clothingbank">Clothing Bank</h3>
			<ul>
            <li>10 item limit per person in family </li>
            <li>Diapers available once every 6 months if available</li>
			</ul><br>
			<p><img src="images/clothingbank.png" class="img-repsonsive buildingImg" alt="Clothing Bank"></p>
			
			<h3>Birch Creek Annex</h3>
				<ul>
					<li>Only perishable and refrigerated food available </li>
					<li>Alternative to visiting Main Location</li>
				</ul>
				<p>For more information see <a href="location.php">Locations</a></p>
				<a href="location.php"><img class="img-responsive buildingImg" src="images/annex.png" alt="Birch Creek Annex"></a>
				<p>&nbsp;</p>
            </div>
			
			
            <div class="col-lg-5 pull-left" >
            <!-- Items client needs to bring into food bank to obtain a food card -->
            <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title text-center" id="foodbankcard">How to Obtain a Food Bank Card</h3>
                </div>
                <div class="panel-body">
                
            <h3>Obtain Eligibility</h3> 
            <h4>Bring:</h4>
            <ul>
                <li>Picture identification</li>
                <li>Current proof of address  (if available)</li>
            </ul>
            <p>to <a href="https://goo.gl/maps/r75mDcuyd2J2">Kent Food Bank</a> during <a href="calendar.php">open hours</a>
            to obtain your Food Bank Card.</p><br />
            <h5>If registering a household, you need the following for each member of the household: </h5>
            
            <h4>For each adult: </h4>
            <p>Current mail, lease, or bill not older than 30 days</p>
 
            <h4>For each school-aged child:  </h4>
            <p>Current piece of mail or proof of enrollment in Kent School District</p>
 
            <h4>For younger children:  </h4>
            <p>Birth Certificate</p>
              
                </div>
              </div>
			<!-- Link to top of Page 
			<div class="row"><div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 visbile-sm visible-xs visible-md">
			<p><span class="top-link-block right">
				<a href="#top" class="well well-sm" >
					<i class="glyphicon glyphicon-chevron-up"></i> Back to Top
				</a>
				</span>
				</div>
			</div> /top-link-block -->
            </div>
        </div>
    </div>
    </div>
    </div>
    
 <?php  include ('includes/footer.php');  ?>