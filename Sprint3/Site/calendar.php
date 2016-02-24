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
                  <div class="col-xs-12 col-sm-3">
                 <!-- Orange Side Panel Style-->
				 <ul class="nav nav-tabs">
				  <li id="hours" class="active"><a href="">Hours</a></li>
				  <li id="events"><a href="">Events</a></li>
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
                    
					</div>
                   
                 </div>
                </div> 
                 </div>
            
                <!-- calendar on med/large screen sizes -->
                <div class="col-med-9 hidden-xs hidden-sm">
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23FF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
                            style="border-width:0" width="73%" height="600px" frameborder="0" scrolling="no"></iframe>
                </div>
                
                <!-- calendar on small screen size -->
                <div class="col-sm-9 visible-sm">
                    <iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
                            style="border-width:0" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>
                </div>
                
                <!-- calendar on mobile/xs screen size -->
                <div class="col-xs-12 visible-xs">
                    <iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
                             width="600"  scrolling="yes"></iframe>
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
			
			//When click on hours should hide, and events should display
            $("li#events").click(function(){
				
            	$("div#hours-title").hide();
				$("div#hours-body").hide();
				$("div#events-title").show();
				$("div#event-body").show();
                $("li#hours").removeClass("active");
				$("li#events").addClass("active");
				
			});
			
			//When click on events should hide, and hours should display
			$("li#hours").click(function(){
				
			    $("div#events-title").hide();
				$("div#event-body").hide();
				$("div#hours-title").show();
				$("div#hours-body").show();
                $("li#events").removeClass("active");
				$("li#hours").addClass("active");				
			});
        </script>