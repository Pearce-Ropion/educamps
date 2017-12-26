<header>
	<?php
		$email = $password = '';
		$emailErr = $passwordErr = '';
		$validLogin = true;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['login-form-php'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				if (empty($email)) {
					$emailErr = 'You must enter an email';
					$validLogin = false;
				} else {
					$email = test($email);
				}
				if (empty($password)) {
					$passwordErr = 'You must enter a password';
					$validLogin = false;
				} else {
					$password = test($password);
				}
				if ($email && $password) {
					$query = "SELECT * FROM user_login WHERE email='$email'";
					$result = mysqli_query($sql, $query);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$dbemail = $row['email'];
							$dbhash = $row['password'];
						}
						if ($email == $dbemail && password_verify($password, $dbhash)) {
							$query = "SELECT * FROM user_info WHERE email='$email'";
							$result = mysqli_query($sql, $query);
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									$_SESSION['id'] = $row['id'];
									$_SESSION['fname'] = $row['firstname'];
									$_SESSION['lname'] = $row['lastname'];
									$_SESSION['email'] = $row['email'];
									$_SESSION['username'] = $row['username'];
									$_SESSION['phone'] = $row['phone'];
								}
								$_SESSION['loggedIn'] = true;
							}
						} else {
							$emailErr = 'Incorrect email or password';
							$validLogin = false;
						}
					} else {
						header('Location: /projects/coen161/member/register/');
					}
				}
			}
		}
		function test($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<script type="text/javascript">
		var validLogin = <?php echo json_encode($validLogin); ?>;
	</script>
	<div id="login">
		<button id="login-btn" class="color-primary-0">
			<?php
				if (isset($_SESSION['loggedIn'])) {
					echo $_SESSION['fname'];
				} else {
					echo 'Login';
				}
			?>
		</button>
		<br>
		<?php
			if (isset($_SESSION['loggedIn'])) {
				echo '<a class="login-profile-link" href="/projects/coen161/member/logout/">Logout</a>';
			} else {
				echo '<a class="login-profile-link" href="/projects/coen161/member/register/">Register</a>';
			}
		?>
	</div>
	<div id="login-window">
		<form class="login-content animate" name="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			<div class="login-img">
				<span id="login-close-btn" class="close" title="Close Window">&times;</span>
				<img src="/projects/coen161/assets/images/favicon/favicon-128.png" alt="Avatar" class="avatar">
			</div>
			<div class="login-container">
				<label><b>Email</b></label><span id="login-emailErr" class="error"><?php echo $emailErr; ?></span>
				<input type="email" id="login-email" placeholder="Enter Email" name="email" required><br>
				<label><b>Password</b></label><span id="login-passwordErr" class="error"><?php echo $passwordErr; ?></span>
				<input type="password" id="login-password" placeholder="Enter Password" name="password" required><br>
				<input type="hidden" name="login-form-php" value="1">
				<button type="submit" id="login-submit">Login</button>
			</div>
			<div class="login-container" style="background-color:#f1f1f1">
				<button type="button" id="login-cancel-btn" class="cancelbtn">Cancel</button>
				<span class="forget-psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>
	<div class="title">
		<a href="/projects/coen161/">
			<figure id="logo"><img src="/projects/coen161/assets/images/favicon/favicon-128.png" alt="logo" width="128" height="128"></figure>
			<h1 class="title-main">Brefilion EDU Camps</h1>
		</a>
	</div>
	<div id="top-menu">
		<div id="menu-icon">
			<div id="menu-icon-box" class="mobile">
				<p>Menu</p>
			</div>
			<nav id="menu" class="menu-content">
				<div class="nav-center">
					<ul class="menu-nav">
						<li class="nav-item"><a href="/projects/coen161/" class="nav-itemlink active">Home</a></li>
						<li class="nav-item"><a href="/projects/coen161/activities/" class="nav-itemlink">Activities</a></li>
						<li class="nav-item"><a href="/projects/coen161/register/" class="nav-itemlink">Register</a></li>
						<li class="nav-item"><a href="/projects/coen161/forums/" class="nav-itemlink">Forums</a></li>
						<li class="nav-item"><a href="/projects/coen161/shop/" class="nav-itemlink">Shop</a></li>
						<li class="nav-item"><a href="/projects/coen161/memories/" class="nav-itemlink">Memories</a></li>
						<li class="nav-item"><a href="/projects/coen161/statistics/" class="nav-itemlink">Stats</a></li>
						<li class="nav-item nav-last"><a href="/projects/coen161/faq/" class="nav-itemlink">FAQ</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>
