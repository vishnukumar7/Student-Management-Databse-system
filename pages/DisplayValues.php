<?php
session_start();
	$firstname=$lastname=$gender=$address=$age=$state=$city=$father_name="";
	$mother_name=$father_occupation=$mother_occupation=$nationality="";
	$studentid=$mobile_number="";
	$conn=mysqli_connect("localhost","root","");$flag=true;
	if (isset($_POST["submit"])) 
	{
		if(!$conn)
			die("could not connect");
		mysqli_select_db($conn,"studentmanagementsystem");
		$sql="SELECT * FROM ".$_SESSION["tableName"];
		$result=mysqli_query($conn,$sql);
		if (!$result) {
			echo "<script type='text/javascirpt'>alert('DB Error, could not list tables');</script>";
		}
		else{
			while ($row = mysqli_fetch_row($result)){
				if($row[0]===$_POST["studentid"]){
					$studentid=$row[0];
					$firstname=$row[1];
					$lastname=$row[2];
					$gender=$row[3];
					$age=$row[4];
					$address=$row[5];
					$city=$row[6];
					$state=$row[7];
					$father_name=$row[8];
					$father_occupation=$row[9];
					$mother_name=$row[10];
					$mother_occupation=$row[11];
					$nationality=$row[12];
					$mobile_number=$row[13];
					$flag=false;
					break;
				}
			}
			if($flag)
				echo "<script type='text/javascript'>alert('There is a No student id  in the table');</script>";
		}
	}
	if(isset($_POST["delete"])){
		$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
		if(!$conn){
			die("could not connect");
		}
		$studentid=$_POST["studentid"];
		$sql="DELETE FROM ".$_SESSION["tableName"]." WHERE id=$studentid";
		if(mysqli_query($conn,$sql)){
			echo "<script type='text/javascript'>alert('Delete values is successfuly');</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('There is a No student id  in the table');</script>";
		}
	}
	if(isset($_POST["back"]))
	{
		header('location:Database.php');
	}
?>
<html>
	<head>
		<link href="values.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
		<style>
			table{
				font-size:20px;
				margin-left:5%;
			}
			td{
				padding-bottom:30px;
			}
			.submit{
				width:100px;
				height:40px;
				font-size:20px;
			}
		</style>
	</head>
	<body>
		<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="table table-striped">
				<tr>
					<td><center><input type="submit" class="btn-lg" name="submit" value="View" ></center></td>
					<td><center><input type="submit" class="btn-lg" name="delete" value="Delete Values"></center></td>
					<td><center><input type="submit" class="btn-lg" name="back" value="Back"></center></td>
				</tr>
				<tr>
					<td>Student id</td>
					<td>:</td>
					<td ><input type="text" name="studentid"  value="<?php echo $studentid;?>" ></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $firstname;?>" readonly></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $lastname;?>" readonly></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td ><input type="radio" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male" readonly>Male&nbsp;&nbsp;<input type="radio" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?> readonly>Female</td>
				</tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $age;?>" readonly></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td ><textarea rows="3" cols="30" readonly><?php echo $address;?></textarea></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $city;?>" readonly></td>
				</tr>
				<tr>
					<td>State</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $state;?>" readonly></td>
				</tr>
				<tr>
					<td>Father Name</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $father_name;?>" readonly></td>
				</tr>
				<tr>
					<td>Father Occupation</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $father_occupation;?>" readonly></td>
				</tr>
				<tr>
					<td>Mother Name</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $mother_name;?>" readonly></td>
				</tr>
				<tr>
					<td>Mother Occupation</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $mother_occupation;?>" readonly></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $nationality;?>" readonly></td>
				</tr>
				<tr>
					<td>Mobile Number</td>
					<td>:</td>
					<td ><input type="text" value="<?php echo $mobile_number;?>" readonly></td>
				</tr>
			</table>
		</form>
	</body>
</html>