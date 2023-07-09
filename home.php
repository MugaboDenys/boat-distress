<?php
//-------------------------------------------------------------------------------------------
require 'config.php';


	//$rows = $result->fetch_assoc();
	//$rows = $result -> fetch_all(MYSQLI_ASSOC);

//$row = get_temperature();
//print_r($row);

//header('Content-Type: application/json');
//echo json_encode($rows);
//-------------------------------------------------------------------------------------------
?>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
.chart {
  width: 100%; 
  min-height: 400px;
  font-size:11px;
}
.row {
  margin:0 !important;
}
</style>
<script>
$(document).ready(function() {
    $("#myDiv").load("status.php");
    var refreshId = setInterval(function() {
        $("#myDiv").load('status.php?randval='+ Math.random());
    }, 1000);
});
</script>
<!--</head>-->
<!--<body style="font-size:11px" >-->
<section id="rent" class="appointment section-bg">
<div class="container" data-aos="fade-up">
<div class="row">
<div class="clearfix"></div>
<div class="col-md-7">
	<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2151.951814268522!2d30.100001332028203!3d-1.9834421387122856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwNTknMDEuMyJTIDMwwrAwNicwNC4yIkU!5e1!3m2!1sen!2srw!4v1681819620919!5m2!1sen!2srw" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
  



<div class="col-md-5" id="myDiv">
 
 
 
</div>
</div>
</div>



<!-- ---------------------------------------------------------------------------------------- -->
 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
//$(document).ready(function(){
//-------------------------------------------------------------------------------------------------
google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawTemperatureChart);
//-------------------------------------------------------------------------------------------------
function drawTemperatureChart() {
	//guage starting values
	var data = google.visualization.arrayToDataTable([
		['Label', 'Value'],
		['speed', 0],
	]);
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	var options = {
		width: 		900, 
		height: 	400,
		redFrom: 	79, 
		redTo:		140,
		yellowFrom:	40, 
		yellowTo: 	79,
		greenFrom:	0, 
		greenTo: 	40,
		minorTicks: 150
	};
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	var chart = new google.visualization.Gauge(document.getElementById('chart_temperature'));
	chart.draw(data, options);
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
	function refreshData () {
		$.ajax({
			url: 'getdata.php',
			// use value from select element
			data: 'q=' + $("#users").val(),
			dataType: 'json',
			success: function (responseText) {
				//______________________________________________________________
				//console.log(responseText);
				var var_temperature = parseFloat(responseText.speed).toFixed(2)
				//console.log(var_temperature);
				// use response from php for data table
				//______________________________________________________________
				//guage starting values
				var data = google.visualization.arrayToDataTable([
					['Label', 'Value'],
					['speed', eval(var_temperature)],
				]);
				//______________________________________________________________
				//var chart = new google.visualization.Gauge(document.getElementById('chart_temperature'));
				chart.draw(data, options);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown + ': ' + textStatus);
			}
		});
    }
	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// refreshData();
	
	setInterval(refreshData, 100);
}
//-------------------------------------------------------------------------------------------------



//-------------------------------------------------------------------------------------------------
// google.charts.load('current', {'packages':['gauge']});
// google.charts.setOnLoadCallback(drawHumidityChart);
// //-------------------------------------------------------------------------------------------------
// function drawHumidityChart() {
// 	//guage starting values
// 	var data = google.visualization.arrayToDataTable([
// 		['Label', 'Value'],
// 		['LIMIT SPEED', 0],
// 	]);
// 	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 	var options = {
// 		width: 		1400, 
// 		height: 	380,
// 		redFrom: 	70, 
// 		redTo:		160,
// 		yellowFrom:	40, 
// 		yellowTo: 	70,
// 		greenFrom:	00, 
// 		greenTo: 	40,
// 		minorTicks: 5
// 	};
// 	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 	var chart = new google.visualization.Gauge(document.getElementById('chart_humidity'));
// 	chart.draw(data, options);
// 	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

//SELECT `id`, `device_serial`, `temperarture`, `humidity`, `cooler`, `heater`, `weevils`, `time` FROM `data` WHERE 1

// 	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 	function refreshData () {
// 		$.ajax({
// 			url: 'getdata.php',
// 			// use value from select element
// 			data: 'q=' + $("#users").val(),
// 			dataType: 'json',
// 			success: function (responseText) {
// 				//______________________________________________________________
// 				//console.log(responseText);
// 				var var_humidity = parseFloat(responseText.humidity).toFixed(2)
// 				//console.log(var_temperature);
// 				// use response from php for data table
// 				//______________________________________________________________
// 				//guage starting values
// 				var data = google.visualization.arrayToDataTable([
// 					['Label', 'Value'],
// 					['LIMIT SPEED', eval(var_humidity)],
// 				]);
// 				//______________________________________________________________
// 				//var chart = new google.visualization.Gauge(document.getElementById('chart_temperature'));
// 				chart.draw(data, options);
// 			},
// 			error: function(jqXHR, textStatus, errorThrown) {
// 				console.log(errorThrown + ': ' + textStatus);
// 			}
// 		});
//     }
// 	//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
// 	//refreshData();
// 	setInterval(refreshData, 1000);
// }
//-------------------------------------------------------------------------------------------------
//});
$(window).resize(function(){
  drawTemperatureChart();
  drawHumidityChart();
});
</script>
<!-- --------------------------------------------------------------------- -->
<!--</body>-->
<!--</html>-->
