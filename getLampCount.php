<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT COUNT(DISTINCT lamp_name ) AS "Numbers"
        FROM `lamps`;';
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            echo $row['Numbers'];
          }
 mysqli_close($conn);
 ?>