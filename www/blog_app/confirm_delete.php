<?php
session_start();
include 'authenticate.php';
include 'db.php';

if(isset($_POST['submit'])){

			$statement = $conn->prepare("DELETE FROM blog WHERE blog_id=:bid");
			$statement->bindParam(":bid",$_GET['id']);
			$statement->execute();

			header("location:manage_blog.php");
			exit();

	}

if(isset($_POST['cancel'])){
		header("location:manage_blog.php");
		exit();
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm Delete</title>
</head>

<body>

	<h4>DO YOU REALLY WANT TO DELETE THIS BLOG?</h4>
    <form method="POST" action="">
    <button type="submit" name="cancel">Cancel</button>
    <button type="submit" name="submit">Yes</button>
	</form>
</body>
</html>
