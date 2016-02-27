<?php
	/* Calendar with Hours and Events
	 * Kent Food Bank 
	 * Jami, Nicole Team Binary
	 * http://teambinary.greenrivertech.net/caldendar.php
	 */
?>
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
							<div  id="accordion">
								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#February">February – Annual Meeting</a>
												 </h4>
											</div>
											<div id="February" class="panel-collapse collapse">
												<div class="panel-body">
													<p>A meeting open to the public to approve the annual operating budget.  The previous year’s successes and challenges are discussed.</p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#March">March – Scouting For Food Drive</a>
												 </h4>
											</div>
											<div id="March" class="panel-collapse collapse">
												<div class="panel-body">
													<p>Scouts go out on one weekend (in March), place hangers on the doors of their neighbors, and come back later (usually the next week) to pick up the food and take it to the Kent Food Bank. </p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#May">May – NALC Stamp Out Hunger National Food Drive</a>
												 </h4>
											</div>
											<div id="May" class="panel-collapse collapse">
												<div class="panel-body">
													<p>Every second Saturday in May, letter carriers in more than 10,000 cities and towns across America collect the goodness and compassion of their postal customers, who participate in the NALC Stamp Out Hunger National Food Drive — the largest one-day food drive in the nation</p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#Summer">Summer – Volunteer Picnic</a>
												 </h4>
											</div>
											<div id="Summer" class="panel-collapse collapse">
												<div class="panel-body">
													<p>To show our appreciation for all the hard work and dedication our volunteers have given, we hold a picnic in their honor.</p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#October">October – Fundraising Breakfast</a>
												 </h4>
											</div>
											<div id="October" class="panel-collapse collapse">
												<div class="panel-body">
													<p>The fundraising breakfast is Kent Food Bank’s largest fundraiser of the year.  40 tables of 8 enjoy a program, breakfast, entertainment, and a raffle. If interested in donating a raffle item, sponsoring the event or attending, please contact kentfoodbank@gmail.com anytime throughout the year.</p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#November">November – Torklift Central Turkey Drive</a>
												 </h4>
											</div>
											<div id="November" class="panel-collapse collapse">
												<div class="panel-body">
													<p>In 2011, the Kent Food Bank lost the majority of their funding for the holiday season, leaving many households scrambling to find ways to feed their families. This deeply impacted the community and Torklift Central responded by organizing the 1st Annual Kent Turkey Challenge. Since then, donations to the Kent Food Bank from the Annual Kent Turkey Challenge total thousands of dollars for turkey purchase and thousands of pounds of non - perishable food, feeding thousands of families that would otherwise go without a Thanksgiving meal.</p>
												</div>
											</div>
										</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#December">December – Holiday Food and Toy distribution</a>
										 </h4>
									</div>
									<div id="December" class="panel-collapse collapse">
										<div class="panel-body">
											<p>Kent Food Bank distributes self select holiday food boxes in addition to the regular December distributions.  Kent Food Bank partners with the Toys for Joy program and distributes toys to children 12 and under.</p>
										</div>
									</div>
								</div> 					
							</div>
						</div><!-- end of event body -->
					</div> <!-- end of panel body -->
				 </div><!-- end of panel -->
			</div><!-- end of Side panel -->
				
			<div class="col-xs-12 col-md-9 hidden-sm ">
				<div class="embed-responsive embed-responsive-16by9">
					<!-- calendar on med/large screen sizes -->
					<iframe class="embed-responsive-item"  src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23FF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
					   scrolling="no"></iframe>
				</div><!-- end of map for med/large screens -->
				
                 <div class="col-sm-9 visible-sm">
				 <!-- calendar on small screen size -->
                    <iframe class="embed-responsive-item" src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FF9600&amp;src=teambinarykfb%40gmail.com&amp;color=%23000000&amp;ctz=America%2FLos_Angeles"
                            scrolling="no"></iframe>
				</div><!-- end of map for small screens -->
			</div><!-- end of Space for Map -->
		</div><!-- end of row -->
	</div><!-- end of main -->
</div><!-- end of container-fluid -->

      
   
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