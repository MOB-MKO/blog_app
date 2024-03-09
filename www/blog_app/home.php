<?php
session_start();
include 'db.php';

$blogs = $conn->prepare("SELECT * FROM blog");
$blogs->execute();
$records = array();

while($row = $blogs->fetch(PDO::FETCH_BOTH)){
		$records[] = $row;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<h1>
		Welcome to Homepage
	</h1>

	<?php include 'user_header.php'?>

	<?php foreach($records as $value):?>
    	
        <a href="view_blog.php?id=<?= $value['blog_id']?>"><h3> <?= $value['title']?> by <?= $value['author']?></h3></a>
    
    
    
    
    
    
    
    <?php endforeach;?>
    
</body>
</html>