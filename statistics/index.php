<!DOCTYPE html>
<html>
	<head>
		<title>Bref-EDUCamps | Statistics</title>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/head.php"); ?>
		
	
		<?php 
			$sql;
			$sumr = 75;
			$wint = 45;
		
			$NYUquery = $sql->query("SELECT * FROM camp_info WHERE location = 'nyu'");
				while ($rows = $NYUquery->fetch_assoc())
				{
					$NYUcampLocation = $rows['location'];
					$NYUsummer1 = $sumr - $rows['summer1'];
					$NYUsummer2 = $sumr - $rows['summer2'];
					$NYUsummer3 = $sumr - $rows['summer3'];
					$NYUsummer4 = $sumr - $rows['summer4'];
					$NYUwinter1 = $wint - $rows['winter1'];
					$NYUwinter2 = $wint - $rows['winter2'];
				}
		
			$USCquery = $sql->query("SELECT * FROM camp_info WHERE location = 'usc'");
				while ($rows = $USCquery->fetch_assoc())
				{
					$USCcampLocation = $rows['location'];
					$USCsummer1 = $sumr - $rows['summer1'];
					$USCsummer2 = $sumr - $rows['summer2'];
					$USCsummer3 = $sumr - $rows['summer3'];
					$USCsummer4 = $sumr - $rows['summer4'];
					$USCwinter1 = $wint - $rows['winter1'];
					$USCwinter2 = $wint - $rows['winter2'];
				}
		
		
			$NWquery = $sql->query("SELECT * FROM camp_info WHERE location = 'NW'");
				while ($rows = $NWquery->fetch_assoc())
				{
					$NWcampLocation = $rows['location'];
					$NWsummer1 = $sumr - $rows['summer1'];
					$NWsummer2 = $sumr - $rows['summer2'];
					$NWsummer3 = $sumr - $rows['summer3'];
					$NWsummer4 = $sumr - $rows['summer4'];
					$NWwinter1 = $wint - $rows['winter1'];
					$NWwinter2 = $wint - $rows['winter2'];
			}
		
			$STANFORDquery = $sql->query("SELECT * FROM camp_info WHERE location = 'stanford'");
				while ($rows = $STANFORDquery->fetch_assoc())
				{
					$STANFORDcampLocation = $rows['location'];
					$STANFORDsummer1 = $sumr - $rows['summer1'];
					$STANFORDsummer2 = $sumr - $rows['summer2'];
					$STANFORDsummer3 = $sumr - $rows['summer3'];
					$STANFORDsummer4 = $sumr - $rows['summer4'];
					$STANFORDwinter1 = $wint - $rows['winter1'];
					$STANFORDwinter2 = $wint - $rows['winter2'];
				}
		
			$PHILMONTquery = $sql->query("SELECT * FROM camp_info WHERE location = 'philmont'");
				while ($rows = $PHILMONTquery->fetch_assoc())
				{
					$PHILMONTcampLocation = $rows['location'];
					$PHILMONTsummer1 = $sumr - $rows['summer1'];
					$PHILMONTsummer2 = $sumr - $rows['summer2'];
					$PHILMONTsummer3 = $sumr - $rows['summer3'];
					$PHILMONTsummer4 = $sumr - $rows['summer4'];
					//$PHILMONTwinter1 = $wint - $rows['winter1'];
					//$PHILMONTwinter2 = $wint - $rows['winter2'];
				}
		
			$MIAMIquery = $sql->query("SELECT * FROM camp_info WHERE location = 'miami'");
				while ($rows = $MIAMIquery->fetch_assoc())
				{
					$MIAMIcampLocation = $rows['location'];
					$MIAMIsummer1 = $sumr - $rows['summer1'];
					$MIAMIsummer2 = $sumr - $rows['summer2'];
					$MIAMIsummer3 = $sumr - $rows['summer3'];
					$MIAMIsummer4 = $sumr - $rows['summer4'];
					//$MIAMIwinter1 = $wint - $rows['winter1'];
					//$MIAMIwinter2 = $wint - $rows['winter2'];
				}
		
			$MITquery = $sql->query("SELECT * FROM camp_info WHERE location = 'mit'");
				while ($rows = $MITquery->fetch_assoc())
				{
					$MITcampLocation = $rows['location'];
					$MITsummer1 = $sumr - $rows['summer1'];
					$MITsummer2 = $sumr - $rows['summer2'];
					$MITsummer3 = $sumr - $rows['summer3'];
					$MITsummer4 = $sumr - $rows['summer4'];
					$MITwinter1 = $wint - $rows['winter1'];
					$MITwinter2 = $wint - $rows['winter2'];
				}
			
			$MEDECINEquery = $sql->query("SELECT * FROM camp_info WHERE location = 'medicine'");
				while ($rows = $MEDECINEquery->fetch_assoc())
				{
					$MEDECINEcampLocation = $rows['location'];
					$MEDECINEsummer1 = $sumr - $rows['summer1'];
					$MEDECINEsummer2 = $sumr - $rows['summer2'];
					$MEDECINEsummer3 = $sumr - $rows['summer3'];
					$MEDECINEsummer4 = $sumr - $rows['summer4'];
					//$MEDECINEwinter1 = $wint - $rows['winter1'];
					//$MEDECINEwinter2 = $wint - $rows['winter2'];
				}
		
			$WASHDCquery = $sql->query("SELECT * FROM camp_info WHERE location = 'washdc'");
				while ($rows = $WASHDCquery->fetch_assoc())
				{
					$WASHDCcampLocation = $rows['location'];
					$WASHDCsummer1 = $sumr - $rows['summer1'];
					$WASHDCsummer2 = $sumr - $rows['summer2'];
					$WASHDCsummer3 = $sumr - $rows['summer3'];
					$WASHDCsummer4 = $sumr - $rows['summer4'];
					$WASHDCwinter1 = $wint - $rows['winter1'];
					$WASHDCwinter2 = $wint - $rows['winter2'];
				}
		
				$totalSummer1 = $NYUsummer1 + $USCsummer1 + $NWsummer1 + $STANFORDsummer1 + $PHILMONTsummer1 + $MIAMIsummer1 + $MITsummer1 + $MEDECINEsummer1 + $WASHDCsummer1;
				$totalSummer2 = $NYUsummer2 + $USCsummer2 + $NWsummer2 + $STANFORDsummer2 + $PHILMONTsummer2 + $MIAMIsummer2 + $MITsummer2 + $MEDECINEsummer2 + $WASHDCsummer2;
				$totalSummer3 = $NYUsummer3 + $USCsummer3 + $NWsummer3 + $STANFORDsummer3 + $PHILMONTsummer3 + $MIAMIsummer3 + $MITsummer3 + $MEDECINEsummer3 + $WASHDCsummer3;
				$totalSummer4 = $NYUsummer4 + $USCsummer4 + $NWsummer4 + $STANFORDsummer4 + $PHILMONTsummer4 + $MIAMIsummer4 + $MITsummer4 + $MEDECINEsummer4 + $WASHDCsummer4;
				$totalWinter1 = $NYUwinter1 + $USCwinter1 + $NWwinter1 + $STANFORDwinter1 + $MITwinter1 + $WASHDCwinter1;
				$totalWinter2 = $NYUwinter2 + $USCwinter2 + $NWwinter2 + $STANFORDwinter2 + $MITwinter2 + $WASHDCwinter2;
		?>
		<script type="text/javascript">
  	window.onload = TOTAL;
		function TOTAL() {
			document.getElementById('stats-header').innerHTML = "Camp Stats (2017) - <strong>Totals</strong>";
			var val1 = <?php echo $totalSummer1; ?>;
			var val2 = <?php echo $totalSummer2; ?>;
			var val3 = <?php echo $totalSummer3; ?>;
			var val4 = <?php echo $totalSummer4; ?>;
			var val5 = <?php echo $totalWinter1; ?>;
			var val6 = <?php echo $totalWinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""   
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
			
		function NYU() {
			var school = "NYU";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $NYUsummer1; ?>;
			var val2 = <?php echo $NYUsummer2; ?>;
			var val3 = <?php echo $NYUsummer3; ?>;
			var val4 = <?php echo $NYUsummer4; ?>;
			var val5 = <?php echo $NYUwinter1; ?>;
			var val6 = <?php echo $NYUwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
 	 	}
			
		function USC() {
			var school = "USC";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $USCsummer1; ?>;
			var val2 = <?php echo $USCsummer2; ?>;
			var val3 = <?php echo $USCsummer3; ?>;
			var val4 = <?php echo $USCsummer4; ?>;
			var val5 = <?php echo $USCwinter1; ?>;
			var val6 = <?php echo $USCwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""   
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
		
		function NW() {
			var school = "Northwestern";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $NWsummer1; ?>;
			var val2 = <?php echo $NWsummer2; ?>;
			var val3 = <?php echo $NWsummer3; ?>;
			var val4 = <?php echo $NWsummer4; ?>;
			var val5 = <?php echo $NWwinter1; ?>;
			var val6 = <?php echo $NWwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""   
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
		
		function STANFORD() {
			var school = "Stanford";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $STANFORDsummer1; ?>;
			var val2 = <?php echo $STANFORDsummer2; ?>;
			var val3 = <?php echo $STANFORDsummer3; ?>;
			var val4 = <?php echo $STANFORDsummer4; ?>;
			var val5 = <?php echo $STANFORDwinter1; ?>;
			var val6 = <?php echo $STANFORDwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""   
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
		
		function PHILMONT() {
			var school = "Philmont";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $PHILMONTsummer1; ?>;
			var val2 = <?php echo $PHILMONTsummer2; ?>;
			var val3 = <?php echo $PHILMONTsummer3; ?>;
			var val4 = <?php echo $PHILMONTsummer4; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"}       
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
	
		function MIAMI() {
			var school = "Miami";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $MIAMIsummer1; ?>;
			var val2 = <?php echo $MIAMIsummer2; ?>;
			var val3 = <?php echo $MIAMIsummer3; ?>;
			var val4 = <?php echo $MIAMIsummer4; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"}       
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
	
		function MIT() {
			var school = "MIT";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $MITsummer1; ?>;
			var val2 = <?php echo $MITsummer2; ?>;
			var val3 = <?php echo $MITsummer3; ?>;
			var val4 = <?php echo $MITsummer4; ?>;
			var val5 = <?php echo $MITwinter1; ?>;
			var val6 = <?php echo $MITwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
	
		function MEDECINE() {
			var school = "School of Medecine";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $MEDECINEsummer1; ?>;
			var val2 = <?php echo $MEDECINEsummer2; ?>;
			var val3 = <?php echo $MEDECINEsummer3; ?>;
			var val4 = <?php echo $MEDECINEsummer4; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"}
        	//{y: val5,  label: "Winter 1"},
       	 	//{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  	}	
			
		function WASHDC() {
			var school = "Washington DC";
			document.getElementById('stats-header').innerHTML = "Camp Stats - <strong>" + school + "</strong>";
			var val1 = <?php echo $WASHDCsummer1; ?>;
			var val2 = <?php echo $WASHDCsummer2; ?>;
			var val3 = <?php echo $WASHDCsummer3; ?>;
			var val4 = <?php echo $WASHDCsummer4; ?>;
			var val5 = <?php echo $WASHDCwinter1; ?>;
			var val6 = <?php echo $WASHDCwinter2; ?>;
    	var chart = new CanvasJS.Chart("chartContainer",
    	{
      	title:{
        	text: ""    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Registered Campers"
      	},
      	legend: {
        	verticalAlign: "bottom",
        	horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [
      	{        
        	type: "column",  
        	showInLegend: true, 
        	legendMarkerColor: "white",
        	legendText: "Sessions",
        	dataPoints: [      
        	{y: val1, label: "Summer 1"},
        	{y: val2,  label: "Summer 2" },
        	{y: val3,  label: "Summer 3"},
        	{y: val4,  label: "Summer 4"},
        	{y: val5,  label: "Winter 1"},
       	 	{y: val6, label: "Winter 2"}        
        	]
      	}   
      	]
    	});
    chart.render();
  }
			
	</script>
	<script type="text/javascript" src="canvasjs.min.js"></script>
	</head>
	<body>
		<div id="page-wrapper">
			<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/header.php"); ?>
			<div id="content">
				<div class="container">
					<h2 class="section-header" id="stats-header">Please Enable Javascript</h2>
					<div id="stat-buttons">
						<span id="our-camps">Locations</span><br>
						<button type="button" class="stat-button" id="NYU" onclick="NYU()";>NYU</button><br>
						<button type="button" class="stat-button" id="USC" onclick="USC()";>USC</button><br>
						<button type="button" class="stat-button" id="NW" onclick="NW()";>Northwestern</button><br>
						<button type="button" class="stat-button" id="STANFORD" onclick="STANFORD()";>Stanford</button><br>
						<button type="button" class="stat-button" id="PHILMONT" onclick="PHILMONT()";>Philmont</button><br>
						<button type="button" class="stat-button" id="MIAMI" onclick="MIAMI()";>Miami</button><br>
						<button type="button" class="stat-button" id="MIT" onclick="MIT()";>MIT</button><br>
						<button type="button" class="stat-button" id="MEDECINE" onclick="MEDECINE()";>Medecine</button><br>
						<button type="button" class="stat-button" id="WASHDC" onclick="WASHDC()";>Washington DC</button><br><br>
						<button type="button" class="stat-button" id="TOTAL" onclick="TOTAL()";><strong>Total</strong></button>
					</div>
					<div id="chartContainer" style="height: 300px; width: 100;"></div>
				</div>
			</div>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT']."/projects/coen161/includes/footer.php"); ?>
	</body>
</html>