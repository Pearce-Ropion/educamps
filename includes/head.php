<link rel="stylesheet" href="/projects/coen161/assets/css/main.css" type="text/css">
<link rel="stylesheet" href="/projects/coen161/assets/css/colors.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Cinzel|Dancing+Script|Lobster+Two|Poiret+One" rel="stylesheet">
<link rel="shortcut icon" href="/projects/coen161/assets/images/favicon/favicon-32.png">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="/projects/coen161/assets/scripts/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<meta name="viewport" content="width=device-width" initial-scale="1">
<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
<meta name="keywords" content="educamps, educamps inc, summer camp, winter camp, camp, computer camp, robotics camp, outdoor camp, kids, holidays, fun">
<meta name="description" content="A camp for kids to learn the basics in computers, robotics and enjoy the outdoors, all in our safe envirnment with supervison">
<?php 
	session_start();
	$sql = mysqli_connect('localhost', 'coen161', 'Coen161', 'coen161'); /* server, username, password, database*/
	if (!$sql) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if (isset($_SESSION['loggedIn'])) {
		$loggedIn = true;
	} else {
		$loggedIn = false;
	}
	date_default_timezone_set('America/Los_Angeles');
	ini_set('display_errors',1);
	error_reporting(-1);
?>
<script type="text/javascript">
	var loggedIn = <?php echo json_encode($loggedIn) ?>;
</script>
