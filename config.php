<?php 
// define('DB_HOST'    , 'localhost'); 
// define('DB_USERNAME', 'techadopter_post'); 
// define('DB_PASSWORD', 'techadopter_post'); 
// define('DB_NAME'    , 'techadopter_post');

define('DB_HOST'    , 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME'    , 'safeboat');
define('POST_DATA_URL', 'ENTvrt_safeboatER_YOUR_DOMAIN_NAME/sensordata.php');

//PROJECT_API_KEY is the exact duplicate of, PROJECT_API_KEY in NodeMCU sketch file
//Both values must be same
define('PROJECT_API_KEY', 'WHATEVER_YOU_LIKE');


//set time zone for your country
date_default_timezone_set('Africa/cairo');

// Connect with the database 
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
// Display error if failed to connect 
if ($db->connect_errno) { 
    echo "Connection to database is failed: ".$db->connect_error;
    exit();
}
