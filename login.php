<?php
$root = $_SERVER["DOCUMENT_ROOT"] ;
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /Feedbacklamp/dashboard/index.php");
    exit;
}
 
// Include config file
require_once "configLogin.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: /Feedbacklamp/dashboard/index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="/Feedbacklamp/dashboard/css/font-face.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/Feedbacklamp/dashboard/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/Feedbacklamp/dashboard/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/Feedbacklamp/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/Feedbacklamp/dashboard/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/Feedbacklamp/dashboard/images/icon/logo.png" alt="HU">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <br><br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/Feedbacklamp/dashboard/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/Feedbacklamp/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/Feedbacklamp/dashboard/vendor/slick/slick.min.js">
    </script>
    <script src="/Feedbacklamp/dashboard/vendor/wow/wow.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/animsition/animsition.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/Feedbacklamp/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/Feedbacklamp/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/Feedbacklamp/dashboard/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/Feedbacklamp/dashboard/js/main.js"></script>

</body>

</html>
<!-- end document-->
