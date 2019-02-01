<?php
session_start();
	$firstname=$lastname=$gender=$address=$age=$state=$city=$father_name="";
	$mother_name=$father_occupation=$mother_occupation=$nationality="";
	$studentid=$mobile_number="";
	$studentidErr=$firstnameErr=$lastnameErr=$genderErr=$ageErr=$addressErr=$cityErr=$stateErr="";
	$father_nameErr=$mother_nameErr=$mother_occupationErr=$father_occupationErr="";
	$nationalityErr=$mobile_numberErr=$extraErr="";
	if (isset($_POST["submit"]))  
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
			$sql="SELECT * FROM ".$_SESSION["tableName"];
			$result=mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_row($result)){
				if($row[0]===$studentid){
					$flag=false;
				}
			}
			if($flag){
				$sql="INSERT INTO ".$_SESSION['tableName']." (id,firstname,lastname,gender,
						Age,address,city,state,father_name,father_occupation,mother_name,
						mother_occupation,nationality,mobile_number) VALUES($studentid,
						'$firstname','$lastname','$gender',$age,'$address','$city','$state',
						'$father_name','$father_occupation','$mother_name','$mother_occupation',
						'$nationality','$mobile_number')";
				if(mysqli_query($conn,$sql)){
					echo "<script type='text/javascript'>alert('The value is inserted');</script>";
					header('location:Values.php');
				}
			}
			else{
				echo "<script type='text/javascript'>alert('student id is already exists');</script>";
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
			.input{
				
			}
		</style>
	</head>
	<body>
		<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onClick="javascript:history.go(-1)">
			<table class="table table-striped">
				<tr class="font">
					<td class="font">Student id</td>
					<td>:</td>
					<td class="input"><input type="text" name="studentid"  value="<?php echo $studentid;?>"><span class="error"><?php echo $studentidErr;?></span></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td>:</td>
					<td class="input"><input type="text" name="firstname"  value="<?php echo $firstname;?>"><span class="error"><?php echo $firstnameErr;?></span></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>:</td>
					<td class="input"><input type="text" name="lastname"  value="<?php echo $lastname;?>"><span class="error"><?php echo $lastnameErr;?></span></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td class="input"><input type="radio" name="gender"  <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male&nbsp;&nbsp;<input type="radio" name="gender"  value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>>Female<span class="error"><?php echo $genderErr;?></span></td>
				</tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td class="input"><input type="text" name="age" value="<?php echo $age;?>"><span class="error"><?php echo $ageErr;?></span></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td class="input"><textarea rows="5" cols="20" name="address" ><?php echo $address;?></textarea><span class="error"><?php echo $addressErr;?></span></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td class="input"><input type="text" name="city" value="<?php echo $city;?>"><span class="error"><?php echo $cityErr;?></span></td>
				</tr>
				<tr>
					<td>State</td>
					<td>:</td>
					<td class="input"><input type="text" name="state" value="<?php echo $state;?>"><span class="error"><?php echo $stateErr;?></span></td>
				</tr>
				<tr>
					<td>Father Name</td>
					<td>:</td>
					<td class="input"><input type="text" name="fathername" value="<?php echo $father_name;?>"><span class="error"><?php echo $father_nameErr;?></span></td>
				</tr>
				<tr>
					<td>Father Occupation</td>
					<td>:</td>
					<td class="input"><input type="text" name="fatheroccupation" value="<?php echo $father_occupation;?>"><span class="error"><?php echo $father_occupationErr;?></span></td>
				</tr>
				<tr>
					<td>Mother Name</td>
					<td>:</td>
					<td class="input"><input type="text" name="mothername" value="<?php echo $mother_name;?>"><span class="error"><?php echo $mother_nameErr;?></span></td>
				</tr>
				<tr>
					<td>Mother Occupation</td>
					<td>:</td>
					<td class="input"><input type="text" name="motheroccupation" value="<?php echo $mother_occupation;?>"><span class="error"><?php echo $mother_occupationErr;?></span></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td>:</td>
					<td class="input"><input type="text" name="nationality" value="<?php echo $nationality;?>"><span class="error"><?php echo $nationalityErr;?></span></td>
				</tr>
				<tr>
					<td>Mobile Number</td>
					<td>:</td>
					<td class="input"><input type="text" name="mobilenumber" value="<?php echo $mobile_number;?>"><span class="error"><?php echo $mobile_numberErr;?></span></td>
				</tr>
				<tr>
					<td><center><input type="submit" class="submit" name="submit" value="Submit"></center></td>
					<td></td>
					<td><center><input type="submit" class="submit" name="back" value="Back"></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>