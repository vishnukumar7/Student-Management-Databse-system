<?php
	session_start();
	if(isset($_POST["submit"]) && !empty($_POST["tableName"])){
		$conn=mysqli_connect("localhost","root","");
		if(!$conn){
			die("could not mysqli connect");
		}
		mysqli_select_db($conn,"StudentManagementSystem");
		$sql = "DROP TABLE ".$_POST["tableName"];
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "<script type='text/javascript'>alert('Table is dropped');</script>";
			header('location:Database.php');
		}
		else{
			echo "<script type='text/javascript'>alert('There is a No table name in the database');</script>";
			header('location:Database.php');
		}
	}
	if(isset($_POST["back"])){
		header('location:Database.php');
	}
?>
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<center><h1>Drop a table in student Management</h1></center>
		<div class="create">
			<form method="post" enctype="multipart/form-data">
				<center><input type="text" placeholder="Enter the table name" minlength="1" name="tableName" id="create" ><br>
				<input type="submit" value="Submit" name="submit" class="submit"  id="create">
				<input type="submit" value="Back" name="back" class="submit" id="create"></center>
			</form>
		</div>
	</body>
</html>