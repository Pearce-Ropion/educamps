<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Register</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		<script type="text/javascript" src="/projects/coen161/assets/scripts/ajax.js"></script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<?php
					if (!isset($_SESSION['regiPay']) && !isset($_GET['checkout']) && isset($_SESSION['loggedIn'])) {
						echo '<h2 class="section-header">Registration Calendar</h2>';
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
						echo 'Select a Location for Availablility and Prices<br><br><select id="cal-loc" name="cal-loc" class="cal-loc">';
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
							echo '<div class="ribbon-box" style="height: 100px;">';
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
							echo '</div>';
						}
						echo '</div>';
						echo '<div id="box-container2">';
						for ($x = 0; $x < 2; $x++) {
							echo '<div class="ribbon-box" style="height: 100px;">';
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
							echo '</div>';
						}
						echo '</div>';
					}
					?>
				</div>
				<!--<div class="spacer"></div>-->
				<div class="container">
					<?php
					if (isset($_SESSION['regiPay']) && isset($_SESSION['loggedIn'])) {
						if ($_SESSION['regiPay'] == true) {
							echo '<h2 class="section-header">Registration Complete</h2>';
							$_SESSION['regiPay'] = false;
							$parent = $_SESSION['id'];
							$currYear = date('Y');
							$sessions = array('summer1', 'summer2', 'summer3', 'summer4', 'winter1', 'winter2');
							$query = "SELECT * FROM camp_child WHERE (parent='$parent') AND (paid='0')";
							$result = mysqli_query($sql, $query);
							while ($row = mysqli_fetch_array($result)) {
								$campAvail = getCampAvail($sql, $row[3], $row[4]);
								for ($x = 5; $x <= 10; $x++) {
									if ($row[$x] == 1) {
										$session = $sessions[$x - 5];
										$avail = $campAvail[$x - 5] - 1;
										$update = "UPDATE camp_info SET $session='$avail' WHERE (location='$row[3]') AND (year='$row[4]')";
										if (!mysqli_query($sql, $update)) {
											echo "Error: ".$update."<br>".mysqli_error($sql);
										}
									}
								}
							}
							$update = "UPDATE camp_child SET paid='1' WHERE parent=$parent";
							if (!mysqli_query($sql, $update)) {
								echo "Error: ".$update."<br>".mysqli_error($sql);
							}
							echo '<p>This page is a placeholder for an actual payment gateway. This entire site is part of a school project and is not operational - we do not actually charge anything.</p>';
						}
					} else if (isset($_GET['checkout']) && isset($_SESSION['loggedIn'])) {
						echo '<h2 class="section-header">Review Your Registration Order</h2>';
						echo '<table id="register-checkout">';
							echo '<tr class="register-row">';
								echo '<th style="width: 20%;"></th>';
								echo '<th style="width: 30%;">Child Name</th>';
								echo '<th style="width: 30%;">Sessions</th>';
								echo '<th style="width: 20%;">Price</th>';
							echo '</tr>';
						$childPrice = array();
						$childDisc = array();
						$childID = array();
						$childSum = array();
						$childWin = array();
						$sumCount = $winCount = $sumPrice = $winPrice = $sessPrice = $subTotalPrice = $discount = $discPrice = $totalPrice = 0;
						$childCount = 1;
						$parent = $_SESSION['id'];
						$currYear = date('Y');
						$locations = array('NYU', 'USC', 'Northwestern', 'Stanford', 'Philmont', 'Miami', 'MIT', 'Medicine Mountain', 'Smithsonian');
						$dblocations = array('nyu', 'usc', 'nw', 'stanford', 'philmont', 'miami', 'mit', 'medicine', 'washdc');
						$query = "SELECT * FROM camp_child WHERE (parent = '$parent') AND (paid = '0')";
						$result = mysqli_query($sql, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$sumCount = $winCount = 0;
							array_push($childID, $row['child']);
							for ($x = 0; $x < 4; $x++) {
								if ($row['summer'.($x + 1)] == 1) {
									$sumCount++;
									array_push($childSum, 1);
								} else if ($row['summer'.($x + 1)] == 0) {
									array_push($childSum, 0);
								}
							}
							for ($x = 0; $x < 2; $x++) {
								if ($row['winter'.($x + 1)] == 1) {
									$winCount++;
									array_push($childWin, 1);
								} else if ($row['winter'.($x + 1)] == 0) {
									array_push($childWin, 0);
								}
							}
							$campPrice = getCampPrice($sql, $row['location'], $currYear);
							$sumPrice = $campPrice[0] * $sumCount;
							$winPrice = $campPrice[1] * $winCount;
							$sessPrice = $sumPrice + $winPrice;
							if ($childCount > 1) {
								$discPrice = $sessPrice * 0.90;
							}
							array_push($childPrice, $sessPrice);
							array_push($childDisc, $discPrice);
							$childName = getChildName($sql, $row['child']);
							echo '<tr class="register-row">';
								echo '<td>'.$childCount.'</td>';
								echo '<td>'.$childName[0].' '.$childName[1].'</td>';
								echo '<td>';
								if ($sumCount != 0) {
									echo '<p>Summer: '.$sumCount.' session';
									if ($sumCount > 1) {
										echo 's</p>';
									} else {
										echo '</p>';
									}
								}
								if ($winCount != 0) {
									echo '<p>Winter: '.$winCount.' session';
									if ($winCount > 1) {
										echo 's</p>';
									} else {
										echo '</p>';
									}
								}
								echo '</td>';
								echo '<td>$'.$sessPrice.'.00</td>';
							echo '</tr>';
							$childCount++;
						}
						for ($x = 0; $x < $childCount - 1; $x++) {
							$subTotalPrice += $childPrice[$x];
							$discount += $discPrice[$x];
						}
						$totalPrice = $subTotalPrice - $discount;
						$tax = number_format((float)($totalPrice * 0.07), 2, '.', '');
						$totalPrice = number_format((float)($totalPrice * 1.07), 2, '.', '');
							echo '<tr class="register-calc"></tr>';
							echo '<tr class="register-row">';
								echo '<td >Sub Total</td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td>$'.$subTotalPrice.'.00</td>';
							echo '</tr>';
							if ($discount != 0) {
								echo '<tr class="register-row">';
									echo '<td>Discount</td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td>$'.$discount.'.00</td>';
								echo '</tr>';
							}
							echo '<tr class="register-row">';
								echo '<td>Tax (7%)</td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td>$'.$tax.'</td>';
							echo '</tr>';
							echo '<tr class="register-row">';
								echo '<td>Total</td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td>$'.$totalPrice.'</td>';
							echo '</tr>';
						echo '</table>';
						$_SESSION['regiPay'] = true;
						echo '<a href="/projects/coen161/register/index.php"><button id="registerPayment" class="register-form-btn">Continue to Payment</button></a>';
					} else if (isset($_SESSION['loggedIn'])) {
						echo '<h2 class="section-header">Register your child</h2>';
						echo '<form id="register-form" name="register-form" method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">';
						$rFname = $rLname = $rDoBM = $rDoBD = $rDoBY = $rGend = $rSch = $rGrade = $rSpec = $rLoc = '';
						$rNameErr = $rDoBErr = $rGendErr = $rSchErr = $rSpecErr = $rLocErr = $rSessErr = '';
						$rSessSum = array(0, 0, 0, 0);
						$rSessWin = array(0, 0);
						$validChild = true;
						$months30 = array(4,6,9,11);
						$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
						$locations = array('NYU', 'USC', 'Northwestern', 'Stanford', 'Philmont', 'Miami', 'MIT', 'Medicine Mountain', 'Smithsonian');
						$dblocations = array('nyu', 'usc', 'nw', 'stanford', 'philmont', 'miami', 'mit', 'medicine', 'washdc');
						$currYear = date('Y');
						$maxAge = 18;
						$minAge = 6;
						$minYear = $currYear - $maxAge - 2;
						$maxYear = $currYear - $minAge;
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							if (isset($_POST['register-form-php'])) {
								$rFname = $_POST['r-fname'];
								$rLname = $_POST['r-lname'];
								$rDoBM = $_POST['r-dobM'];
								$rDoBD = $_POST['r-dobD'];
								$rDoBY = $_POST['r-dobY'];
								$rSch = $_POST['r-school'];
								$rGrade = $_POST['r-grade'];
								$rLoc = $_POST['r-loc'];
								if (empty($rFname) && empty($rLname)) {
									$rNameErr = 'You must enter your child\'s first and last name';
									$validChild = false;
								} else if (empty($rFname)) {
									$rNameErr = 'You must enter your child\'s first name';
									$validChild = false;
								} else if (empty($rLname)) {
									$rNameErr = 'You must enter your child\'s last name';
									$validChild = false;
								} else {
									$rFname = test($rFname);
									$rLname = test($rLname);
								}
								if ($rDoBM == 0 || $rDoBD == 0 || $rDoBY == 0) {
									$rDoBErr = 'You must enter your child\'s date of birth';
									$validChild = false;
								} else if ($rDoBY % 4 == 0 && $rDoBM == 2 && $rDoBD > 29) {
									$rDoBErr = 'There are only 29 days in this month';
									$validChild = false;
								} else if ($rDoBY % 4 != 0 && $rDoBM == 2 && $rDoBD > 28) {
									$rDoBErr = 'There are only 28 days in this month';
									$validChild = false;
								} else if (in_array($rDoBM, $months30) && $rDoBD > 30) {
									$rDoBErr = 'There are only 30 days in this month';
									$validChild = false;
								}
								if (!isset($_POST['r-gend'])) {
									$rGendErr = 'You must enter your child\'s gender';
									$validChild = false;
								}
								if (empty($rSch) && empty($rGrade)) {
									$rSchErr = 'You must enter your child\'s school name and grade level';
									$validChild = false;
								} else if (empty($rSch)) {
									$rSchErr = 'You must enter your child\'s school name';
									$validChild = false;
								} else if (empty($rGrade)) {
									$rSchErr = 'You must enter your child\'s grade level';
									$validChild = false;
								} else if ($rGrade < 1) {
									$rSchErr = 'Your child must be in grade in at least 1st grade';
									$validChild = false;
								} else if ($rGrade > 12) {
									$rSchErr = 'Your child\'s grade can not surpass 12th grade';
									$validChild = false;
								} else {
									$rSch = test($rSch);
									$rGrade = test($rGrade);
								}
								if (!empty($rSpec)) {
									$rSpec = test($rSpec);
								}
								if ($rLoc == 0) {
									$rLocErr = 'You must select a camp location';
									$validChild = false;
								}
								if (!isset($_POST['r-sum']) && !isset($_POST['r-win'])) {
									$rSessErr = 'You must select at least 1 session from either list';
									$validChild = false;
								}
								if ($validChild) {
									if (isset($_SESSION['loggedIn'])) {
										$parent = $_SESSION['id'];
										$rDoBY += (date('Y') - 20);
										$dob = date('U', strtotime($rDoBY.'/'.$rDoBM.'/'.$rDoBD));
										$gender = $_POST['r-gend'];
										$insert = "INSERT INTO child_info (parent, firstname, lastname, dob, gender, school, grade, special) VALUES ('$parent', '$rFname', '$rLname', '$dob', '$gender', '$rSch', '$rGrade', '$rSpec')";
										if (!mysqli_query($sql, $insert)) {
											echo "Error: ".$insert."<br>".mysqli_error($sql);
										}
										if (isset($_POST['r-sum'])) {
											foreach ($_POST['r-sum'] as $session) {
												if ($session == 1) { $rSessSum[0] = 1; }
												if ($session == 2) { $rSessSum[1] = 1; }
												if ($session == 3) { $rSessSum[2] = 1; }
												if ($session == 4) { $rSessSum[3] = 1; }
											}
										}
										if (isset($_POST['r-win'])) {
											foreach ($_POST['r-win'] as $session) {
												if ($session == 1) { $rSessWin[0] = 1; }
												if ($session == 2) { $rSessWin[1] = 1; }
											}
										}
										$query = "SELECT * FROM child_info WHERE firstname='$rFname'";
										$result = mysqli_query($sql, $query);
										while ($row = mysqli_fetch_assoc($result)) {
											$childID = $row['id'];
										}
										$location = $dblocations[($rLoc - 1)];
										$insert = "INSERT INTO camp_child (child, parent, location, year, summer1, summer2, summer3, summer4, winter1, winter2) VALUES ('$childID', '$parent', '$location', '$currYear', '$rSessSum[0]', '$rSessSum[1]', '$rSessSum[2]', '$rSessSum[3]', '$rSessWin[0]', '$rSessWin[1]')";
										if (!mysqli_query($sql, $insert)) {
											echo "Error: ".$insert."<br>".mysqli_error($sql);
										}
										if (isset($_POST['rbtn1'])) {
											echo '<meta http-equiv="refresh" content="0; URL=http://www.thermacraft.us/projects/coen161/register/index.php?checkout=1">';
											exit;
										} else if (isset($_POST['rbtn2'])) {
											echo '<p><strong>'.$rFname.' '.$rLname.'</strong> has been added</p>';
											$rFname = $rLname = $rSch = $rGrade = '';
										}
									}
								}
							}
						}
						if (1) {
							echo '<p class="set-title">Child Information</p>';
							echo '<div class="register-child-wrap">';
								echo '<div style="float: left;">';
									echo '<label><strong>First Name</strong></label><span class="req">* </span><br>';
									echo '<input id="register-fname" name="r-fname" type="text" value="'.$rFname.'" required>';
								echo '</div>';
								echo '<div style="float: left; margin-left: 10px;">';
									echo '<label><strong>Last Name</strong></label><span class="req">* </span><span id="register-nameErr" class="error">'.$rNameErr.'</span><br>';
									echo '<input id="register-lname" name="r-lname" type="text" value="'.$rLname.'" required>';
								echo '</div><br><br>';
								echo '<div class="break"></div>';
								echo '<label><strong>Date of Birth</strong></label><span class="req">* </span><span id="register-dobErr" class="error">'.$rDoBErr.'</span><br>';
								echo '<select id="register-dobM" name="r-dobM" class="register-dob-input" required>';
								for ($z = 0; $z < count($months) + 1; $z++) {
									if ($z == 0) {
										echo '<option value="'.$z.'">Select Month</option>';
									} else {
										echo '<option value="'.$z.'">'.$months[$z - 1].'</option>';
									}
								}
								echo '</select>';
								echo '<select id="register-dobD" name="r-dobD" class="register-dob-input" required>';
								for ($z = 0; $z < 32; $z++) {
									if ($z == 0) {
										echo '<option value="'.$z.'">Select Day</option>';
									} else {
										echo '<option value="'.$z.'">'.$z.'</option>';
									}
								}
								echo '</select>';
								echo '<select id="register-dobY" name="r-dobY" class="register-dob-input" required>';
								$val = 0;
								for ($z = $minYear; $z <= $maxYear; $z++) {
									if ($z == $minYear) {
										echo '<option value="'.$val.'">Select Year</option>';
									} else {
										echo '<option value="'.$val.'">'.$z.'</option>';
									}
									$val++;
								}
								echo '</select><br><br>';
								echo '<div class="break"></div>';
								echo '<label><strong>Gender</strong></label><span class="req">* </span><span id="register-gendErr" class="error">'.$rGendErr.'</span><br>';
								echo '<input id="register-gendM" name="r-gend" type="radio" value="male" required>Male';
								echo '<input id="register-gendF" name="r-gend" type="radio" value="female" required>Female';
								echo '<br><br><div style="float: left;">';
									echo '<label><strong>School</strong></label><span class="req">* </span><br>';
									echo '<input id="register-school" name="r-school" type="text" value="'.$rSch.'" required>';
								echo '</div>';
								echo '<div style="float: left; margin-left: 10px;">';
									echo '<label><strong>Grade</strong></label><span class="req">* </span><span id="register-schoolErr" class="error">'.$rSchErr.'</span><br>';
									echo '<input id="register-grade" name="r-grade" type="text" placeholder="1-12" value="'.$rGrade.'" required>';
								echo '</div>';
								echo '<div class="break"></div>';
								echo '<label><strong>Special Instructions</strong></label><span id="register-specErr" class="error">'.$rSpecErr.'</span>';
								echo '<input id="register-specB" name="r-specB" type="checkbox" style="margin-left: 30px;">';
								echo '<textarea id="register-spec" name="r-spec" style="display: none;"></textarea>';
								echo '<div class="g-spacer"></div>';
								echo '<label><strong>Camp Location</strong></label><span class="req">* </span><span id="register-locErr" class="error">'.$rLocErr.'</span><br>';
								echo '<select id="register-loc" name="r-loc" class="register-loc-input" required>';
								for ($z = 0; $z < count($locations) + 1; $z++) {
									if ($z == 0) {
										echo '<option id="r-loc'.$z.'" value="'.$z.'">Select Location</option>';
									} else {
										echo '<option id="r-loc'.$z.'" value="'.$z.'">'.$locations[$z - 1].'</option>';
									}
								}
								echo '</select>';
								echo '<div id="r-act" style="display: inline-block">';
									echo '<input id="r-act1" type="radio" name="r-activity" checked>Computer Camps';
									echo '<input id="r-act2" type="radio" name="r-activity">Robotic Camps';
									echo '<input id="r-act3" type="radio" name="r-activity">Outdoor Camps';
								echo '</div>';
								echo '<br><br>Click arrow for session selection and information<br>';
								echo '<span id="register-sessErr" class="error">'.$rSessErr.'</span><br>';
								echo '<div style="float: left; width: 275px;">';
									echo '<details class="service-drop">';
										echo '<summary class="service-season"><strong>Summer</strong> - <span id="sprice"><em>Select a Location</em></span></summary>';
										echo '<div class="register-sess-box"><input id="register-s1" name="r-sum[]" type="checkbox" value="1" disabled> Session 1<span class="register-sess-date"> - June 18 - July 1</span></div>';
										echo '<div class="register-sess-box"><input id="register-s2" name="r-sum[]" type="checkbox" value="2" disabled> Session 2<span class="register-sess-date"> - July 2 - July 15</span></div>';
										echo '<div class="register-sess-box"><input id="register-s3" name="r-sum[]" type="checkbox" value="3" disabled> Session 3<span class="register-sess-date"> - July 16 - July 29</span></div>';
										echo '<div class="register-sess-box"><input id="register-s4" name="r-sum[]" type="checkbox" value="4" disabled> Session 4<span class="register-sess-date"> - June 30 - Aug 12</span></div>';
									echo '</details>';
								echo '</div>';
								echo '<div style="float: left; margin-left: 50px; width: 275px;">';
									echo '<details class="service-drop">';
										echo '<summary class="service-season"><strong>Winter</strong> - <span id="wprice"><em>Select a Location</em></span></summary>';
										echo '<div class="register-sess-box"><input id="register-w1" name="r-win[]" type="checkbox" value="1" disabled> Session 1<span class="register-sess-date"> - Dec 24 - Dec 30</span></div>';
										echo '<div class="register-sess-box"><input id="register-w2" name="r-win[]" type="checkbox" value="2" disabled> Session 2<span class="register-sess-date"> - Dec 31 - Jan 6</span></div>';
									echo '</details>';
								echo '</div>';
								echo '<div class="break"></div>';
							echo '</div><br>';
							echo '<input type="hidden" name="register-form-php">';
							echo '<input id="rbtn1" type="checkbox" name="rbtn1" style="display: none;">';
							echo '<button id="register-submit" name="register-form-btn" type="submit">Submit and Checkout</button>';
							echo '<input id="rbtn2" type="checkbox" name="rbtn2" style="display: none;">';
							echo '<button id="register-submit-add" name="register-form-add-btn" type="submit">Add Another Child</button>';
						}
						echo '</form>';
					} else {
						echo '<h2 class="section-header">Registration Calendar</h2>';
						echo '<button id="registerLogin" class="register-form-btn">Login to Register your Child</button>';
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
						echo '<br><br>Select a Location for Availablility and Prices<br><select id="cal-loc" name="cal-loc" class="cal-loc">';
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
					}
					function getCampPrice($sql, $location, $year) {
						$campdata = array();
						$query = "SELECT * FROM camp_info WHERE (location='$location') AND (year='$year')";
						$result = mysqli_query($sql, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							array_push($campdata, $row['priceS']);
							array_push($campdata, $row['priceW']);
						}
						return $campdata;
					}
					function getCampAvail($sql, $location, $year) {
						$campdata = array();
						$query = "SELECT * FROM camp_info WHERE (location='$location') AND (year='$year')";
						$result = mysqli_query($sql, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							array_push($campdata, $row['summer1']);
							array_push($campdata, $row['summer2']);
							array_push($campdata, $row['summer3']);
							array_push($campdata, $row['summer4']);
							array_push($campdata, $row['winter1']);
							array_push($campdata, $row['winter2']);
						}
						return $campdata;
					}
					function getChildName($sql, $child) {
						$childname = array();
						$query = "SELECT * FROM child_info WHERE id='$child'";
						$result = mysqli_query($sql, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							array_push($childname, $row['firstname']);
							array_push($childname, $row['lastname']);
						}
						return $childname;
					}
					?>
				</div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>