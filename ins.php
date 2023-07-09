     <!--echo 'Error inserting data: ';-->
     <?php

// Connect to MySQL database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'safeboat';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// Handle GET request to fetch data
    $sn = $_GET['sn'];
    $emergance = $_GET['emergance'];
    $water_level = $_GET['water_level'];
    $wter_presence = $_GET['wter_presence'];
    $long_str = $_GET['lng_str'];
    $lat_str = $_GET['lat_str'];
    $speed = $_GET['speed'];
    if(empty($speed)){
       $speed=0.1; 
    }
     

    $sql = "INSERT INTO data (`Sn`, `speed`,`lat_str`, `long_str`, `water_level`, `wter_presence`,`emeragance`) 
                    VALUES('$sn', '$speed', '$lat_str', '$long_str', '$water_level','$wter_presence','$emergance')";

    if ($conn->query($sql) === TRUE) {
        // http_response_code(201);
        // echo 'Data inserted successfully';
    } else {
        // http_response_code(500);
       //  echo 'Error inserting data: ' . $conn->error;
    }


// Close database connection
$conn->close();

?>
