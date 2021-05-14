<?php 
session_start();
require('../model/conn.php');
require('../model/functions.php');

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$errors = [];

$firstName = $lastName = $emailAddress = $contactNumber = $movieID = $sessionID = $creditApproved = "";
$creditApproved = true;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if($creditApproved == true){


		if(empty($_POST['firstName'])){
			$errors['firstName'] = "First Name is empty.";
		}else{
			// check string length
			if(!preg_match("/^[a-zA-Z]+$/", $_POST['firstName'])){
				$errors['firstName'] = "First Name can only have alpha characters.";
			}else{
				$firstName = test_input($_POST['firstName']);
			}


		}

		if(empty($_POST['lastName'])){
			$errors['lastName'] = "Last Name is empty.";
		}else{
			if(!preg_match("/^[a-zA-Z]+$/", $_POST['lastName'])){
				$errors['lastName'] = "Last Name can only have alpha characters.";
			}else{
				$lastName = test_input($_POST['lastName']);
			}
			// check string length
			// check is string
		}

		if(empty($_POST['emailAddress'])){
			$errors['emailAddress'] = "Email is empty.";
		}else{
			if (!filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL)) {
			  $errors['emailAddress'] = "Invalid email format";
			}else{
				$emailAddress = test_input($_POST['emailAddress']);
			}
		}

		if(empty($_POST['contactNumber'])){
			$errors['contactNumber'] = 'Contact Number is empty.';
		}else{
			if(preg_match("/^[a-zA-Z]+$/", $_POST['contactNumber'])){
				$errors['contactNumber'] = "Contact Number can only have numeric characters.";
			}else{
				$contactNumber = test_input($_POST['contactNumber']);
			}
			// check string length
			// check is numbers
		}

		if(empty($_POST['sessionID'])){
			$errors['session'] = "Session must be selected";
		}else{
			$sessionID = test_input($_POST['sessionID']);
		}

		if(empty($errors)){
			// create a user
			
					
				



					$user = register_user($firstName, $lastName, $emailAddress, $contactNumber);
					make_booking($sessionID, $user, $creditApproved);
					$_SESSION['success'] = "Booking completed please check your emails.";
					header('location: ../view/booking.php');
			// create a booking
		}else{
			// $errors['credit'] = "Error processing the credit card.";
		$_SESSION['errors'] = $errors;
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		
		}

	}else{
		$errors['credit'] = "Error processing the credit card.";
		$_SESSION['errors'] = $errors; // 86400 = 1 easter_days()
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		
	}
}

?>