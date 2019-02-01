 <?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
include $root."/Feedbacklamp/config.php";

// Database verbinding maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql ='SELECT DISTINCT(Count(lamp_state)) AS "lamp_states" FROM `lampdata` WHERE lamp_state = "Groen"
       UNION
       SELECT DISTINCT(Count(lamp_state)) FROM `lampdata` WHERE lamp_state = "Geel"
       UNION
       SELECT DISTINCT(Count(lamp_state)) FROM `lampdata` WHERE lamp_state = "Rood";';
$x = 0;
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result))
          {
            $x = $x +1;
            if ($x != 3){
                echo $row['lamp_states'].',';
            }
            else{
                echo $row['lamp_states'];
            }
          }         
 mysqli_close($conn);

?>