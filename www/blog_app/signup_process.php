<?php

include 'db.php';






if (isset($_POST['submit'])) {
	// code...
	$error = array();

	if (empty($_POST['fullname'])) {
		// code...
		$error[] = "Please enter Full Name";
	}else{
		$fullname = $_POST['fullname'];
	}
	if (empty($_POST['email'])) {
		// code...
		$error[] = "Please Enter Email";
	}else{
		$email = $_POST['email'];
	}
	if (empty($_POST['password'])) {
		// code...
		$error[] = "Please Enter Password";
	}else{
		$password = $_POST['password'];
	}
	if (empty($_POST['confirm_password'])) {
		// code...
		$error[] = "Please Confirm Password";
	}elseif ($_POST['confirm_password']!== $_POST['password']) {
		// code...
		$error[] = "Password Mismatch";
	}else{
		$confirm_password = $_POST['confirm_password'];
	}


if (empty($error)) {
	// code...

	$encrypted = password_hash($password, PASSWORD_BCRYPT);

	$statement = $conn->prepare("INSERT INTO users VALUES(NULL,:nm,:em,:ps,NOW(),NOW())");
	$statement->bindParam(":nm",$fullname);
	$statement->bindParam(":em",$email);
	$statement->bindParam(":ps",$encrypted);

	$statement->execute();


		header("Location:login.php?message=Dear $fullname, you have successfully registered and a confirmation message has been sent to you at $email");
}else{
	foreach ($error as $key => $value) {
		// code...
		echo $value."<br>";
	}
}

}
