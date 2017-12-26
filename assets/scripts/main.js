window.onload = function() {
	function checkEmail(email) {
		var reg = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
		return reg.test(email);
	}
	function leapYear(year) {
 		 return ((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0);
	}
	if (document.getElementById("menu-icon") != null) {
		document.getElementById("menu-icon").addEventListener("click", function(e) {
			document.getElementById("menu-icon-box").classList.toggle("clicked");
		    document.getElementById("menu").classList.toggle('show')
		});
	}
	if (document.getElementById("login") != null) {
		if (loggedIn == false) {
			if (validLogin == false) {
				document.getElementById("login-window").style.display = 'block';
			}
			document.getElementById("login-btn").addEventListener("click", function(e) {
		    	document.getElementById("login-window").style.display = 'block';
			});
			if (document.getElementById("login-btn-mem") != null) {
				document.getElementById("login-btn-mem").addEventListener("click", function(e) {
		    		document.getElementById("login-window").style.display = 'block';
				});
			}
			if (document.getElementById("forumLogin") != null) {
				document.getElementById("forumLogin").addEventListener("click", function(e) {
		    		document.getElementById("login-window").style.display = 'block';
				});
			}
			if (document.getElementById("registerLogin") != null) {
				document.getElementById("registerLogin").addEventListener("click", function(e) {
		    		document.getElementById("login-window").style.display = 'block';
				});
			}
		} else {
			document.getElementById("login-btn").addEventListener("click", function(e) {
		    	document.getElementById("login-window").style.display = 'none';
			});
		}
		document.getElementById("login-close-btn").addEventListener("click", function(e) {
		    document.getElementById("login-window").style.display = 'none';
		});
		document.getElementById("login-cancel-btn").addEventListener("click", function(e) {
		    document.getElementById("login-window").style.display = 'none';
		});
		document.getElementById("login-submit").addEventListener("click", function(e) {
			var valid = true;
			var email = document.getElementById("login-email").value;
			var password = document.getElementById("login-password").value;
			document.getElementById("login-emailErr").innerHTML = "<?php echo $emailErr; ?>";
			document.getElementById("login-passwordErr").innerHTML = "<?php echo $passwordErr; ?>";
			if (email === '') {
				document.getElementById("login-emailErr").innerHTML = "You must enter an email";
				valid = false;
			} else if (!checkEmail(email)) {
				document.getElementById("login-emailErr").innerHTML = "You must enter a valid email";
				valid = false;
			}
			if (password === '') {
				document.getElementById("login-passwordErr").innerHTML = "You must enter your password";
				valid = false;
			}
			if (!valid) {
				e.preventDefault();
			} else {
				document.forms["login-form"].submit();
			}
		});
	}
	if (document.getElementById("account-form") != null) {
		document.getElementById("account-submit").addEventListener("click", function(e) {
			var valid = true;
			var fname = document.getElementById("parent-fname").value;
			var lname = document.getElementById("parent-lname").value;
			var email = document.getElementById("parent-email").value;
			var email2 = document.getElementById("parent-email2").value;
			var uname = document.getElementById("parent-uname").value;
			var tel = document.getElementById("parent-tel").value;
			var pass = document.getElementById("parent-pass").value;
			var pass2 = document.getElementById("parent-pass2").value;
			document.getElementById("parent-nameErr").innerHTML = "<?php echo $pNameErr; ?>";
			document.getElementById("parent-emailErr").innerHTML = "<?php echo $pEmailErr; ?>";
			document.getElementById("parent-unameErr").innerHTML = "<?php echo $pUnameErr; ?>";
			document.getElementById("parent-telErr").innerHTML = "<?php echo $pTelErr; ?>";
			document.getElementById("parent-passErr").innerHTML = "<?php echo $pPassErr; ?>";
			if (fname === '' && lname === '') {
				document.getElementById("parent-nameErr").innerHTML = "You must enter your first and last name";
				valid = false;
			} else if (fname === '') {
				document.getElementById("parent-nameErr").innerHTML = "You must enter your first name";
				valid = false;
			} else if (lname === '') {
				document.getElementById("parent-nameErr").innerHTML = "You must enter your last name";
				valid = false;
			}
			if (email === '' || email2 === '') {
				document.getElementById("parent-emailErr").innerHTML = "You must enter your email twice";
				valid = false;
			} else if (!checkEmail(email) || !checkEmail(email2)) {
				document.getElementById("parent-emailErr").innerHTML = "You must enter a valid email";
				valid = false;
			} else if (email !== email2) {
				document.getElementById("parent-emailErr").innerHTML = "Both email addresses must be the same";
				valid = false;
			}
			if (uname === '') {
				document.getElementById("parent-unameErr").innerHTML = "You must enter a username";
				valid = false;
			}
			if (tel === '') {
				document.getElementById("parent-telErr").innerHTML = "You must enter your telephone number";
				valid = false;
			} else if (tel.length != 10) {
				document.getElementById("parent-telErr").innerHTML = "You must enter a valid US phone number (10 Digits)";
				valid = false;
			}
			if (pass === '' || pass2 === '') {
				document.getElementById("parent-passErr").innerHTML = "You must enter your password twice";
				valid = false;
			} else if (pass !== pass2) {
				document.getElementById("parent-passErr").innerHTML = "Both passwords must be the same";
			}
			if (!valid) {
				e.preventDefault();
			} else {
				document.forms["account-form"].submit();
			}
		});
	}
	if (document.getElementById("register-form") != null) {
		document.getElementById("r-loc1").disabled = false;
		document.getElementById("r-loc2").disabled = false;
		document.getElementById("r-loc3").disabled = false;
		document.getElementById("r-loc4").disabled = false;
		document.getElementById("r-loc5").disabled = true;
		document.getElementById("r-loc6").disabled = true;
		document.getElementById("r-loc7").disabled = false;
		document.getElementById("r-loc8").disabled = true;
		document.getElementById("r-loc9").disabled = false;
		$('#register-form').on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) { 
				e.preventDefault();
				return false;
			}
		});
		document.getElementById("register-submit").addEventListener("click", function(e) {
			var valid = true;
			var fname = document.getElementById("register-fname").value;
			var lname = document.getElementById("register-lname").value;
			var dobM = document.getElementById("register-dobM").selectedIndex;
			var dobD = document.getElementById("register-dobD").selectedIndex;
			var dobY = document.getElementById("register-dobY").selectedIndex;
			var gendM = document.getElementById("register-gendM");
			var gendF = document.getElementById("register-gendF");
			var school = document.getElementById("register-school").value;
			var grade = document.getElementById("register-grade").value;
			var loc = document.getElementById("register-loc").selectedIndex;
			var s1 = document.getElementById("register-s1");
			var s2 = document.getElementById("register-s2");
			var s3 = document.getElementById("register-s3");
			var s4 = document.getElementById("register-s4");
			var w1 = document.getElementById("register-w1");
			var w2 = document.getElementById("register-w2");
			document.getElementById("rbtn1").checked = false;
			document.getElementById("rbtn2").checked = false;
			document.getElementById("register-nameErr").innerHTML = "<?php echo $rNameErr; ?>";
			document.getElementById("register-dobErr").innerHTML = "<?php echo $rDoBErr; ?>";
			document.getElementById("register-gendErr").innerHTML = "<?php echo $rGendErr; ?>";
			document.getElementById("register-schoolErr").innerHTML = "<?php echo $rSchErr; ?>";
			document.getElementById("register-specErr").innerHTML = "<?php echo $rSpecErr; ?>";
			document.getElementById("register-locErr").innerHTML = "<?php echo $rLocErr; ?>";
			document.getElementById("register-sessErr").innerHTML = "<?php echo $rSessErr; ?>";
			if (fname === '' && lname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's first and last name";
				valid = false;
			} else if (fname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's first name";
				valid = false;
			} else if (lname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's last name";
				valid = false;
			}
			dobY += 1997;
			var leapyear = leapYear(dobY);
			if (dobM === 0 || dobD === 0 || dobY === 0) {
				document.getElementById("register-dobErr").innerHTML = "You must enter your child's full birthday";
				valid = false;
			} else if (leapyear && dobM === 2 && dobD > 29) {
				document.getElementById("register-dobErr").innerHTML = "There are only 29 days in this month";
				valid = false;
			} else if (!leapyear && dobM === 2 && dobD > 28) {
				document.getElementById("register-dobErr").innerHTML = "There are only 28 days in this month";
				valid = false;
			} else if (dobD > 30 && (dobM === 4 || dobM === 6 || dobM === 9 || dobM === 11)) {
				document.getElementById("register-dobErr").innerHTML = "There are only 30 days in this month";
				valid = false;
			}
			if (gendM.checked === false && gendF.checked === false) {
				document.getElementById("register-gendErr").innerHTML = "You must enter your child's gender";
				valid = false;
			}
			if (school === '' || grade === '') {
				document.getElementById("register-schoolErr").innerHTML = "You must enter your child's school information";
				valid = false;
			} else if (grade.match(/[a-z]/i)) {
				document.getElementById("register-schoolErr").innerHTML = "Your child must be in grade 1-12";
				valid = false;
			}
			if (loc === 0) {
				document.getElementById("register-locErr").innerHTML = "You must select a camp location to proceed";
				valid = false;
			}
// 			if (s1.checked === false || s2.checked === false || s3.checked === false || s4.checked === false || w1.checked === false || w2.checked === false) {
// 				document.getElementById("register-sessErr").innerHTML = "You must select at least 1 camp session";
// 				valid = false;
// 			}
			if (!valid) {
				e.preventDefault();
			} else {
				document.getElementById("rbtn1").checked = true;
				document.forms["register-form"].submit();
			}
		});
		document.getElementById("register-submit-add").addEventListener("click", function(e) {
			var valid = true;
			var fname = document.getElementById("register-fname").value;
			var lname = document.getElementById("register-lname").value;
			var dobM = document.getElementById("register-dobM").selectedIndex;
			var dobD = document.getElementById("register-dobD").selectedIndex;
			var dobY = document.getElementById("register-dobY").selectedIndex;
			var gendM = document.getElementById("register-gendM");
			var gendF = document.getElementById("register-gendF");
			var school = document.getElementById("register-school").value;
			var grade = document.getElementById("register-grade").value;
			var loc = document.getElementById("register-loc").selectedIndex;
			var s1 = document.getElementById("register-s1");
			var s2 = document.getElementById("register-s2");
			var s3 = document.getElementById("register-s3");
			var s4 = document.getElementById("register-s4");
			var w1 = document.getElementById("register-w1");
			var w2 = document.getElementById("register-w2");
			document.getElementById("rbtn1").checked = false;
			document.getElementById("rbtn2").checked = false;
			document.getElementById("register-nameErr").innerHTML = "<?php echo $rNameErr; ?>";
			document.getElementById("register-dobErr").innerHTML = "<?php echo $rDoBErr; ?>";
			document.getElementById("register-gendErr").innerHTML = "<?php echo $rGendErr; ?>";
			document.getElementById("register-schoolErr").innerHTML = "<?php echo $rSchErr; ?>";
			document.getElementById("register-specErr").innerHTML = "<?php echo $rSpecErr; ?>";
			document.getElementById("register-locErr").innerHTML = "<?php echo $rLocErr; ?>";
			document.getElementById("register-sessErr").innerHTML = "<?php echo $rSessErr; ?>";
			if (fname === '' && lname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's first and last name";
				valid = false;
			} else if (fname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's first name";
				valid = false;
			} else if (lname === '') {
				document.getElementById("register-nameErr").innerHTML = "You must enter your child's last name";
				valid = false;
			}
			dobY += 1997;
			var leapyear = leapYear(dobY);
			if (dobM === 0 || dobD === 0 || dobY === 0) {
				document.getElementById("register-dobErr").innerHTML = "You must enter your child's full birthday";
				valid = false;
			} else if (leapyear && dobM === 2 && dobD > 29) {
				document.getElementById("register-dobErr").innerHTML = "There are only 29 days in this month";
				valid = false;
			} else if (!leapyear && dobM === 2 && dobD > 28) {
				document.getElementById("register-dobErr").innerHTML = "There are only 28 days in this month";
				valid = false;
			} else if (dobD > 30 && (dobM === 4 || dobM === 6 || dobM === 9 || dobM === 11)) {
				document.getElementById("register-dobErr").innerHTML = "There are only 30 days in this month";
				valid = false;
			}
			if (gendM.checked === false && gendF.checked === false) {
				document.getElementById("register-gendErr").innerHTML = "You must enter your child's gender";
				valid = false;
			}
			if (school === '' || grade === '') {
				document.getElementById("register-schoolErr").innerHTML = "You must enter your child's school information";
				valid = false;
			} else if (grade.match(/[a-z]/i)) {
				document.getElementById("register-schoolErr").innerHTML = "Your child must be in grade 1-12";
				valid = false;
			}
			if (loc === 0) {
				document.getElementById("register-locErr").innerHTML = "You must select a camp location to proceed";
				valid = false;
			}
// 			if (s1.checked === false || s2.checked === false || s3.checked === false || s4.checked === false || w1.checked === false || w2.checked === false) {
// 				document.getElementById("register-sessErr").innerHTML = "You must select at least 1 camp session";
// 				valid = false;
// 			}
			if (!valid) {
				e.preventDefault();
			} else {
				document.getElementById("rbtn2").checked = true;
				document.forms["register-form"].submit();
			}
		});
		document.getElementById("register-specB").addEventListener("click", function() {
			if (document.getElementById("register-specB").checked === true) {
				document.getElementById("register-spec").style.display = "block";
			} else {
				document.getElementById("register-spec").style.display = "none";
			}
		});
		document.getElementById("r-act1").addEventListener("change", function() {
			document.getElementById("r-loc1").disabled = false;
			document.getElementById("r-loc2").disabled = false;
			document.getElementById("r-loc3").disabled = false;
			document.getElementById("r-loc4").disabled = false;
			document.getElementById("r-loc5").disabled = true;
			document.getElementById("r-loc6").disabled = true;
			document.getElementById("r-loc7").disabled = false;
			document.getElementById("r-loc8").disabled = true;
			document.getElementById("r-loc9").disabled = false;
		});
		document.getElementById("r-act2").addEventListener("change", function() {
			document.getElementById("r-loc1").disabled = false;
			document.getElementById("r-loc2").disabled = false;
			document.getElementById("r-loc3").disabled = false;
			document.getElementById("r-loc4").disabled = false;
			document.getElementById("r-loc5").disabled = true;
			document.getElementById("r-loc6").disabled = true;
			document.getElementById("r-loc7").disabled = false;
			document.getElementById("r-loc8").disabled = true;
			document.getElementById("r-loc9").disabled = false;
		});
		document.getElementById("r-act3").addEventListener("change", function() {
			document.getElementById("r-loc1").disabled = true;
			document.getElementById("r-loc2").disabled = true;
			document.getElementById("r-loc3").disabled = true;
			document.getElementById("r-loc4").disabled = true;
			document.getElementById("r-loc5").disabled = false;
			document.getElementById("r-loc6").disabled = false;
			document.getElementById("r-loc7").disabled = true;
			document.getElementById("r-loc8").disabled = false;
			document.getElementById("r-loc9").disabled = true;
		});
	}
	if (document.getElementById("thread") != null) {
		if (document.getElementById("thread-reply") != null) {
			document.getElementById("text-reply").addEventListener("click", function(e) {
				document.getElementById("text-reply").focus();
				document.getElementById("replyErr").style.display = "block";
				document.getElementById("btn-reply").style.display = "block";
				document.getElementById("btn-reply-cancel").style.display = "block";
				document.getElementById("thread-reply").style.paddingBottom = "40px";
			});
			document.getElementById("btn-reply").addEventListener("click", function(e) {
				var valid = true;
				var message = document.getElementById("text-reply").value;
				document.getElementById("replyErr").innerHTML = "<?php echo $replyErr; ?>";
				if (message === '') {
					valid = false;
					document.getElementById("text-reply").blur();
					document.getElementById("replyErr").style.display = "none";
					document.getElementById("btn-reply").style.display = "none";
					document.getElementById("btn-reply-cancel").style.display = "none";
					document.getElementById("thread-reply").style.paddingBottom = "15px";
				}
				if (!valid) {
					e.preventDefault();
				} else {
					document.forms["thread-reply"].submit();
				}
			});
			document.getElementById("btn-reply-cancel").addEventListener("click", function(e) {
				e.preventDefault();
				document.getElementById("text-reply").blur();
				document.getElementById("replyErr").style.display = "none";
				document.getElementById("btn-reply").style.display = "none";
				document.getElementById("btn-reply-cancel").style.display = "none";
				document.getElementById("thread-reply").style.paddingBottom = "15px";
			});
		}
	}
	if (document.getElementById("newThreadBtn") != null) {
		document.getElementById("newThreadBtn").addEventListener("click", function(e) {
			window.location = "/projects/coen161/forums/index.php?thread=0";
		});
	}
	if (document.getElementById("create-thread") != null) {
		document.getElementById("newPost-btn").addEventListener("click", function(e) {
			var valid = true;
			var title = document.getElementById("newPost-title").value;
			var message = document.getElementById("newPost-message").value;
			var category = document.getElementById("newPost-category").selectedIndex;
			document.getElementById("newPost-titleErr").innerHTML = "<?php echo $titleErr; ?>";
			document.getElementById("newPost-messageErr").innerHTML = "<?php echo $titleErr; ?>";
			document.getElementById("newPost-categoryErr").innerHTML = "<?php echo $titleErr; ?>";
			if (title === '' && message === '' && category === 0) {
				valid = false;
				document.getElementById("newPost-titleErr").innerHTML = "You must specify a thread title";
				document.getElementById("newPost-messageErr").innerHTML = "You must have a thread";
				document.getElementById("newPost-categoryErr").innerHTML = "You must specify a thread category";
			} else if (title === '') {
				document.getElementById("newPost-titleErr").innerHTML = "You must specify a thread title";
				valid = false;
			} else if (message === '') {
				document.getElementById("newPost-messageErr").innerHTML = "You must have a thread";
				valid = false;
			} else if (category === 0) {
				document.getElementById("newPost-categoryErr").innerHTML = "You must specify a thread category";
				valid = false;
			}
			if (!valid) {
				e.preventDefault();
			} else {
				document.forms["create-thread"].submit();
			}
		});
	}
		
	var loginWinPop = document.getElementById('login-window');
	window.onclick = function(e) {
    	if (event.target == loginWinPop) {
       		document.getElementById("login-window").style.display = 'none';
   		}
	}
}
