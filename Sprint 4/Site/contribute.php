<?php
	/* Contribute - Dontate
	 * Kent Food Bank 
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/contribute.php
	 */
?>
<!DOCTYPE html>

<html lang="en">

<?php  include ('includes/header.inc.php');  ?>


<div class="main" id="#top">
    <div class="container-fluid">
		<h1>Contribute</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 " role="group">
				<!-- Side Bar with links to ways to give -->
				 <?php  include ('includes/contribute-side.php');  ?>
			</div>
			<div class="topItemsList col-xs-12 col-sm-3 col-md-3 col-lg-3 pull-right">
				<!-- List of top ten items needed -->
				<?php  include ('includes/top-items-needed.php');  ?>
				<p class="text-center"><a href="includes/top-items-needed.php"><span class="glyphicon glyphicon-print"></span>  Print</a></p>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 pull-left">
				<!-- Details about what Kent Food Bank does -->
				<p>Each year Kent Food Bank distributes approximately 6,000 lbs of food.  We are a non-profit organization that runs on volunteer support with funding from grants, individual donors, and some money from the city of Kent.</p>
				<p>Every contribution makes a difference. </p>
				<p class="text-center hidden-xs"><a href="https://www.paypal.com/us/webapps/mpp/search-cause?charityId=75871&amp;s=3" class="btn btn-warning">Donate Today</a></p>
	
				<!-- How you can help the Food Bank -->
				<h2> Non-Perishable Food</h2>
				<p>Kent Food Bank accepts nonperishable food donations on T, W, Th and F from 9 am – 2 pm at</p>
				<p class="text-center   "><a href="location.php" class="btn btn-warning text-center">515 W. Harrison Street, Suite 107</a></p>
				<p> Items must not be expired, damaged, or opened. During the summer call if you would like to donate vegetables or other items from your garden. </p>
				
				<!-- How you can help the Clothing Bank-->
				<h2 id="clothing">Clothing Bank</h2>
				<p>Clothing Bank accepts donations on T, W, Th and F from 9 am – 2 pm of gently used men’s, women’s, children’s clothing along with small household items at</p>
				<p class="text-center  hidden-xs hidden-sm "><a href="location.php" class="btn btn-warning text-center">515 W. Harrison Street, Suite 107</a></p>
				<!-- Button for Mobile display-->
				<p class="text-center  visible-xs visible-sm"><a href="location.php" class="btn btn-warning text-center">Kent Food Bank</a></p><p></p>
				<hr>
				
				<!-- Other ways to give to include Amazon Smile and Fred Meyer Rewards-->
				<h2 id="otherGift">Other ways to give:</h2>
				
				<!--  Amazon Smile -->
				<h3>Amazon Smile</h3>
				<p><a href="http://smile.amazon.com"><img src="images/AmazonSmile-logo.png" alt="Amazon Smile" class="img-responsive"></a></p>
				<p>Amazon donates 0.5% of the price of your eligible AmazonSmile purchases to the charitable organization of your choice. </p>
				<p>AmazonSmile is the same Amazon you know. Same products, same prices, same service.</p>
				<p>Support your charitable organization by starting your shopping at</p>
				<p class="text-center"><a href="http://smile.amazon.com" class="btn btn-warning">smile.amazon.com</a></p>
				<hr>
				
				<!-- Fred Meyer Rewards -->
				<h3>Fred Meyer Community Rewards</h3>
				<p><a href="http://www.fredmeyer.com/communityrewards"><img src="images/fred-meyer-logo.png" alt="Fred Meyer Rewards" class="img-responsive"></a></p>
				<P>Sign up for the Community Rewards program by linking your Fred Meyer Rewards Card to Kent Food Bank at:
				<p class="text-center hidden-xs "><a href="http://www.fredmeyer.com/communityrewards" class="btn btn-warning">FredMeyer.com/communityrewards</a></p>
				<!-- Button for Mobile display-->
				<p class="text-center visible-xs"><a href="http://www.fredmeyer.com/communityrewards" class="btn btn-warning">Fred Meyer Rewards</a></p>
				<p class="text-center bold"><strong>You can search for us by name, Kent Food Bank or by our NPO # 83698</strong></p>
			</div>
		</div>
	</div>
</div>

 <?php  include ('includes/footer.php');  ?>
