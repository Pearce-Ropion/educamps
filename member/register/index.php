<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Parent Registration</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<h2 class="section-header">Create a Parent Account</h2>
					<form id="account-form" name="account-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<?php
							$pFname = $pLname = $pEmail = $pEmail2 = $pUname = $pTel = $pPass = $pPass2 ='';
							$pNameErr = $pEmailErr = $pUnameErr = $pTelErr = $pPassErr ='';
							$validParent = true;
							$debug = false;
							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								if (isset($_POST['account-form-php'])) {
									$pFname = $_POST['p-fname'];
									$pLname = $_POST['p-lname'];
									$pEmail = $_POST['p-email'];
									$pEmail2 = $_POST['p-email2'];
									$pUname = $_POST['p-uname'];
									$pTel = $_POST['p-tel'];
									$pPass = $_POST['p-pass'];
									$pPass2 = $_POST['p-pass2'];
									if ($debug) {
										echo 'First Name: '.$pFname.'<br>';
										echo 'Last Name: '.$pLname.'<br>';
										echo 'Email: '.$pEmail.'<br>';
										echo 'Email 2: '.$pEmail2.'<br>';
										echo 'Username: '.$pUname.'<br>';
										echo 'Phone: '.$pTel.'<br>';
										echo 'Password: '.$pPass.'<br>';
										echo 'Password 2: '.$pPass2.'<br>';
									}
									if (empty($pFname) && empty($pLname)) {
										$pNameErr = 'You must enter your first and last name';
										$validParent = false;
									} else if (empty($pFname)) {
										$pNameErr = 'You must enter your first name';
										$validParent = false;
									} else if (empty($pLname)) {
										$pNameErr = 'You must enter your last name';
										$validParent = false;
									} else {
										$pFname = test($pFname);
										$pLname = test($pLname);
									}
									if (empty($pEmail) || empty($pEmail2)) {
										$pNameErr = 'You must enter your email address twice';
										$validParent = false;
									} else if ($pEmail !== $pEmail2) {
										$pNameErr = 'You must enter the same email address';
										$validParent = false;
									} else {
										$pEmail = test($pEmail);
										$pEmail2 = test($pEmail2);
									}
									if (empty($pUname)) {
										$pUnameErr = 'You must enter a username';
										$validParent = false;
									} else {
										$pUname = test($pUname);
									}
									if (empty($pTel)) {
										$pTelErr = 'You must enter a phone number';
										$validParent = false;
									} else if (strlen($pTel) != 10) {
										$pTelErr = 'You must enter a valid US phone number (10 Digits)';
										$validParent = false;
									} else {
										$pTel = test($pTel);
									}
									if (empty($pPass) || empty($pPass2)) {
										$pPassErr = 'You must enter a password twice';
										$validParent = false;
									} else if ($pPass !== $pPass2) {
										$pPassErr = 'You must enter the same password';
										$validParent = false;
									} else {
										$pPass = test($pPass);
										$passHash = bcrypt($pPass);
									}
									if ($validParent) {
										$queryInfo = 'SELECT email FROM user_info WHERE email="$pEmail"';
										$resultInfo = mysqli_query($sql, $queryInfo);
										$queryLogin = 'SELECT email FROM user_login WHERE email="$pEmail"';
										$resultLogin = mysqli_query($sql, $queryLogin);
										if (mysqli_num_rows($resultInfo) == 0 && mysqli_num_rows($resultLogin) == 0) {
											$sqlInfoInput = 'INSERT INTO user_info (firstname, lastname, email, username, phone) VALUES ("'.$pFname.'", "'.$pLname.'", "'.$pEmail.'", "'.$pUname.'", "'.$pTel.'")';
											$sqlLoginInput = 'INSERT INTO user_login (email, password) VALUES ("'.$pEmail.'", "'.$passHash.'")';
											if (mysqli_query($sql, $sqlInfoInput) && mysqli_query($sql, $sqlLoginInput)) {
												echo 'Account Successfully Created<br><br>';
											} else if ($debug) {
												echo 'Error: '.$sqlInfoInput .'<br>'.mysqli_error($sql).'<br><br>';
												echo 'Error: '.$sqlLoginInput .'<br>'.mysqli_error($sql).'<br><br>';
											} else {
												echo 'There was a problem creating you account. Please try again later.';
											}
										}
									}	
								}
							}
							function bcrypt($password, $rounds = 10) {
								$crypt_options = array('cost' => $rounds);
    							return password_hash($password, PASSWORD_BCRYPT, $crypt_options);
							}
						?>
						<p class="center-text">In order to sign your child up for Brefilion EDU Camps, we ask that you first create an account here so that your information can be stored for your future use.</p><br><br>
						<div style="float: left;">
							<label><strong>First Name</strong></label><span class="req">* </span><br>
							<input id="parent-fname" name="p-fname" type="text" value="<?php echo $pFname; ?>" required>
						</div>
						<div style="float: left; margin-left: 10px;">
							<label><strong>Last Name</strong></label><span class="req">* </span><span id="parent-nameErr" class="error"><?php echo $pNameErr; ?></span><br>
							<input id="parent-lname" name="p-lname" type="text" value="<?php echo $pLname; ?>" required>
						</div>
						<div class="break"></div>
						<div style="float: left;">
							<label><strong>Email</strong></label><span class="req">* </span><br>
							<input id="parent-email" name="p-email" type="email" value="<?php echo $pEmail; ?>" required>
						</div>
						<div style="float: left; margin-left: 10px;">
							<label><strong>Confirm Email</strong></label><span class="req">* </span><span id="parent-emailErr" class="error"><?php echo $pEmailErr; ?></span><br>
							<input id="parent-email2" name="p-email2" type="email" value="<?php echo $pEmail2; ?>" required>
						</div>
						<div class="break"></div>
						<label><strong>Username</strong></label><span class="req">* </span><span id="parent-unameErr" class="error"><?php echo $pUnameErr; ?></span><br>
						<input id="parent-uname" name="p-uname" type="text" value="<?php echo $pUname; ?>" required><br>
						<label><strong>Phone Number</strong></label><span class="req">* </span><span id="parent-telErr" class="error"><?php echo $pTelErr; ?></span><br>
						<input id="parent-tel" name="p-tel" type="tel" value="<?php echo $pTel; ?>" pattern="[0-9]{10}" required><br>
						<div style="float: left;">
							<label><strong>Password</strong></label><span class="req">* </span><br>
							<input id="parent-pass" name="p-pass" type="password" value="<?php echo $pPass; ?>" required>
						</div>
						<div style="float: left; margin-left: 10px;">
							<label><strong>Confirm Password</strong></label><span class="req">* </span><span id="parent-passErr" class="error"><?php echo $pPassErr; ?></span><br>
							<input id="parent-pass2" name="p-pass2" type="password" value="<?php echo $pPass2; ?>" required>
						</div>
						<div class="break"></div>
						<input type="hidden" name="account-form-php" value="1">
						<button id="account-submit" name="account-form-btn" type="submit">Register</button>
					</form>
				</div>
				<div class="spacer"></div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>