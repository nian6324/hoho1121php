<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
        exit;
   }
?>

<?php //https://www.youtube.com/watch?v=X4KtW0hDx_Q
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
	?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		</style>
		
		<title>Home : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>
		<h2>~DB 2020~</h2> <!--NodeMCU V3 ESP8266 / ESP12E with MYSQL Database -->
		<ul class="topnav">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="unusual_user_data.php">Unusual user data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="live_temp_data.php">Live Temp</a></li>
			<li><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></li>
			<li><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></li>
		</ul>
		<br>
		<h3>Welcome to Employee DB with temp data!!</h3> <!-- Welcome to NodeMCU V3 ESP8266 / ESP12E with MYSQL Database -->		
		<!--img src="home ok ok.jpg" alt="" style="width:55%;"-->
	<!--iframe src="https://www.atlistmaps.com/map/73d7073d-8b34-4543-b958-10f829c3d4da?share=true" allow="geolocation" width="55%" height="400px"></iframe-->
<iframe src="https://www.atlistmaps.com/map/ad9aeb61-57e2-4b30-93dc-ca2a2fd612ed?share=true" allow="geolocation" width="60%" height="400px" frameborder="0" scrolling="no"></iframe>
	</body>
</html>
