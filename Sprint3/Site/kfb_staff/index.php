<?php
	/* Kent Food Bank Staff
	 * Jami Team Binary
	 * http://teambinary.greenrivertech.net/kfb_staff/index.php
	 */
?>
	
		
<?php
	include('nav.php');
?>
			
<div class="container-fluid">	
		
	<div class="main">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 ">
				<!-- Kent Food Bank Staff  -->
				<h1 class="text-center">This page is for the Kent Food Bank Staff</h1 >
				<p class="text-center">Update <a href="update_top_ten_items.php">Top Ten Items Needed</a></p>
				<p class="text-center"><a href="volunteers.php">Volunteer Applicants</a></p>
				<p class="text-center"><a href="sponsors.php">Breakfast Sponsors</a></p>
				
				<div id="embed-api-auth-container"></div>
				<div id="chart-container"></div>
				<div id="view-selector-container"></div>
				<script>
					(function(w,d,s,g,js,fs){
					  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
					  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
					  js.src='https://apis.google.com/js/platform.js';
					  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
					}(window,document,'script'));

					!function(t){function i(s){if(e[s])return e[s].exports;var n=e[s]={exports:{},id:s,loaded:!1};return t[s].call(n.exports,n,n.exports,i),n.loaded=!0,n.exports}var e={};return i.m=t,i.c=e,i.p="",i(0)}
					([function(t,i){"use strict";gapi.analytics.ready(function(){gapi.analytics.createComponent("ActiveUsers",{initialize:function(){this.activeUsers=0,gapi.analytics.auth.once("signOut",this.handleSignOut_.bind(this))},execute:function(){this.polling_&&this.stop(),this.render_(),gapi.analytics.auth.isAuthorized()?this.pollActiveUsers_():gapi.analytics.auth.once("signIn",this.pollActiveUsers_.bind(this))},stop:function(){clearTimeout(this.timeout_),this.polling_=!1,this.emit("stop",{activeUsers:this.activeUsers})},render_:function(){var t=this.get();this.container="string"==typeof t.container?document.getElementById(t.container):t.container,this.container.innerHTML=t.template||this.template,this.container.querySelector("b").innerHTML=this.activeUsers},pollActiveUsers_:function(){var t=this.get(),i=1e3*(t.pollingInterval||5);if(isNaN(i)||5e3>i)throw new Error("Frequency must be 5 seconds or more.");this.polling_=!0,gapi.client.analytics.data.realtime.get({ids:t.ids,metrics:"rt:activeUsers"}).then(function(t){var e=t.result,s=e.totalResults?+e.rows[0][0]:0,n=this.activeUsers;this.emit("success",{activeUsers:this.activeUsers}),s!=n&&(this.activeUsers=s,this.onChange_(s-n)),1==this.polling_&&(this.timeout_=setTimeout(this.pollActiveUsers_.bind(this),i))}.bind(this))},onChange_:function(t){var i=this.container.querySelector("b");i&&(i.innerHTML=this.activeUsers),this.emit("change",{activeUsers:this.activeUsers,delta:t}),t>0?this.emit("increase",{activeUsers:this.activeUsers,delta:t}):this.emit("decrease",{activeUsers:this.activeUsers,delta:t})},handleSignOut_:function(){this.stop(),gapi.analytics.auth.once("signIn",this.handleSignIn_.bind(this))},handleSignIn_:function(){this.pollActiveUsers_(),gapi.analytics.auth.once("signOut",this.handleSignOut_.bind(this))},template:'<div class="ActiveUsers">Active Users: <b class="ActiveUsers-value"></b></div>'})})}]);
					//# sourceMappingURL=active-users.js.map
				

					gapi.analytics.ready(function() {
					
					  /**
					   * Authorize the user immediately if the user has already granted access.
					   * If no access has been created, render an authorize button inside the
					   * element with the ID "embed-api-auth-container".
					   */
					  gapi.analytics.auth.authorize({
						container: 'embed-api-auth-container',
						clientid: ''
					  });
					
					
					  /**
					   * Create a new ViewSelector instance to be rendered inside of an
					   * element with the id "view-selector-container".
					   */
					  var viewSelector = new gapi.analytics.ViewSelector({
						container: 'view-selector-container'
					  });
					
					  // Render the view selector to the page.
					  viewSelector.execute();
					
					
					  /**
					   * Create a new DataChart instance with the given query parameters
					   * and Google chart options. It will be rendered inside an element
					   * with the id "chart-container".
					   */
					  var dataChart = new gapi.analytics.googleCharts.DataChart({
						query: {
						  metrics: 'ga:sessions',
						  dimensions: 'ga:date',
						  'start-date': '30daysAgo',
						  'end-date': 'yesterday'
						},
						chart: {
						  container: 'chart-container',
						  type: 'LINE',
						  options: {
							width: '100%'
						  }
						}
					  });
					
					
					  /**
					   * Render the dataChart on the page whenever a new view is selected.
					   */
					  viewSelector.on('change', function(ids) {
						dataChart.set({query: {ids: ids}}).execute();
					  });
					
					});

				</script>
			</div>
		</div>
	</div>
</div>
            
</body>
</html>
        
