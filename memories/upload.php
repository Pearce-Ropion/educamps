<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Memories</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<h2 class="section-header">Memories</h2>
					<form enctype='multipart/form-data' method='post' action='upload.php'>
						<div id="upcont">
							<div class="ex">
								<h2 id="exheading">For Example</h2>
									<div id="eximg">
										<div id='capt'><figcaption id='memcaption'>"The kids had a great time!" -Joe</figcaption></div>
										<img id="eximage" src="../assets/images/campexample.jpg" />
									</div>
							</div>
							<div class="share">
              	<h2>Share Your Memory</h2>
								<br>
                <div id="inputs">	
                  <br>   
									<textarea rows="6" cols="50" maxlength="30" id="memstory" name="memstory" placeholder="ex: My kids loved this camp!" value="<?php if(isset($_POST['memstory'])){echo $_POST['memstory'];} ?>" required></textarea><br><br>
									<div id="charcount">(30 characters max)</div>
									<label class="custom-file-upload">
    								<input type='file' name="mem" id="mem" />
    								Select an Image
									</label>
									<input type="submit" id="submit"/>
								</div>
								<br>
								<?php
									$query = "SELECT * FROM memories_info ORDER BY id DESC LIMIT 1;";
									$result = mysqli_query($sql, $query);
									$user_id = $_SESSION['id'];
									while ($rows = mysqli_fetch_assoc($result))
									{
										$imagenumbr = $rows['id'] + 1;
									}
									foreach($_FILES as $fileKey => $fileInfoArray) {
		  							$fileid = $fileKey . "story";
      							$userstory = "\"" .  $_POST[$fileid] . "\" -" . $_SESSION['fname'];
      			
										echo "<div id='uploadmessage'>";
	
			 							if( $_FILES['mem']['error'] > UPLOAD_ERR_OK ){				
			 								echo "<p>Could Not Upload Image</p>";
		 									exit();
		 								}
										
										$file_name = $fileInfoArray["name"];
										$f1 = explode(".", $file_name);
										$extension = $f1[1];
										$f1[0] = "image" . $imagenumbr;
										$file_name = $f1[0] . "." . $extension;
										
										if ($extension != "jpg" && $extension != "png" && $extension != "gif") {
     									echo "<p>Invalid File Type</p>";
											exit();
    								}
		
										if (empty($_POST["memstory"])){
											echo "<p>Please Share a Story</p>";
											exit();
      							}
			
										$file_temp_location = $fileInfoArray['tmp_name'];
    								$destination = $_SERVER['DOCUMENT_ROOT']."/projects/coen161/assets/uploads/" . $file_name;
		
										if (move_uploaded_file($file_temp_location, $destination)) {
											echo "<p>Your Memory was Uploaded</p>";	
										}
		
										else {
											echo "<p>Sorry, there was an error uploading your file.</p>";
											exit();
										}
										
										$timestamp = date('U');
										$insert = "INSERT INTO memories_info (user_id,caption,epoch) VALUES ('$user_id','$userstory','$timestamp')";
										if (!mysqli_query($sql, $insert)) {
											echo "Error: ".$insert."<br>".mysqli_error($sql);
										}
      							$foldername= $_SERVER['DOCUMENT_ROOT']."/projects/coen161/assets/uploads/";
										echo "<script>document.getElementById('eximage').src='../assets/uploads/$file_name'</script>";
										echo "<script>document.getElementById('memcaption').innerHTML='$userstory'</script>";
										echo "<script>document.getElementById('exheading').innerHTML='Your Upload'</script>";
										echo "</div>";
									}
								?>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>