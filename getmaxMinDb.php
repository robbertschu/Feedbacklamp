<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT MAX(`dbGem`) AS "maxMin" FROM lampdata
        UNION
        SELECT MIN(`dbGem`) FROM lampdata;';
$result = mysqli_query($conn, $sql);
$data = [];
 while($row = mysqli_fetch_array($result))
    {
     array_push($data,$row['maxMin']);
    }

echo $data[0].'/'.$data[1];
 mysqli_close($conn);
 ?>