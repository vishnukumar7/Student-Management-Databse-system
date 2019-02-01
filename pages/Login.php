<?php
	session_start();
	if(isset($_POST["submit"]) && !empty($_POST["LOGIN"]) && !empty($_POST["PASSWORD"])){
		$id=$_POST["LOGIN"];
		$pass=$_POST["PASSWORD"];
		if($id==="admin" && $pass==="admin"){
			header('location:Database.php');
		}
		else{
			echo("invalid id or password");
		}
	}
	session_destroy();
?>
<html>
	<head>
		<title>Login page</title>
		<script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="jquery/jquery.validate.js" type="text/javascript"></script>
		<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
		<script type="text/javascript">
            $function(){
				$("#login-form").validate();
			});
        </script>
	</head>
	<body>
		<h1 align="center">Student Management System</h1>
		<div align="center" class="h-50 col-sm-5 mx-auto mt-5 bg-info">
			<div class="mt-5">
                <h3>Sign In</h3>
            </div>
            <div class="mt-5">
                <form method="post" id="login-form">
                    <div>
						<input class="form-control required mt-5 p-2 text-dark" placeholder="Login Id" name="LOGIN" type="text" autofocus autocomplete="off" required>
                    </div>
                    <div>
                        <input class="form-control required mt-5 p-2 text-dark" placeholder="Password" name="PASSWORD" type="password" required>
                    </div>
                    <input type="submit" value="LOGIN" class="btn-lg mt-4" name="submit">
  				</form>
            </div>
		</div>
	</body>
</html>