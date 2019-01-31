<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ROUND(AVG(`dbGem`),1) AS 'dbAVG' FROM lampdata
        ORDER BY dateTime DESC 
        LIMIT 25;";
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            echo $row['dbAVG'];
          }
 mysqli_close($conn);
 ?>