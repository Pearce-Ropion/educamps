<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Home</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy8tUPNm20l3yhkHArzuojsA1_f-I_iQI&callback=initMap" type="text/javascript"></script>
		<script type="text/javascript" src="shopscroll.js"></script>
		<script type="text/javascript" src="/projects/coen161/assets/scripts/ajax.js"></script>
		<script type="text/javascript">
			function initMap() {
				var locations = [
      			['New York University', 40.7300009, -73.9879543, 1],
     				['University of Southern California', 34.0223519, -118.2873057, 2],
     				['Stanford University', 37.4274745, -122.1719077, 3],
     				['Northwestern University', 42.0564594, -87.7268329, 4],
     				['Camp Philmont', 34.1300527, -107.6683804, 5],
     				['Sea Base', 25.3169402, -80.7378858, 6],
     				['Massachusetts Institute of Technology', 42.360091, -71.0963487, 7],
     				['Medicine Mountain', 44.2504641, -102.4711006, 8],
     				['Smithsonian', 38.8993277, -77.0846064, 9]
    			];
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 4,
					center: new google.maps.LatLng(37.9516623,-98.8466723),
    				mapTypeId: 'roadmap'
				});
				var infowindow = new google.maps.InfoWindow();
				var marker, x;
				for (x = 0; x < locations.length; x++) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(locations[x][1], locations[x][2]),
						map: map
					});
					google.maps.event.addListener(marker, 'click', (function(marker, x) {
        				return function() {
         					infowindow.setContent(locations[x][0]);
          					infowindow.open(map, marker);
        				}
      				})(marker, x));
				}
			}
		</script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<figure id="home-gallery" style="background-image: url(/projects/coen161/assets/images/home.jpg);">
				<a href="/projects/coen161/register/" class="home-overlay">Sign Up Now
					<p>Prices start at $1100 a week</p>
				</a>
			</figure>
			<div id="content">
				<div class="container">
					<h2 class="section-header">Our Philosophy</h2>
					<p class="quote">
						This summer, explore a top campus, make friends as you master new survival and tech skills, and join a growing community of outdoors, robotics, and computer enthusiasts.
						At EDU Campus, our mission is to empower the next generation of coders, designers, engineers, and innovators. Whether you're attending for your first session or come back repeatedly, your tech pathway starts here.
					</p>
				</div>
				<div class="spacer"></div>
				<div class="container">
					<h2 class="section-header">Our Camp Availablility</h2>
					<?php
					$dates = array('June 18 - July 1', 'July 2 - July 15', 'July 16 - July 29', 'June 30 - Aug 12', 'Dec 24 - Dec 30', 'Dec 31 - Jan 6');
					$locations = array('NYU', 'USC', 'Northwestern', 'Stanford', 'Philmont', 'Miami', 'MIT', 'Medicine Mountain', 'Smithsonian');
					$dblocations = array('nyu', 'usc', 'nw', 'stanford', 'philmont', 'miami', 'mit', 'medicine', 'washdc');
					$campdata = array();
					$currYear = date('Y');
					$query = "SELECT * FROM camp_info WHERE (location='nyu') AND (year='$currYear')";
					$result = mysqli_query($sql, $query);
					while ($row = mysqli_fetch_array($result)) {
						for ($x = 3; $x < 11; $x++) {
							array_push($campdata, $row[$x]);
						}
					}
					echo '<span class="home-selectTitle">Select a Location for Availablility and Prices</span><br>';
					echo '<select id="cal-loc" name="cal-loc" class="cal-loc">';
					for ($z = 0; $z < count($locations) + 1; $z++) {
						if ($z == 0) {
							echo '<option value="'.$z.'">Select Location</option>';
						} else {
							echo '<option value="'.$z.'">'.$locations[$z - 1].'</option>';
						}
					}
					echo '</select>';
					echo '<div id="box-container1">';
						for ($x = 0; $x < 4; $x++) {
							echo '<div class="ribbon-box">';
							echo '<span class="cal-session" id="cal-session">Summer Session '.($x + 1).'</span>';
							echo '<div class="ribbon"><span id="cal-priceTag'.($x + 1).'" class="cal-price">$'.$campdata[0].'</span></div>';
							echo '<span class="cal-date" id="call-date">'.$dates[$x].'</span>';
									if ($campdata[$x+2] < 0) {
										$avail = 'Registration Closed';
										$register = 'Closed';
										$class = 'cal-not-availText';
									} else {
										$avail = 'Still Available';
										$register = 'Register Now';
										$class = 'cal-availText';
									}
							echo '<span id="cal-avail'.($x + 1).'" class="cal-availability cal-availText">'.$avail.'</span>';
							echo '<a id="cal-btn'.($x + 1).'" class="cal-btn" href="/projects/coen161/register/">'.$register.'</a>';
							echo '</div>';
						}
						echo '</div>';
						echo '<div id="box-container2">';
						for ($x = 0; $x < 2; $x++) {
							echo '<div class="ribbon-box">';
							echo '<span class="cal-session" id="cal-session">Winter Session '.($x + 1).'</span>';
							echo '<div class="ribbon"><span  id="cal-priceTag'.($x + 5).'" class="cal-price">$'.$campdata[1].'</span></div>';	
							echo '<span class="cal-date" id="call-date">'.$dates[($x + 4)].'</span>';
									if ($campdata[$x+2] < 0) {
										$avail = 'Registration Closed';
										$register = 'Closed';
										$class = 'cal-not-availText';
									} else {
										$avail = 'Still Available';
										$register = 'Register Now';
										$class = 'cal-availText';
									}
							echo '<span id="cal-avail'.($x + 5).'" class="cal-availability cal-availText">'.$avail.'</span>';
							echo '<a id="cal-btn'.($x + 5).'" class="cal-btn" href="/projects/coen161/register/">'.$register.'</a>';
							echo '</div>';
						}
					echo '</div>';
					?>
				</div>
				<div class="spacer"></div>
				<div class="container">
					<h2 class="section-header">Our Activities</h2>
					<div class="home-activity">
						<div class="home-activity-left">
							<figcaption>Learn the computer languages of the 21st century through our interactive computer programming camps and programs</figcaption>
							<figure style="background-image: url(/projects/coen161/assets/images/activity1.jpg)"></figure>
						</div>
						<div class="home-activity-right">
							<figcaption>Build a robot to do your chores. Learn how to build your robot, create programs to run it and then bring it home to work for you</figcaption>
							<figure style="background-image: url(/projects/coen161/assets/images/activity2.jpg)"></figure>
						</div>
						<div style="height: 40px; clear: both;"></div>
						<div class="home-activity-left">
							<figcaption>Get going with the other campers through exciting team building exercises on the high ropes course</figcaption>
							<figure style="background-image: url(/projects/coen161/assets/images/activity3.jpg)"></figure>
						</div>
						<div class="home-activity-right">
							<figcaption>Get in a single person kayak and learn how to get to the places you want to get to quickly and efficiently</figcaption>
							<figure style="background-image: url(/projects/coen161/assets/images/activity4.jpg)"></figure>
						</div>
					</div>
				</div>
				<div class="spacer"></div>
				<div class="container">
					<h2 class="section-header">Shop our Products!</h2>
					<div class="container" id="cont">
					<?php 
							$dirname = "./assets/images/store/";
							$images = glob($dirname."*.{jpeg,gif,png}",GLOB_BRACE);
						
							foreach ($images as $image) {
								$pth = explode("/", $image);
								echo "<div class='img'>";
								echo '<a href="shop"><img src="'.$image.'" /></a>';
								echo "</div>";
							}
						?>
				</div>
					<div id="shop-scroll-btn"><a href="shop"><button class="stat-button" id="scroll-btn">Visit Our Store</button></a></div>
				</div>
				<div class="spacer"></div>
				<!--<div class="container">
					<div id="drone-footage">
						<video autoplay loop>
							<source src='/projects/coen161/assets/images/My%20Movie%206.mp4' type='video/mp4' />
						</video>
					</div>
				</div>
				<div class="spacer"></div>-->
				<div class="container">
					<h2 class="section-header">Our Locations</h2>
					<div id="map"></div>
				</div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>