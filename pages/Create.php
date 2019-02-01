<?php
	session_start();
	if(isset($_POST["submit"]) && !empty($_POST["tableName"])){
		$conn=mysqli_connect("localhost","root","");
		if(!$conn){
			die("could not mysqli connect");
		}
		$_SESSION["tableName"]=$_POST["tableName"];
		mysqli_select_db($conn,"studentmanagementsystem");
		$sql="CREATE TABLE studentmanagementsystem.".$_POST["tableName"]." (id int(6) unsigned primary key,firstname varchar(20) not null,lastname varchar(20) not null,gender varchar(6) not null,Age varchar(20) not null,address varchar(500) not null,city varchar(20) not null,state varchar(20) not null,father_name varchar(20) not null,father_occupation varchar(30) not null,
			mother_name varchar(20) not null,mother_occupation varchar(30) not null,nationality varchar(20) not null,mobile_number varchar(20) not null)";
		if(mysqli_query($conn,$sql)){
			echo "<script type='text/javascript'>alert('Table is Created');</script>";
			header('location:Values.php');
		}
		else{
			echo "table is already exists";
		}
	}
	if(isset($_POST["back"])){
		header('location:Database.php');
	}
?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="style.css">
	</head>
	<body>
		<center><h1>Create a table in student Management</h1></center>
		<div class="create">
			<form method="post" enctype="multipart/form-data">
				<center><input type="text" placeholder="Enter the new table name" minlength="1" name="tableName" id="create" ><br>
				<input type="submit" value="Submit" name="submit" class="submit"  id="create">
				<input type="submit" value="Back" name="back" class="submit" id="create"></center>
			</form>
		</div>
	</body>
</html>