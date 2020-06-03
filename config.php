<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '****');
define('DB_USERNAME', '****');
define('DB_PASSWORD', '****');
define('DB_NAME', '*****');
 
/* Attempt to connect to MySQL database */
$dbconnected = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($dbconnected === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?>
