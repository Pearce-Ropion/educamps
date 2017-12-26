<?php
session_start();
$sql = mysqli_connect('localhost', 'coen161', 'Coen161', 'coen161'); /* server, username, password, database*/
if (!$sql) {
	die("Connection failed: " . mysqli_connect_error());
}
$thread = $_GET['thread'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$fTitle = $_POST['newPost-title'];
	$fMessage = $_POST['newPost-message'];
	$fCategory = $_POST['newPost-category'];
	$currTime = date('U');
	$author = $_SESSION['id'];
	$insert = "INSERT INTO forum_threads (epoch, parent, author, title, message) VALUES ('$currTime', '$fCategory', '$author', '$fTitle', '$fMessage')";
	mysqli_query($sql, $insert);
	$query = "SELECT * FROM forum_category WHERE id='$fCategory' LIMIT 1";
	$result = mysqli_query($sql, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$threadCount = $row['count'];
	}
	$threadCount++;
	$update = "UPDATE forum_category SET count='$threadCount' WHERE id=$fCategory";
	if (!mysqli_query($sql, $update)) {
		echo "Error: ".$update."<br>".mysqli_error($sql);
	}
	header('Location: /projects/coen161/forums/index.php?thread='.$thread);
	exit;
} else {
	echo 'This is GET';
}
?>