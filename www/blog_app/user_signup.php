<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Signup</title>
</head>
<body>
	<h1>Please create your account</h1>

	<?php
		if (isset($_GET['message'])) {
			// code...
			echo $_GET['message'];
		}


	?>

	<form action="signup_process.php" method="POST">
		<p>Name: <input type="text" name="fullname"></p>
		<p>Email: <input type="text" name="email"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Confirm Password: <input type="password" name="confirm_password"></p>
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>