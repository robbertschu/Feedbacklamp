<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql ="SELECT * FROM `lamps`";
$result = mysqli_query($conn, $sql);
echo '<table class="table table-borderless table-striped table-earning">';
    echo '<th>Lamp naam</th>'.'<th>Locatie</th>'.'<th>IP adres</th>';
 while($row = mysqli_fetch_array($result))
          {
            echo "<tr><td>".$row['lamp_name']."</td><td>".$row['location']."</td><td>".$row['IP']."</td><tr/>";
          }
echo '</table>';
 mysqli_close($conn);

?>