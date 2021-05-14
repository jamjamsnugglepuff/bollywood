<?php 

	function select_active_movies(){
		global $conn;
		$sql = "SELECT * FROM movies WHERE active = 1";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}

	function select_dates($movieID){
		global $conn;
			$sql = "SELECT DISTINCT year(sessionDate),month(sessionDate),day(sessionDate) FROM sessions WHERE movieID = :movieID";
			$statement = $conn->prepare($sql);
			$statement->bindValue(":movieID", $movieID);
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
	}

	// select * sessions
	function select_sessions($movieID){
			global $conn;
			$sql = "SELECT DISTINCT year(sessionDate),month(sessionDate) FROM sessions WHERE movieID = :movieID";
			$statement = $conn->prepare($sql);
			$statement->bindValue(":movieID", $movieID);
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
	}

		function register_user($firstName, $lastName, $emailAddress, $contactNumber){
						global $conn; 
						$sql = "INSERT INTO patrons (firstName, lastName, emailAddress, mobileNumber) VALUES (:firstName, :lastName, :emailAddress, :contactNumber)";
						$stmt = $conn->prepare($sql);
						$stmt->bindValue(':firstName', $firstName);
						$stmt->bindValue(':lastName', $lastName);
						$stmt->bindValue(':emailAddress', $emailAddress);
						$stmt->bindValue(':contactNumber', $contactNumber);
						$stmt->execute();
						$result = $conn->lastInsertId();
						$stmt->closeCursor();
						return $result;
					}

		function make_booking($sessionID, $userID, $creditApproved){
						global $conn;
						$sql = "INSERT INTO bookings (sessionID, patronID, paid) VALUES (:sessionID, :userID, :creditApproved)";
						$stmt = $conn->prepare($sql);
						$stmt->bindValue(':sessionID', $sessionID);
						$stmt->bindValue(':userID', $userID);
						$stmt->bindValue(':creditApproved', $creditApproved);
						$result = $stmt->execute();
						$stmt->closeCursor();
						return $result;
					}


	function convert_date($date){
		return  $date["year(sessionDate)"]."-".$date['month(sessionDate)']."-".$date['day(sessionDate)'] ;
	}

	
	function select_times($dates, $movieID){
		global $conn;
			$sql = "SELECT sessionID AND DISTINCT TIME(sessionDate) FROM sessions WHERE  year(sessionDate) = :dates0 AND month(sessionDate) = :dates1 AND movieID = :movieID";
			$statement = $conn->prepare($sql);
			$statement->bindValue(":dates0", $dates[0]);
			$statement->bindValue(":dates1", $dates[1]);
			$statement->bindValue(":movieID", $movieID);
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
	}


 ?>