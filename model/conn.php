<?php 
	try{
		$user = 'root';
		$password = '';
		$host = '127.0.0.1';
		$db = "bollywood_movies";

		$conn = new PDO('mysql:host='.$host.";dbname=".$db, $user, $password);
		 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
 ?>