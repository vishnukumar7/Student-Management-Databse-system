<?php
	$conn=mysqli_connect("localhost","root","");
	if(!$conn){
		die("could not mysqli connect");
	}
	if(mysqli_query($conn,"CREATE DATABASE StudentManagementSystem")){
		echo "Create database successfully";
	}
?>
<html>
	<head>
		<title>Student DataBase System</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div>
			<form method="post" action="Create.php" enctype="multipart/form-data">
				<input type="submit" value="Create Table" name="Create" id="db">
			</form>
			<form method="post" action="DropTable.php" enctype="multipart/form-data">
				<input type="submit" value="Drop Table" name="Drop" id="db">
			</form>
			<form method="post" action="Insert.php" enctype="multipart/form-data">
				<input type="submit" value="Insert Values" name="Insert" id="db">
			</form>
			<form method="post" action="Update.php" enctype="multipart/form-data">
				<input type="submit" value="Edit Values" name="Edit" id="db">
			</form>
			<form method="post" action="Display.php" enctype="multipart/form-data">
				<input type="submit" value="Display" id="db">
			</form>
			<form method="post" action="Login.php" enctype="multipart/form-data">
				<input type="submit" value="logout" id="db">
			</form>
		</div>
	</body>
</html>