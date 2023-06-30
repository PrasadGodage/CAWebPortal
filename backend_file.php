<?php
session_start();

include("./config.php");



if (isset($_POST['register'])) {

	$name = $_POST['name'];
	

	$landmark = $_POST['landmark'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$pincode = $_POST['pincode'];
	$password = $_POST['password'];
	$encypass = md5($password);
	$currentDate = date('Y-m-d');


	$sql = "INSERT INTO `usermaster`( `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `registrationdate`) VALUES ('customer','$name','$mob','$email','$encypass','$mob','$landmark','$pincode','$address','$currentDate')";

	echo $sql;


	if (mysqli_query($con, $sql)) {
		// echo "<script>
		// 		alert('Registration successful');
		// 		window.location.href='./loginForm.php';
		// 		</script>";
		// echo "<script>
		// 		alert('Error registration');
		// 		window.location.href='./registrationForm.php';
		// 		</script>";
	}
}

if (isset($_POST['login'])) {
	$name = $_POST['UName'];
	$password = $_POST['UPass'];
	$encypass = md5($password);

    
	//$sql = "SELECT * FROM `usermaster` WHERE `contact` = '$mob' AND `password` = '$encypass'";
	$sql = "SELECT * FROM `usermaster` WHERE`username`='$name' AND `password`='$password'";
echo $sql;
	$result = mysqli_query($con, $sql);

	if ($result) {

		if (mysqli_num_rows($result) > 0) {

			$rows = mysqli_fetch_array($result);

			$_SESSION['username'] = $rows['username'];
			$_SESSION['userid'] = $rows['userid'];
		

			echo "<script>				
				window.location.href='./dashboard.php';
				</script>";
		}
	} else {
		echo "<script>
		alert('Credential Error');
		window.location.href='./index.php';
		</script>";
	}
}
