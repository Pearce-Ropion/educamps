<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Project Status</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<h2 class="section-header">Project Status</h2>
					<div>
						<text>PHP</text><text>PHP</text>
						<?php
							$language = 'PHP';
							print "<div><text>PHP</text><text>$language</text></div>";
							print "<p>$language[1]</p>";
						?>
				</div>
				<div class="spacer"></div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>