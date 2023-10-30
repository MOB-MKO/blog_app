<?php
	session_start();
	include "authenticate.php";
	include "db.php";

	if(isset($_GET['id'])){
			$blog_id = $_GET['id'];
			header("Location:confirm_delete.php");
			exit();
		}

	$statement = $conn->prepare("SELECT * FROM category");
	$statement->execute();

	while($row = $statement->fetch(PDO::FETCH_BOTH)){
		$select[] = $row;
		}
		exit();

?>
