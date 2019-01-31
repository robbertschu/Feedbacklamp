<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM `lamps`';
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            echo'
                <li>
                    <a href="lamp.php?lamp='.$row['lamp_name'].'">'.$row['lamp_name'].'</a>
                </li>';
          }
 mysqli_close($conn);
 ?>