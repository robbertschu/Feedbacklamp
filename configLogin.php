<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '192.168.178.38');
define('DB_USERNAME', 'dbUser');
define('DB_PASSWORD', 'szpoofUXbk6Z30pR8no2');
define('DB_NAME', 'feedbacklamp');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>