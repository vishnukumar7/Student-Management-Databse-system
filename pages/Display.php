<?php
	session_start();
	if(isset($_POST["submit"]) && !empty($_POST["tableName"])){
		$conn=mysqli_connect("localhost","root","");
		if(!$conn){
			die("could not mysqli connect");
		}
		$_SESSION["tableName"]=$_POST["tableName"];
		mysqli_select_db($conn,"StudentManagementSystem");
		$sql = "SHOW TABLES";
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo "<script type='text/javascirpt'>alert('DB Error, could not list tables');</script>";
		}
		else{
			while ($row = mysqli_fetch_row($result)) {
				if($row[0]===$_SESSION["tableName"]){
					header('location:DisplayValues.php');
					break;
				}
			}
			echo "<script type='text/javascript'>alert('There is a No table name in the database');</script>";
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
		<center><h1>Display a table in student Management</h1></center>
		<div class="create">
			<form method="post" enctype="multipart/form-data">
				<center><input type="text" placeholder="Enter the table name" minlength="1" name="tableName" id="create" ><br>
				<input type="submit" value="Submit" name="submit" class="submit"  id="create">
				<input type="submit" value="Back" name="back" class="submit" id="create"></center>
			</form>
		</div>
	</body>
</html>