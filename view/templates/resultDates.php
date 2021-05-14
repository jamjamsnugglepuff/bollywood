<?php
	require('../../model/conn.php');

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	function select_sessions_playing($movieID, $date){
		if($date){
			$string = explode ( "-" , $date , 3 ) ;
		}else{
			exit();
		}
		$sql = "SELECT * FROM sessions WHERE year(sessionDate) = :string0 AND month(sessionDate) = :string1 AND day(sessionDate) = :string2 AND movieID = :movieID";
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':movieID', $movieID);
		$stmt->bindValue(':string0', $string[0]);
		$stmt->bindValue(':string1', $string[1]);
		$stmt->bindValue(':string2', $string[2]);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}


	$movieID = test_input($_GET['movieID']);
	$date = test_input($_GET['date']);
	$result = select_sessions_playing($movieID, $date) ;

	foreach ($result as $key => $value) {
		echo "<span><input name='sessionID' onclick='calculateTotal(this)' type='radio' data-price='50' value='".$value['sessionID']."'>".substr($value['sessionDate'], -8)."</span>"."<br>";
		// echo $value['sessionID']. ' '.  substr($value['sessionDate'], -8) . "<br>";
	}

	// echo $date;
	// foreach(as $datez){
	// 						echo var_dump($datez);
	// }
?>