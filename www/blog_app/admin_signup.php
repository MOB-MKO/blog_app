<?php
	include 'db.php';
	
	if(isset($_POST['submit'])){
		
		$error = array();
		
		if(empty($_POST['fullname'])){
			$error[] = "Please Enter Full Name";
		}
		
		if(empty($_POST['username'])){
			$error[] = "Enter Username";
		}
		
		if(empty($_POST['email'])){
			$error[] = "Enter Email";
		}
		
		if(empty($_POST['hash'])){
			$error[] = "Enter Password";
		}
		
		if(empty($_POST['confirm'])){
			$error[] = "Please Confirm Password";
		}elseif($_POST['confirm'] !== $_POST['hash']){
			$error[] = "Password Mismatch";
		}
		
		if(empty($error)){
			
			$hash = password_hash($_POST['hash'] , PASSWORD_BCRYPT);
			
			$stmt = $conn->prepare("INSERT INTO admin(admin_name,admin_username,email,hash,date_created,time_created) VALUES(:fn,:us,:em,:hsh,NOW(),NOW()) ");
			$stmt->bindParam(":fn",$_POST['fullname']);
			$stmt->bindParam(":us",$_POST['username']);
			$stmt->bindParam(":em",$_POST['email']);
			$stmt->bindParam(":hsh",$hash);
			
			$stmt->execute();
			
			header("Location:admin_login.php?message=Dear ".$_POST['username'].", your account has been created.you can now log in.");
			
		}else{
			foreach($error as $value){
				echo $value;
			}
			
		}
		
		
	}

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Signup</title>
</head>

<body>
	<form action="" method="POST">
    	<input type="text" name="fullname" placeholder="Full Name" />
        <br />
        <input type="text" name="username" placeholder="Username" />
        <br />
        <input type="email" name="email" placeholder="Email" />
        <br />
        <input type="password" name="hash" placeholder="Password" />
        <br />
        <input type="password" name="confirm" placeholder="Confirm Password" />
        <br />
        <input type="submit" name="submit" value="submit" />
</body> 
</html>