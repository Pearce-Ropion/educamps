<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Activities</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		<script type = "text/javascript" src = "activities.js"></script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="content-header">
					<h2 class="section-header">Activities!</h2>
					<div class="specifications">
						<strong>Computers and Robotics only offered at:</strong><br>
						<div style="padding-left: 30px;">
							- NYU, USC, Northwestern, Stanford, MIT, Smithsonian<br><br>
						</div>
						<strong>Outdoors only offered at:</strong><br>
						<div style="padding-left: 30px;">
							- Medecine Mountain, Philmont, Miami<br><br>
						</div>
					</div>
					<button id = "computers-button" onclick = "switchActivity('computers')">Computers and Programming</button>
					<button id = "robotics-button" onclick = "switchActivity('robotics')">Robotics</button>
					<button id = "outdoors-button" onclick = "switchActivity('outdoors')">Outdoors</button>
				</div>
				
				<div class="spacer"></div>
				
				<div class="container" id="computers" style="display: block; overflow: visible;">
					<h2 class="activity-header">Computers and Programming</h2>
					<div class="activity-group">
						<div class="activity">
							<figcaption>Computers I:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/computers_1.jpg" alt="Controller"/>
							<p>
								An introduction to the world of programming! Through the exploration of
								simple video games, campers gain elementary exposure to logic flow and the basics of programming.<br><br>
								Age Requirement: 12+<br>
								Prerequisite: None<br><br>
								<!--ANYTHING ELSE????-->
							</p>
						</div>
						<div class = "spacer"></div>
						<div class="activity">
							<figcaption>Computers II:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/computers_2.jpg" alt="Pygame Logo"/>
							<p>
								The second level in the computers curriculum deals with simple 2D graphics. Campers learn Python
								and use the Pygame module in order to produce images, animations, and even games!<br><br>
								Age Requirement: 12+<br>
								Prerequisite: Computers I<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Computers III:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/computers_3.jpg" alt="Unity Logo"/>
							<p>
								The final step in the computers curriculum introduces Unity3D as a 3D platform used to create and manipulate
								3D objects. Campers explore varying topics and tackle fairly complex projects.<br><br>
								Age Requirement: 15+<br>
								Coding Level: Advanced
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Example Projects</figcaption>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/UxcCoDlnqr4" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=UxcCoDlnqr4 -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/apdKl_3m2Vk" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=apdKl_3m2Vk -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/EPQP7QZsih4" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=EPQP7QZsih4 -->
						</div>
					</div>
				</div>
				
				<div class="container" id="robotics" style="display: none; overflow: visible;">
					<h2 class="activity-header">Robotics Programs</h2>
					<div class="activity-group">
						<div class="activity">
							<figcaption>Robotics I:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/robotics_1.jpg" alt="Robotics 1 img" style="overflow: hidden;"/>
							<p>
								Build something cool! Intro to Robotics gives campers an opportunity to explore the joys of creation.
								Everything you make, you take home!<br><br>
								Age Requirement: 10+<br>
								Prerequisite: None<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Robotics II:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/robotics_2.jpg" alt="Robotics 2 img"/>
							<p>
								Building off the introductory session, this program opens up the world of remote controls. Simple remote control cars,
								arm mechanisms, clocks, etc. Everythin you make, you take home!<br><br>
								Age Requirement: 10+<br>
								Prerequisite: Robotics I<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Robotics III:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/robotics_3.jpg" alt="Robotics 3 img"/>
							<p>
								Welcome to advanced robotics! In this course we bring together everything covered in the previous courses and host a battle
								bots tournament. Campers split into groups and over the course of the summer create a destructive machine to be pitted against
								the others.<br><br>
								Age Requirement: 12+<br>
								Prerequisite: Robotics II<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Robotics Projects</figcaption>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/iklcYTPrQy0" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=iklcYTPrQy0 -->	
							<iframe width="560" height="315" src="https://www.youtube.com/embed/5S8Vb0j5s-8" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=5S8Vb0j5s-8 -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/RkvHRf6T8L4" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=RkvHRf6T8L4 -->
						</div>
						<!-- ADD EXAMPLES OF SOME ROBOTICS PROJECTS (2 EXAMPLES MAYBE EMBEDDED VIDEOS OF SOME SIMPLE ROBOTS???) -->
					</div>
				</div>
				
				<div class="container" id="outdoors" style="display: none; overflow: visible;">
					<h2 class="activity-header">Outdoor Activities</h2>
					<div class="activity-group">
						<div class="activity">
							<figcaption>Outdoors Level I:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/outdoors_1.jpg" alt="Canoing"/>
							<p>
								Activities include but are not limited to archery, arts and crafts, canoeing, hiking, biking.
								Groups also play games against each other throughout each day.<br><br>
								Age Requirement: 8+<br>
								Prerequisite: None<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Outdoors Level II:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/outdoors_2.jpg" alt="Rock Climbing"/>
							<p>
								Level II includes but is not limited to* the ropes course, rock-climbing, white-water rafting, shooting.
								Groups also play games against each other throughout each day.<br>
								*All of Level I activities also available.<br><br>
								Age Requirement: 8+<br>
								Prerequisite: Level I<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Outdoors Level III:</figcaption>
							<!-- CHANGE IMAGE DIMENSIONS -->
							<img src="/projects/coen161/assets/images/outdoors_3.jpg" alt="Camping"/>
							<p>
								Level III is a week-long backpacking trip through the surrounding nature. Campers are split into groups of 8-10
								with two councelors per group. Over the week, campers will learn to start fires, cook fish, and anything else that
								is necessary to survive in the wilderness.<br><br>
								Age Requirement: 10+<br>
								Prerequisite: Outdoors Level II<br><br>
								<!--ANYTHING ELSE???-->
							</p>
						</div>
						<div class="spacer"></div>
						<div class="activity">
							<figcaption>Camper Videos</figcaption>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/eqSD1GNlM7c" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=eqSD1GNlM7c -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/sakzaIR7ERg" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=sakzaIR7ERg -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/-j1HT0fXLIc" frameborder="0" allowfullscreen></iframe>
							<!-- https://www.youtube.com/watch?v=-j1HT0fXLIc -->
						</div>
					</div>
					<!-- ADD EXAMPLES OF SOME OUTDOORS STUFF (2 EXAMPLES MAYBE VIDEOS OF KIDS ROCK CLIMBING OR SOMETHING???) -->
				</div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>
