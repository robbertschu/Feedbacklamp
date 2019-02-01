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

$sql = "SELECT dbGem FROM `lampdata` WHERE lamp_name = '$lamp_name'
        ORDER by dateTime DESC
        LIMIT 60;";
$data = [];
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            array_push($data, $row['dbGem']);
          }
$x = 0;
$data = array_reverse($data);
foreach($data as $key => $value)
{
  if ($x != 59){
    echo $value . ',';
    $x = $x +1;
  }
  else {echo $value;}
}
 mysqli_close($conn);
 ?>