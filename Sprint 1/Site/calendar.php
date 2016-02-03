<!DOCTYPE html>
<html>
       <!-- Calendar and Hours Page  -->
   
        <?php
            include('includes/header.inc.php');
        ?>
        <div class="main">
            <h1>Calendar & Hours</h1>
            <div class="row">
                 <div class="col-xs-12 col-sm-3">
                 <!-- Orange Side Panel Style
                 <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title text-center" id="foodbankcard">Hours of Operation</h3>
                </div>
                <div class="panel-body"> -->
                    <!-- Option #2 for Header -->
                    <br><div class="title"><h4>Hours of Operation</h4></div>
                    
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
                <!-- </div>
                </div> -->
                 </div>
            
                <div class="col-sm-9 hidden-xs pull-right">
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23f0ad4e&amp;src=teambinarykfb%40gmail.com&amp;color=%23BE6D00&amp;ctz=America%2FLos_Angeles"
                            style="border-width:0" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>
                </div>
                
                <div class="col-xs-12 visible-xs">
                    <p>Click <a href="https://calendar.google.com/calendar/embed?src=teambinarykfb%40gmail.com&ctz=America/Los_Angeles"
                    target="_blank">here</a> to view our calendar of events.</p>
                </div>
            </div>
        </div>
       <!-- Calendar and Hours Page  -->
   
        <?php
            include('includes/footer.php');
        ?>