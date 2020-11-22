<?php
     
    require 'database.php';
 	
	echo "hi";
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['ID'];
		$gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$department = $_POST['department'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO table_nodemcu_rfidrc522_mysql (name,ID,gender,email,mobile,department) values(?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$id,$gender,$email,$mobile,$department));
		Database::disconnect();
		header("Location: user data.php");
    }
?>
