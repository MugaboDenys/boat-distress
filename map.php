

<?php
 $con = mysqli_connect('localhost','root','','tech-adopter');
?>
<!--<!DOCTYPE HTML>-->
<!--<html>-->
<!--<head>-->
 <!--<meta charset="utf-8">-->
 <!--<title>LINE</title>-->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js">
  <script type="text/javascript">
    setInterval("my_function();",5000); 
    function my_function(){
      $('#refresh').load(location.href + ' #columnchart12');
    }
  </script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() 
 {
 var data = google.visualization.arrayToDataTable([
 ['TIME','TEMPERATURE','THRESHOLD'],
<?php 
$SDD=27;
			$query = "SELECT * FROM `data`";
			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)
			 ){
			 echo "['".substr($row['due'],0,20)."',".$row['speed'].",$SDD],";
			 }
			 ?> 
 ]);
 var options = {
          title: 'TEMPERATURE INSIDE MAIZE STORE  ',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 var chart = new google.visualization.GaugeChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
</script>
<div id="refresh"></div>


 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>
 </div>
<!--</body>-->
<!--</ht  </divml>-->