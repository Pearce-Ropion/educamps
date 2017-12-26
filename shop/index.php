<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Catalogue</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		<script type = "text/javascript" src = "shop.js"></script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<form id="shop-form" method="GET" name="shop-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					
					<div class="container">
						<h2 class="section-header store-header">Your Cart</h2>
						<div id="cart"></div><br>
						<div id="discount-message"></div>
						<div id="final-total" class="total-price"></div>
						<div id="camp-child-discount"></div>
						<div id="cart-controls"><br>
							
							<input type="hidden" name="order-form-php">
							<input type="reset" id="reset" style="display:none;" value="Empty your cart" onclick="emptyCart()">
							<input type="submit" id="submit" style="display:none;" value="Checkout">
							<?php
								$hasRegisteredChild = 0;
								if (isset($_SESSION['loggedIn']))
								{
									echo '<script>login = true;</script>';
									
									//check for registered child
									$userID = $_SESSION['id'];
									$query = "SELECT * FROM camp_child WHERE (parent='$userID') AND (paid='1')";
									$result = mysqli_query($sql, $query);//query parents with campers and who have paid
									if((mysqli_num_rows($result) > 0)) {
											echo '<script>camper = 1;</script>';
											$hasRegisteredChild = 1;
										}
									else {
											echo '<script>camper = 0;</script>';
										}
	
									//on form submission, check for items in the cart and insert into database
									if ($_SERVER['REQUEST_METHOD'] == 'GET') {
										if (isset($_GET['order-form-php'])) { //checks hidden input field
											$query = "SELECT * FROM shop_order ORDER BY orderNum DESC LIMIT 1";
											$result = mysqli_query($sql, $query);
											if (!(mysqli_num_rows($result) > 0)) {
												$order = 1;
											}
											else {
												$row = mysqli_fetch_assoc($result);
												$order = $row['orderNum'] + 1;
											}
											$query = "SELECT * FROM shop_availability";
											$result = mysqli_query($sql, $query);
											while ($row = mysqli_fetch_assoc($result)) {
												$itemID = 'item'.$row['id'];
												$itemConfirm = $itemID."confirm"; //links to hidden confirmation input with value 1 if item is in HTML cart
												$quantity = $_GET[$itemID];
												$confirm = $_GET[$itemConfirm];
												if ($quantity > 0 && $confirm == 1) { //submits data iff value AND confirmation exists
													$customer = $_SESSION['fname'].' '.$_SESSION['lname'];
													$item = $row['name'];
													$total = $quantity * $row['price'];
													if ($hasRegisteredChild === 1)
														$total  = round($total*0.85, 2); //total rounded to 2 decimal places to match shop price
													$currTime = date('U');
													$insert = "INSERT INTO shop_order (epoch, orderNum, customer, item, quantity, totalSpent) VALUES ('$currTime', '$order', '$customer', '$item', '$quantity', '$total')";
													mysqli_query($sql, $insert);
												}
											}
										}
									}
								}
								else //user not logged in
								{
									echo '<script>login = false;</script>';
									echo '<button type="button" id="forumLogin" class="forum-btn" style="margin:0;">Login To Checkout</button>';
								}
							?>
						</div>
						<div id="confirm-cart"></div>
					</div>
					
					<div class="spacer"></div>
					<div class="container">
						<h2 class="section-header store-header">Clothings</h2>
						<?php
							$query = "SELECT * FROM shop_availability WHERE Type='Clothing'"; //$query = all clothing records (rows)
							$result = mysqli_query($sql, $query); //queries database using data in head.php and query from previous,
							if (mysqli_num_rows($result) > 0) // if the result set is not empty
							{
								while ($row = mysqli_fetch_assoc($result)) // gets row from table
								{
									$id = $row['id'];
									$name = $row['name'];
									$lower_name = strtolower($name);
									$price = $row['price'];
						?>
									<div class="item-box">
										<figure>
											<img class="item-img" src="/projects/coen161/assets/images/store/<?php echo $lower_name; ?>.jpeg">
											<figcaption><?php echo $name; ?></figcaption>
											<?php
												if (strpos($price, '.')) // format price from database depending on decimal point
													echo "<figcaption>"."$".$price."0"."</figcaption>";
												else
													echo "<figcaption>"."$".$price.".00"."</figcaption>";			
											?>	
										</figure>
										<input type="number" id="<?php echo $name; ?>" name="<?php echo 'item'.$row['id']; ?>" 
													 step="1" value="0" min="0" max="99">
										<input type="hidden" id='<?php echo "$name ";?>confirm' name="<?php echo 'item'.$row['id']."confirm"; ?>" value = "0">
										<button type="button" onclick='aLaCart("<?php echo $name; ?>", <?php echo $price; ?>)'>Add to cart</button>
									</div>
						<?php
								}
							}
						?>
					</div>
					
					<div class="spacer"></div>
					<div class="container">
						<h2 class="section-header store-header">Gear</h2>
						<?php
							$query = "SELECT * FROM shop_availability WHERE Type='Gear'"; // all gear records
							$result = mysqli_query($sql, $query);
							if (mysqli_num_rows($result) > 0)
							{
								while ($row = mysqli_fetch_assoc($result))
								{
									$name = $row['name'];
									$lower_name = strtolower($name);
									$price = $row['price'];
						?>
									<div class="item-box">
										<figure>
											<img class="item-img" src="/projects/coen161/assets/images/store/<?php echo $lower_name; ?>.jpeg">
											<figcaption><?php echo $name; ?></figcaption>
											<?php
												if (strpos($price, '.'))
													echo "<figcaption>"."$".$price."0"."</figcaption>";
												else
													echo "<figcaption>"."$".$price.".00"."</figcaption>";			
											?>	
										</figure>
										<input type="number" id="<?php echo $name; ?>" name="<?php echo 'item'.$row['id']; ?>" 
													 step="1" value="0" min="0" max="99">
										<input type="hidden" id='<?php echo "$name ";?>confirm' name="<?php echo 'item'.$row['id']."confirm"; ?>" value = "0">
										<button type="button" onclick='aLaCart("<?php echo $name; ?>", <?php echo $price; ?>)'>Add to cart</button>
									</div>
						<?php
								}
							}
						?>
					</div>
						
					<div class="spacer"></div>
					<div class="container">
						<h2 class="section-header store-header">Accessories</h2>
						<?php
							$query = "SELECT * FROM shop_availability WHERE Type='Accessories'"; // all accessories records
							$result = mysqli_query($sql, $query);
							if (mysqli_num_rows($result) > 0)
							{
								while ($row = mysqli_fetch_assoc($result))
								{
									$name = $row['name'];
									$lower_name = strtolower($name);
									$price = $row['price'];
						?>
									<div class="item-box">
										<figure>
											<img class="item-img" src="/projects/coen161/assets/images/store/<?php echo $lower_name; ?>.jpeg">
											<figcaption><?php echo $name; ?></figcaption>
											<?php
												if (strpos($price, '.'))
													echo "<figcaption>"."$".$price."0"."</figcaption>";
												else
													echo "<figcaption>"."$".$price.".00"."</figcaption>";			
											?>	
										</figure>
										<input type="number" id="<?php echo $name; ?>" name="<?php echo 'item'.$row['id']; ?>" 
													 step="1" value="0" min="0" max="99">
										<input type="hidden" id='<?php echo "$name ";?>confirm' name="<?php echo 'item'.$row['id']."confirm"; ?>" value = "0">
										<button type="button" onclick='aLaCart("<?php echo $name; ?>", <?php echo $price; ?>)'>Add to cart</button>
									</div>
						<?php
								}
							}
						?>
					</div>
				</form>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>
	
	
	
	
	