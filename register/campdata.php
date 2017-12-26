<?php
$sql = mysqli_connect('localhost', 'coen161', 'Coen161', 'coen161'); /* server, username, password, database*/
$locations = array('nyu', 'usc', 'nw', 'stanford', 'philmont', 'miami', 'mit', 'medicine', 'washdc');
$val = intval($_GET['camp']);
$year = intval($_GET['year']);
$camp = $locations[$val - 1];
$campdata = array();
$query = "SELECT * FROM camp_info WHERE location='$camp'";
$result = mysqli_query($sql, $query);
while ($row = mysqli_fetch_array($result)) {
	for ($x = 3; $x < 11; $x++) {
		array_push($campdata, $row[$x]);
	}
}
//print_r($campdata);
//echo $campdata[0];
echo json_encode($campdata);
// print_r(json_encode($campdata));
// $store111 = json_encode($campdata);
// $test = json_decode($store111);
// print_r($test);
?>