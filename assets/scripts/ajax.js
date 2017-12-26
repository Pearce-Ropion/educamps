$(document).ready(function() {
	$(".register-loc-input").change(function(e) {
		var location = this.selectedIndex;
		if (location === 0) {
			this.selectedIndex = 1;
			location = 1;
		}
		var date = new Date();
		var year = date.getFullYear;
		$.ajax({
			type: 'GET',
			url: '/projects/coen161/register/campdata.php',
			cache: false,
			data: 'camp=' + location + '&year=' + year,
			dataType: 'json',
			success: function(campdata) {
				$("#sprice").html("$"+campdata[0]);
				$("#wprice").html("$"+campdata[1]);
				if (campdata[2] <= 0) { $("#register-s1").attr("disabled", true); } else { $("#register-s1").removeAttr("disabled"); }
				if (campdata[3] <= 0) { $("#register-s2").attr("disabled", true); } else { $("#register-s2").removeAttr("disabled"); }
				if (campdata[4] <= 0) { $("#register-s3").attr("disabled", true); } else { $("#register-s3").removeAttr("disabled"); }
				if (campdata[5] <= 0) { $("#register-s4").attr("disabled", true); } else { $("#register-s4").removeAttr("disabled"); }
				if (campdata[6] <= 0) { $("#register-w1").attr("disabled", true); } else { $("#register-w1").removeAttr("disabled"); }
				if (campdata[7] <= 0) { $("#register-w2").attr("disabled", true); } else { $("#register-w2").removeAttr("disabled"); }
			},
		});
	});
	$("#cal-loc").change(function(e) {
		var location = this.selectedIndex;
		if (location === 0) {
			this.selectedIndex = 1;
			location = 1;
		}
		var date = new Date();
		var year = date.getFullYear;
		var x;
		$.ajax({
			type: 'GET',
			url: '/projects/coen161/register/campdata.php',
			cache: false,
			data: 'camp=' + location + '&year=' + year,
			dataType: 'json',
			success: function(campdata) {
				for (x = 1; x <= 6; x++) {
					$("#cal-priceTag"+x).html("$"+campdata[0]);
					if (x === 5 || x === 6) {
						$("#cal-priceTag"+x).html("$"+campdata[1]);
					}
					if (campdata[x+1] <= 0) { 
						$("#cal-avail"+x).html("Registration Closed");
						$("#cal-avail"+x).addClass("cal-not-availText");
						$("#cal-avail"+x).removeClass("cal-availText");
						$("#cal-btn"+x).html("Closed");
						$("#cal-btn"+x).css("background-color", "#A8A8A8");
						$("#cal-btn"+x).css("cursor", "default");
						$("#cal-btn"+x).attr("href", "#");
					} else {
						$("#cal-avail"+x).html("Still Available");
						$("#cal-avail"+x).addClass("cal-availText");
						$("#cal-avail"+x).removeClass("cal-not-availText");
						$("#cal-btn"+x).html("Register Now");
						$("#cal-btn"+x).css("background-color", "#009933");
						$("#cal-btn"+x).css("cursor", "pointer");
						$("#cal-btn"+x).attr("href", "/projects/coen161/register/");
					}
				}
			},
		});
	});
});