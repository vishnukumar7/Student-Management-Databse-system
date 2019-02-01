<?php
session_start();
	$firstname=$lastname=$gender=$address=$age=$state=$city=$father_name="";
	$mother_name=$father_occupation=$mother_occupation=$nationality="";
	$studentid=$mobile_number="";
	$conn=mysqli_connect("localhost","root","");$flag=true;
	$studentidErr="";
	if (isset($_POST["submit"])) 
	{
		if(!empty($_POST["studentid"])){
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
		else{
			if(empty($_POST["studentid"])){
				$studentidErr=" * Student is required";
				$flag=false;
			}
			else{
				$studentid=test_input($_POST["studentid"]);
				if(!preg_match("/^[0-9]*$/",$studentid)){
					$studentidErr=" * Only digit are allowed";
					$flag=false;
				}
			}
		}
	}
	if (isset($_POST["update"]))  
	{
		$flag=true;
		if(empty($_POST["studentid"])){
			$studentidErr=" * Student is required";
			$flag=false;
		}
		else{
			$studentid=test_input($_POST["studentid"]);
			if(!preg_match("/^[0-9]*$/",$studentid)){
				$studentidErr=" * Only digit are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["age"])){
			$ageErr=" * Student age is required";
			$flag=false;
		}
		else{
			$age=test_input($_POST["age"]);
			if(!preg_match("/^[0-9]*$/",$age)){
				$ageErr=" * Only digit are allowed";
				$flag=false;
			}
		}
		if (empty($_POST["gender"])) {
			$genderErr = " * Gender is required";
			$flag=false;
		} 
		else {$gender = test_input($_POST["gender"]);}
		if(empty($_POST["firstname"])){
			$firstnameErr=" * First Name is required";
			$flag=false;
		}
		else{
			$firstname=test_input($_POST["firstname"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
				$firstnameErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["lastname"])){
			$lastnameErr=" * Last Name  is required";
			$flag=false;
		}
		else{
			$lastname=test_input($_POST["lastname"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
				$lastnameErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["address"])){
			$addressErr=" * address is required";
			$flag=false;
		}
		else{$address=test_input($_POST["address"]);}
		if(empty($_POST["city"])){
			$cityErr=" * City is required";
			$flag=false;
		}
		else{
			$city=test_input($_POST["city"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$city)){
				$cityErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["state"])){
			$stateErr=" * State is required";
			$flag=false;
		}
		else{
			$state=test_input($_POST["state"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$state)){
				$stateErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["fathername"])){
			$father_nameErr=" * Father Name is required";
			$flag=false;
		}
		else{
			$father_name=test_input($_POST["fathername"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$father_name)){
				$father_nameErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["fatheroccupation"])){
			$father_occupationErr=" * Father occupation is required";
			$flag=false;
		}
		else{
			$father_occupation=test_input($_POST["fatheroccupation"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$father_occupation)){
				$father_occupationErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["mothername"])){
			$mother_nameErr=" * Mother Name is required";
			$flag=false;
		}
		else{
			$mother_name=test_input($_POST["mothername"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$mother_name)){
				$mother_nameErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["motheroccupation"])){
			$mother_occupationErr=" * Mother Name is required";
			$flag=false;
		}
		else{
			$mother_occupation=test_input($_POST["motheroccupation"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$mother_occupation)){
				$mother_occupationErr=" * Only letters and whitespace are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["nationality"])){
			$nationalityErr=" * Nationality is required";
			$flag=false;
		}
		else{
			$nationality=test_input($_POST["nationality"]);
			if(!preg_match("/^[a-zA-Z]*$/",$nationality)){
				$nationalityErr=" * Only letters are allowed";
				$flag=false;
			}
		}
		if(empty($_POST["mobilenumber"])){
			$mobile_numberErr=" * mobile number is required";
			$flag=false;
		}
		else{
			$mobile_number=test_input($_POST["mobilenumber"]);
			if(!preg_match("/^[0-9]*$/",$mobile_number)){
				$mobile_numberErr=" * Only digit are allowed";
				$flag=false;
			}
		}
		if($flag)
		{
			$conn=mysqli_connect("localhost","root","");
			if(!$conn){
				die("could not mysqli connect");
			}
			mysqli_select_db($conn,"studentmanagementsystem");
			$sql="UPDATE ".$_SESSION['tableName']." SET firstname='$firstname',lastname='$lastname',gender='$gender',
					Age=$age,address='$address',city='$city',state='$state',father_name='$father_name',
					father_occupation='$father_occupation',mother_name='$mother_name',mother_occupation='$mother_occupation',
					nationality='$nationality',mobile_number='$mobile_number' WHERE id=$studentid";
					echo $sql;
			if(mysqli_query($conn,$sql)){
				echo "<script type='text/javascript'>alert('The value is updated');</script>";
				header('location:UpdateValues.php');
			}
		}
	}
	if(isset($_POST["back"]))
	{
		header('location:Database.php');
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
<html>
	<head>
		<link href="values.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
		<style>
			.error{
				color:#FF0000;
			}
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
					<td><center><input type="submit" class="submit" name="submit" value="View" ></center></td>
					<td><center><input type="submit" class="submit" name="update" value="Update" ></center></td>
					<td><center><input type="submit" class="submit" name="back" value="Back"></center></td>
				</tr>
				<tr>
					<td>Student id</td>
					<td>:</td>
					<td ><input type="text" name="studentid"  value="<?php echo $studentid;?>" ><span class="error"><?php echo $studentidErr;?></span></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td>:</td>
					<td ><input type="text" name="firstname" value="<?php echo $firstname;?>" ></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>:</td>
					<td ><input type="text" name="lastname" value="<?php echo $lastname;?>" ></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td ><input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male" >Male&nbsp;&nbsp;<input type="radio" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?> >Female</td>
				</tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td ><input type="text" name="age" value="<?php echo $age;?>" ></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td ><textarea rows="3" cols="30" name="address" ><?php echo $address;?></textarea></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td ><input type="text" name="city" value="<?php echo $city;?>" ></td>
				</tr>
				<tr>
					<td>State</td>
					<td>:</td>
					<td ><input type="text" name="state" value="<?php echo $state;?>" ></td>
				</tr>
				<tr>
					<td>Father Name</td>
					<td>:</td>
					<td ><input type="text" name="fathername" value="<?php echo $father_name;?>" ></td>
				</tr>
				<tr>
					<td>Father Occupation</td>
					<td>:</td>
					<td ><input type="text" name="fatheroccupation" value="<?php echo $father_occupation;?>" ></td>
				</tr>
				<tr>
					<td>Mother Name</td>
					<td>:</td>
					<td ><input type="text" name="mothername" value="<?php echo $mother_name;?>" ></td>
				</tr>
				<tr>
					<td>Mother Occupation</td>
					<td>:</td>
					<td ><input type="text" name="motheroccupation" value="<?php echo $mother_occupation;?>" ></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td>:</td>
					<td ><input type="text" name="nationality" value="<?php echo $nationality;?>" ></td>
				</tr>
				<tr>
					<td>Mobile Number</td>
					<td>:</td>
					<td ><input type="text" name="mobilenumber" value="<?php echo $mobile_number;?>" ></td>
				</tr>
			</table>
		</form>
	</body>
</html>