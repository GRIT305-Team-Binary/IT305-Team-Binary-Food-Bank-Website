<!DOCTYPE html>
<html>
       <!-- Calendar and Hours Page  -->
   
        <?php
            include('includes/header.inc.php');
        ?>
     <div class="container-fluid">
        <div class="main">
            <h1>Calendar & Hours</h1>
            <div class="row">
                  <div class="col-xs-12 col-md-3">
                 <!-- Orange Side Panel Style-->
				 <ul class="nav nav-pills">
				  <li id="hours" class="active"><button class="btn-sm btn-warning toggleBtn">Hours</button>&nbsp;&nbsp;&nbsp;</li>
				  <li id="events"><button class="btn-sm btn-warning toggleBtn">Events</button></li>
				</ul>
                 <div class="panel panel-warning">
                <div class="panel-heading">
					<div id="hours-title"><h3 class="panel-title text-center" >Hours of Operation</h3></div>
					<div id="events-title"><h3 class="panel-title text-center" >Annual Events</h3></div>
                </div>
                <div class="panel-body"> 
                   
                    <div id="hours-body">
                    <!-- List of Hours -->
                    <?php  include ('includes/hours.php');  ?>
					</div>
					<div id="event-body">
                    <!-- List of Annual Events -->
                    
					<p><span class="dayOfWeek">February</span> - Annual Meeting</p>

					<p><span class="dayOfWeek">March</span> - Scouting For Food Drive</p>

					<p><span class="dayOfWeek">May</span> - USPS - Stamp Out Hunger Food Drive</p>

					<p><span class="dayOfWeek">October</span> - Fundraising Breakfast (link to sponsorship form)</p>

					<p><span class="dayOfWeek">Oct./Nov./December</span> - Kent School District High School Food Drive</p>

					<p><span class="dayOfWeek">November</span> - Torklift Food Drive</p>

					<p><span class="dayOfWeek">December</span> - Christmas Food and Toys for Joy distributions</p>
					</div>
                   
                 </div>
                </div> 
                 </div>
            
                <!-- calendar on med/large screen sizes -->
                <div class="col-xs-12 col-md-9 ">
					<div class="embed-responsive embed-responsive-16by9">


                    <iframe class="embed-responsive-item"  src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23FF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
                           scrolling="no"></iframe>
					</div>
				</div>
                
                
                
            </div>
        </div>
     </div>
       <!-- Calendar and Hours Page  -->
   
        <?php
            include('includes/footer.php');
        ?>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/jquery.min.js"></script>
		<script>
	  
			$("div#events-title").hide();
			$("div#events-body").hide();
			$("div#hours-title").show();
			$("div#hours-body").show();
			
			
            $("li#events").click(function(){
				
            	$("div#hours-title").hide();
				$("div#hours-body").hide();
				$("div#events-title").show();
				$("div#event-body").show();
                $("li#hours").removeClass("active");
				 $("li#events").addClass("active");
				
			});
			
			$("li#hours").click(function(){
				
			    $("div#events-title").hide();
				$("div#event-body").hide();
				$("div#hours-title").show();
				$("div#hours-body").show();
                $("li#events").removeClass("active");
				$("li#hours").addClass("active");				
			});
        </script>