<?php
require_once 'config.php';
require_once 'includes/functions.php';
session_start();
if(isEmployeeLoggedIn()) {
    redirectTo('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JC AUTO CENTER Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
	<div class="login-container">
            <div id="output"></div>
			
            <div><img src="img/lg.jpg" alt="Mountain View" style="width:200px;height:100px;" ></div>
			<div>JC AUTO CENTER Management System</div>
            <div class="form-box">
                <form action="do_login.php" method="post">
                    <input name="username" type="text" placeholder="Enter your username">
                    <input name="password" type="password" placeholder="Enter your password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>  
</div>  
    
<footer class="footer">
  <div class="container">
    <center><img src="img/hg.jpg" alt="Mountain View" style="width:1000px;height:300px;" ></center>  
    <div class="text-muted text-center">Copyright &copy; 2020 JC AUTO CENTER<br />Designed &amp; Developed by Management and Information Technology<br />SEUSL</div>
  </div>
</footer>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
