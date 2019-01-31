<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";
$lamp_name = $_GET["lamp"];

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql ="SELECT * FROM `lampdata` 
WHERE lamp_name = '$lamp_name'
ORDER BY dateTime DESC
LIMIT 1;";
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
          echo '<h1>'.$row['lamp_name'].'</h1>';
          echo '<i class="fa fa-lightbulb-o" id="'. $row['lamp_state'] .'"></i>';
          echo '<br><br>';
          echo $row['dbGem'].' dB';
          }
 mysqli_close($conn);

?>