<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	        exit;
}
?>



<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	//$sql_update = "UPDATE `table_nodemcu_rfidrc522_mysql` SET `temp` = '".$temp."' WHERE `table_nodemcu_rfidrc522_mysql`.`id` = '".$tmp_rfid."'";
	file_put_contents('UIDContainer.php',$Write);
	if (isset($_POST['button1']))
	{
		//echo "button 1 has been pressed";
		$link = mysqli_connect("35.234.30.242","root","629262034") or die('Cannot connect to the DB');
		mysqli_select_db($link, "nodemcu_rfidrc522_mysql" );
		$sql_clear_mask_temp_dataa = "UPDATE `table_nodemcu_rfidrc522_mysql` SET `temp` = '', `mask` = ''"; //
		$result1 = mysqli_query($link, $sql_clear_mask_temp_dataa);
	}
	if(isset($_POST['search']))
	{
		$searchq = ($_POST['search']);
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

		$query = "SELECT * FROM `table_nodemcu_rfidrc522_mysql` WHERE CONCAT (`name`, `ID`, `gender`, `email`, `mobile`) LIKE '%".$searchq."%'";
		$search_result = filterTable($query);

	}
	else 
	{
		$query = "SELECT * FROM `table_nodemcu_rfidrc522_mysql`";
		$search_result = filterTable($query);
	}
	function filterTable($query)
	{
		$connect = mysqli_connect("35.234.30.242","root","629262034","nodemcu_rfidrc522_mysql");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
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
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
		<title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>
		<h2>~DB 2020~</h2> <!--NodeMCU V3 ESP8266 / ESP12E with MYSQL Database -->
		<ul class="topnav">
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="user data.php">User Data</a></li>
			<li><a href="unusual_user_data.php">Unusual user data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="live_temp_data.php">Live Temp</a></li>
			<li><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></li>
			<li><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>User Data Table</h3>
            </div>
			<!--
			<div class="row">
                <button type="button" onclick="click_clear_mask_temp.php">Click Me!</button>
            </div>
			-->
			<div class="row">
				<form method="POST" action=''>
					<input type="submit" name="button1"  value="Clear temp and mask data">
				</form> 
			</div>
			<form action ="" method="post">

				<input type="text" name="search" size="40" autofocus
				placeholder="search database..." autocomplete="off">
				<input type="submit" value="searh"/><br></br>
			
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Gender</th>
					  <th>Email</th>
                      <th>Mobile Number</th>
					  <th>Temp</th>
					  <th>Mask</th>
					  <th>Department</th>
					  <th>Last measure time</th>
					  <th>Action</th>
					  
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM table_nodemcu_rfidrc522_mysql ORDER BY name ASC'; 
		   foreach ($pdo->query($sql) as $row) {
			while($row = mysqli_fetch_array($search_result)):
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['ID'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['email'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
							echo '<td>'. $row['temp'] . '</td>';
							echo '<td>'. $row['mask'] . '</td>';
							echo '<td>'. $row['department'] . '</td>';
							echo '<td>'. $row['last_measure_time'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?ID='.$row['ID'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?ID='.$row['ID'].'">Delete</a>';
							echo '</td>';
							echo '</tr>';
			endwhile;
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
			<h3>Mask status: 0 means no wear mask, 1 means have wear mask</h3>
		</div> <!-- /container -->
	</form>
	</body>
</html>
