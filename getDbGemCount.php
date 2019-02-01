<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COUNT(`dbGem`) AS countDbGem FROM lampdata ";

$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            echo $row['countDbGem'];
          }
 mysqli_close($conn);
 ?>