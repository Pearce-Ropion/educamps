<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Forums</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<h2 class="section-header">Brefilion Community Forums</h2>
					<?php
						if (isset($_GET['thread'])) {
							$thread = $_GET['thread'];
							if ($thread == 0) {
								if (isset($_SESSION['loggedIn'])) {
									$fTitle = $fTitleErr = $fMessageErr = $fCategoryErr = '';
									$validThread = true;
									$query = "SELECT * FROM forum_threads ORDER BY id DESC LIMIT 1";
									$result = mysqli_query($sql, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										$thread = $row['id'] + 1;
									}
									if ($_SERVER['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['newPost-form-php'])) {
											$fTitle = $_POST['newPost-title'];
											$fMessage = $_POST['newPost-message'];
											$fCategory = $_POST['newPost-categorty'];
											if (empty($fTitle)) {
												$fTitleErr = 'You must enter a thread title';
												$validThread = false;
											} else {
												$fTitle = test($fTitle);
											}
											if (empty($fMessage)) {
												$fMessageErr = 'You must enter some content';
												$validThread = false;
											} else {
												$fMessage = test($fMessage);
											}
											if ($fCategory < 2) {
												$fCategoryErr = 'You must select a forum category';
												$validThread = false;
											}
											if ($validThread) {
												$currTime = date('U');
												$author = $_SESSION['id'];
												$insert = "INSERT INTO forum_threads (epoch, parent, author, title, message) VALUES ('$currTime', '$fCategory', '$author', '$fTitle', '$fMessage')";
												mysqli_query($sql, $insert);
												$query = "SELECT * FROM forum_category WHERE id='$fCategory'";
												$result = mysqli_query($sql, $query);
												while ($row = $mysqli_fetch_assoc($result)) {
													$threadCount = $row['count'];
												}
												$threadCount++;
												$update = "UPDATE forum_category SET count='$threadCount' WHERE id=$fCategory";
												mysqli_query($sql, $update);
											}
										}
									}
									echo '<form id="create-thread" name="create-thread" method="post" action="/projects/coen161/forums/create/index.php?thread='.$thread.'">';
										echo '<label><strong>Select a Category</strong></label><span class="req">* </span><span id="newPost-categoryErr" class="error">'.$fCategoryErr.'</span><br>';
										echo '<select id="newPost-category" name="newPost-category">';
											$query = "SELECT * FROM forum_category";
											$result = mysqli_query($sql, $query);
											echo '<option value="0">Select Category</option>';
											while ($row = mysqli_fetch_assoc($result)) {
												if ($row['id'] != 1) {
													echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
												}
											}
										echo '</select><br>';
										echo '<label><strong>Title</strong></label><span class="req">* </span><span id="newPost-titleErr" class="error">'.$fTitleErr.'</span><br>';
										echo '<input id="newPost-title" name="newPost-title" type="text" value="'.$fTitle.'"><br>';
										echo '<label><strong>Message</strong></label><span class="req">* </span><span id="newPost-messageErr" class="error">'.$fMessageErr.'</span><br>';
										echo '<textarea id="newPost-message" name="newPost-message"></textarea><br>';
										echo '<input type="hidden" name="newPost-form-php"><br>';
										echo '<a href="/projects/coen161/forums/index.php?thread=0"><button id="newPost-btn" class="forum-btn" type="submit">Create</button></a>';
									echo '</form>';
								} else {
									echo '<button id="forumLogin" class="forum-btn">Login to Create a Thread</button>';
								}
							} else {
								$reply = $replyErr = '';
								if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									if (isset($_POST['reply-form-php'])) {
										$reply = $_POST['reply'];
										if (!empty($reply)) {
											$reply = test($reply);
											$currTime = date('U');
											$parent = $_SESSION['id'];
											$insert = "INSERT INTO forum_replies (epoch, parent, author, message) VALUES ('$currTime', '$thread', '$parent', '$reply')";
											mysqli_query($sql, $insert);
											$query = "SELECT * FROM forum_threads WHERE id='$thread'";
											$result = mysqli_query($sql, $query);
											while ($row = mysqli_fetch_assoc($result)) {
												$replyCount = $row['replies'];
											}
											$replyCount++;
											$update = "UPDATE forum_threads SET replies='$replyCount' WHERE id=$thread";
											mysqli_query($sql, $update);
										}
									}
								}
								echo'<div class="forum-path">';
									echo '<p><a class="forum-link" href="/projects/coen161/forums/">Forum</a> >> ';
									$query = "SELECT * FROM forum_threads WHERE id='$thread'";
									$result = mysqli_query($sql, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										$select = $row['parent'];
										$queryCat = "SELECT * FROM forum_category WHERE id='$select'";
										$resultCat = mysqli_query($sql, $queryCat);
										while ($rowCat = mysqli_fetch_assoc($resultCat)) {
											echo '<a href="/projects/coen161/forums/index.php?category='.$rowCat['id'].'" class="forum-link">'.$rowCat['name'].'</a>';
											echo ' >> '.$row['title'].'</p>';
										}
									}
								echo '</div>';
								echo '<div class="spacer" style="width: 96%;"></div>';
								if (!isset($_SESSION['loggedIn'])) {
									echo '<button id="forumLogin" class="forum-btn">Login to Reply</button>';
								}
								echo '<div id="thread">';
									echo '<div id="thread-op" class="forum-post">';
										$query = "SELECT * FROM forum_threads WHERE id='$thread' LIMIT 1";
										$result = mysqli_query($sql, $query);
										while ($row = mysqli_fetch_array($result)) {
											$queryAuthor = getAuthor($sql, $row['author']);
											$postTime = getTime($row['epoch']);
											$title = $row['title'];
											$message = $row['message'];
										}
										echo '<h4 class="post-title">'.$title.'</h4>';
										echo '<div class="f-spacer"></div>';
										echo '<p>'.$message.'</p>';
										echo '<p class="post-info" style="font-size: 14px;"><span class="post-author">'.$queryAuthor.'</span> - <span class="post-time">'.$postTime.'</span></p><br>';
									echo '</div>';
									if (isset($_SESSION['loggedIn'])) {
										echo '<form id="thread-reply" class="forum-reply" method="post" action="/projects/coen161/forums/index.php?thread='.$thread.'">';
											echo '<textarea id="text-reply" name="reply" placeholder="Leave a comment"></textarea>';
											echo '<input type="hidden" name="reply-form-php">';
											echo '<p id="replyErr" style="display: none;">'.$replyErr.'<p>';
											echo '<button id="btn-reply" class="forum-btn" style="display: none;">Reply</button>';
											echo '<button id="btn-reply-cancel" class="forum-btn" style="display: none;">Cancel</button>';
										echo '</form>';
									}
									$query = "SELECT * FROM forum_replies WHERE parent='$thread'";
									$result = mysqli_query($sql, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										$queryAuthor = getAuthor($sql, $row['author']);
										$postTime = getTime($row['epoch']);
										$message = $row['message'];
										echo '<div class="forum-comment">';
											echo '<p class="comment-info"><span class="post-author">'.$queryAuthor.'</span> - <span class="post-time">'.$postTime.'</span></p>';
											echo '<p>'.$message.'</p>';
										echo '</div>';
									}
								echo '</div>';
							}
						} else if (isset($_GET['category'])) {
							$category = $_GET['category'];
							echo'<div class="forum-path">';
								echo '<p><a class="forum-link" href="/projects/coen161/forums/">Forum</a> >> ';
								$query = "SELECT * FROM forum_category WHERE id='$category'";
								$result = mysqli_query($sql, $query);
								while ($row = mysqli_fetch_assoc($result)) {
									echo $row['name'].'</p>';
								}
							echo '</div>';
							echo '<div class="spacer" style="width: 96%;"></div>';
							if (isset($_SESSION['loggedIn'])) {
								echo '<button id="newThreadBtn" class="forum-btn">New Thread</button>';
							} else {
								echo '<button id="forumLogin" class="forum-btn">Login to Post</button>';
							}
							echo '<table id="threads">';
								echo '<tr class="forum-header">';
									echo '<th class="forum">Forum Threads</th>';
									echo '<th class="replies">Replies</th>';
									echo '<th class="latest">Latest Post</th>';
								echo '</tr>';
							$query = "SELECT * FROM forum_threads WHERE parent='$category'";
							$result = mysqli_query($sql, $query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
									echo '<td class="forum"><div>';
										echo '<a href="index.php?thread='.$row['id'].'" class="forum-link">'.$row['title'].'</a>';
										$queryAuthor = getAuthor($sql, $row['author']);
										$time = getTime($row['epoch']);
										echo '<p class="post-info">By <span class="post-author">'.$queryAuthor.'</span> '.$time.'</p>';
									echo '</div></td>';
									echo '<td class="replies">'.$row['replies'].'</td>';
									$lastCommentInfo = getLastComment($sql, $row['id']);
									echo '<td class="latest"><div>';
										if (count($lastCommentInfo) == 5) {
											$time = getTime($lastCommentInfo[1]);
											$queryAuthor = getAuthor($sql, $lastCommentInfo[3]);
											if (strlen($lastCommentInfo[4]) > 45) {
												$lastCommentInfo[4] = substr($lastCommentInfo[4],0,45);
												$lastCommentInfo[4] = $lastCommentInfo[4].'...';
											}
											echo '<p class="forum-desc">'.$lastCommentInfo[4].'</p>';
											echo '<p class="post-info">By <span class="post-author">'.$queryAuthor.'</span> '.$time.'</p>';
										} else {
											echo '<p>'.$lastCommentInfo.'</p>';
										}
									echo '</div></td>';
								echo '</tr>';
							}
							echo '</table>';
						} else {
							if (isset($_SESSION['loggedIn'])) {
								echo '<button id="newThreadBtn" class="forum-btn">New Thread</button>';
							} else {
								echo '<button id="forumLogin" class="forum-btn">Login to Post</button>';
							}
							echo '<table id="forum">';
								echo '<tr class="forum-header">';
									echo '<th class="forum">Forum Category</th>';
									echo '<th class="threads">Threads</th>';
									echo '<th class="latest">Latest Thread</th>';
								echo '</tr>';
							$query = "SELECT * FROM forum_category";
							$result = mysqli_query($sql, $query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
									echo '<td class="forum"><div>';
										echo '<a href="index.php?category='.$row['id'].'" class="forum-link">'.$row['name'].'</a>';
										echo '<p class="forum-desc">'.$row['description'].'</p>';
									echo '</div></td>';
									echo '<td class="threads">'.$row['count'].'</td>';
									$lastThreadInfo = getLastThread($sql, $row['id']);
									echo '<td class="latest"><div>';
										if (count($lastThreadInfo) == 7) {
											if (strlen($lastThreadInfo[4]) > 30) {
												$lastThreadInfo[4] = substr($lastThreadInfo[4],0,30);
												$lastThreadInfo[4] = $lastThreadInfo[4].'...';
											}
											echo '<a href="index.php?thread='.$lastThreadInfo[0].'" class="forum-link">'.$lastThreadInfo[4].'</a>';
											$time = getTime($lastThreadInfo[1]);
											$queryAuthor = getAuthor($sql, $lastThreadInfo[3]);
											echo '<p class="post-info">By <span class="post-author">'.$queryAuthor.'</span> '.$time.'</p>';
										} else {
											echo '<p>'.$lastThreadInfo.'</p>';
										}
									echo '</div></td>';
								echo '</tr>';
							}
							echo '</table>';
						}
						function getAuthor($sql, $authorID) {
							$query = "SELECT * FROM user_info WHERE id='$authorID' LIMIT 1";
							$result = mysqli_query($sql, $query);
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									return $row['firstname'];
								}
							} else {
								return 'error (no author)';
							}
						}
						function getLastThread($sql, $category) {
							$query = "SELECT * FROM forum_category WHERE id='$category' LIMIT 1";
							$result = mysqli_query($sql, $query);
							$lastThreadInfo = array();
							while ($row = mysqli_fetch_assoc($result)) {
								if ($row['count'] > 0) {
									$queryThread = "SELECT * FROM forum_threads WHERE parent='$category' ORDER BY id DESC LIMIT 1";
									$resultThread = mysqli_query($sql, $queryThread);
									while ($rowThread = mysqli_fetch_array($resultThread)) {
										for ($x = 0; $x < 7; $x++) {
											array_push($lastThreadInfo, $rowThread[$x]);
										}
									}
									return $lastThreadInfo;
								} else {
									return 'There are no threads in this category';
								}
							}
						}
						function getLastComment($sql, $thread) {
							$query = "SELECT * FROM forum_threads WHERE id='$thread' LIMIT 1";
							$result = mysqli_query($sql, $query);
							$lastCommentInfo = array();
							while ($row = mysqli_fetch_assoc($result)) {
								if ($row['replies'] > 0) {
									$queryThread = "SELECT * FROM forum_replies WHERE parent='$thread' ORDER BY id DESC LIMIT 1";
									$resultThread = mysqli_query($sql, $queryThread);
									while ($rowThread = mysqli_fetch_array($resultThread)) {
										for ($x = 0; $x < 5; $x++) {
											array_push($lastCommentInfo, $rowThread[$x]);
										}
									}
									return $lastCommentInfo;
								} else {
									return 'There are no replies to this thread';
								}
							}
						}
						function getTime($epoch) {
							$curr = date('U');
							if ($epoch - $curr > 604800) {
								return date('M d, y', $epoch);
							} else {
								return date('D \a\t h:i a', $epoch);
							}
						}
					?>
					<!--Pretty much all of the below should be auto generated with PHP. Im just going to give you a framework-->
					<div class="thread-box">
						<h3 class="thread-title"></h3>
						<p class="thread-author"></p>
						<p class="thread-category"></p>
						<p class="thread-message">
							
						</p>
						<div class="thread-reply">
							
						</div>
						<div class="comment-box">
							<p class="comment-author"></p>
							<p class="comment-message">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>