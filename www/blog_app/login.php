<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<?php
	if(isset($_GET['message'])){
	echo $_GET['message'];
	}

	if(isset($_GET['error'])){
		echo $_GET['error'];
	}


	?>
	<h1>LOG IN</h1>
	<?php
	session_start();

	include 'db.php';





		if (isset($_POST['submit'])) {
			// code...

			$error = array();

			if (empty($_POST['email'])) {
				// code...
				$error[] = "Please enter email";
			}else{
				$email = $_POST['email'];
			}

			if (empty($_POST['password'])) {
				// code...
				$error[] = "Enter Password";
			}else{
				$password = $_POST['password'];
			}

			if (empty($error)) {
				// code...
				$statement = $conn->prepare("SELECT * FROM users WHERE email=:em");
				$statement->bindParam(":em",$email);
				$statement->execute();

				$row = $statement->fetch(PDO::FETCH_BOTH);


				if ($statement->rowCount() > 0 && password_verify($password,$row['password'])) {
					// code...
					$_SESSION['id'] = $row['user_id'];
					$_SESSION['name'] = $row['name'];

					header("Location:home.php");
				}else{
					echo "Either Email or Password Incorrect";
				}

			}else{
				foreach ($error as $key => $value) {
					// code...
					echo $value."<br>";
				}
			}






		}
	?>
	<form method="POST" action="" name="login">
		<div>
			<div class="form-element">
				<label>Email</label>
				<input type="email" placeholder="Email Address" name="email">
			</div><br>
			<div class="form-element">
				<label>Password</label>
				<input type="password" placeholder="Password" name="password">
			</div><br>
			<label>
				<input type="checkbox" name="remember">Remember Me
			</label><br><br>

			<button type="submit" name="submit">Login</button>
		</div>
		<!-- <div>
			<span>Forgot <a href="#">Password?</a></span>
			<span>Not a member? <a href="">Signup now</a></span>
		</div>
 -->

	</form>

</body>
</html>
