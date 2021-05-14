<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	require('../../model/conn.php');
	function select_dates_movie_playing($movieID){
							$sql = "SELECT DISTINCT date(sessionDate) FROM sessions WHERE movieID = :movieID";
							global $conn;
							$stmt = $conn->prepare($sql);
							$stmt->bindValue(':movieID', $movieID);
							$stmt->execute();
							$result = $stmt->fetchAll();
							return $result;
						}
	$movieID = test_input($_GET['movieID']);

	foreach(select_dates_movie_playing($movieID) as $date){
							echo "<option value='".$date['date(sessionDate)']."'>".$date['date(sessionDate)']."</option>";
							echo " ";
	}
?>