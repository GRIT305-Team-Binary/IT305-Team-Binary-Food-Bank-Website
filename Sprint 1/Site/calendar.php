<!DOCTYPE html>
<html>
    <head>
        <!-- Calendar and Hours Page  -->
        <link href="startbootstrap-small-business-1.0.4/css/bootstrap.min.css" type="stylesheet" />
        <title>Calendar</title>
    </head>
    <body>
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
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23ffcc66&amp;src=teambinarykfb%40gmail.com&amp;color=%231B887A&amp;ctz=America%2FLos_Angeles"
                            style="border-width:0" width="100%" height="500px" frameborder="0" scrolling="no"></iframe>
                </div>
                
                <div class="col-xs-12 visible-xs">
                    <p>Click <a href="https://calendar.google.com/calendar/embed?src=teambinarykfb%40gmail.com&ctz=America/Los_Angeles">here</a>
                    to view our calendar of events.</p>
                </div>
            </div>
        </div>
    </body>
</html>