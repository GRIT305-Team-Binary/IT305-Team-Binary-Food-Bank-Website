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
                 <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title text-center" id="foodbankcard">Hours of Operation</h3>
                </div>
                <div class="panel-body"> 
                    <!-- Option #2 for Header -->
                   <!-- <br><h4 class="title">Hours of Operation</h4>-->
                    
                    <h3>Food Bank</h3>
                    <p><span class="dayOfWeek">Tuesday, Wednesday, Friday</span><br>
                    10am - 1pm</p>
                    <p><span class="dayOfWeek">Second Wednesday of each month</span><br>
                    5pm - 6pm<br><br></p>
                    <h3>Clothing Bank</h3>
                    <p><span class="dayOfWeek">Tuesday, Wednesday, Friday</span><br>
                    10am - 12:30pm<br><br></p>
                    <h3>Birch Creek Annex*</h3>
                    <p><span class="dayOfWeek">Monday</span><br>
                    10am - 1pm<br>
                    <span class="asterisk">* Food Bank services only</span></p><br>
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