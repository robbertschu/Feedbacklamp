<?php
// Initialize the session
$root = $_SERVER["DOCUMENT_ROOT"] ;
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: $root/Feedbacklamp/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        
#divtoBlink {
    width:200px;
    height:40px;
    background-color:#627BAE;
    position:absolute;
    left:42%;
    font-size:20px;
}
#Groen {
    font-size:150px;
    color:green;
}

#Geel {
    font-size:150px;
    color:yellow;
}

#Rood {
    font-size:150px;
    color:red;
}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welkom bij de HU Feedbacklamp dashboard!</h1>
    </div>
    
    <p>
        <a href="/Feedbacklamp/reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="/Feedbacklamp/logout.php" class="btn btn-danger">Sign Out of Your Account</a>';
    </p>
</body>
</html>