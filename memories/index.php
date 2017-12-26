<!DOCTYPE html>
<html>
	<head>
		<title>Memories</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		
		<script type="text/javascript" src="scroll.js"></script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<h2 class="section-header" id="mem-header">Memories</h2>
				<div class="container" id="cont">
					<?php 
							$dirname = "../assets/uploads/";
							$images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
				
							foreach ($images as $image) {
								$pth = explode("/", $image);
								$img = explode("e", $pth[3]);
								$imagenum = explode(".", $img[1]);
								
								$query = "SELECT * FROM memories_info WHERE id = '$imagenum[0]'";
								$result = mysqli_query($sql, $query);
								while ($rows = mysqli_fetch_assoc($result)) {
									$caption = $rows['caption'];
								}
								echo "<div class='img'>";
								echo "<div id='capt'><figcaption id='memcaption'>" . $caption . "</figcaption></div>";
								echo '<img src="'.$image.'" />';
								echo "</div>";
							
							}
						?>
				</div>
				<p id="uploadlink">
					<?php
						$sql;
						if (isset($_SESSION['loggedIn'])) {
							echo '<button class="membuttons" id="btn-mem"><a href="./upload.php" class="loggedin"><strong>' . 'Hey ' . $_SESSION['fname'] . ', Share a Story!</strong></a></button>';
						} 
						else {
							echo '<button class="membuttons" id="login-btn-mem"><strong>Please Login to Share</strong></button>';
						}
					?>
				</p>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>