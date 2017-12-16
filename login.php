<?php
session_start();
if (isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
</head>
<body>
	<div class="container">
		<div class="row loginpanel"> 
			<div class="main-login main-center">
				<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="panel-heading">
		               <div class="panel-title text-center">
		               		<a href="index.php">
		               			<img id="profile-img" class="rounded-circle" width="100" height="100" src="asset/img/logo.PNG" />
		               		</a>
		               		<h1 class="title">Login</h1>
		               	</div>
		            </div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="uname" maxlength="35" id="username" placeholder="Enter your Username"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
								<input type="password" class="form-control" name="passwd" maxlength="35" id="password" placeholder="Enter your Password"/>
							</div>
						</div>
					</div>
					<p id="error"></p>
					<div class="form-group ">
						<button type="submit" name="btn_login" class="btn btn-outline-dark btn-md btn-block">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
							<b>Login</b>
						</button>
					</div>
					<div class="login-register">
			            <a class="btn btn-outline-success btn-md btn-block" href="signup.php">
			            	<i class="fa fa-user-circle" aria-hidden="true"></i>
			            	<b>Sign up</b>
			            </a>
			         </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php 

if (isset($_POST['btn_login'])) {
	$username = $_POST['uname'];
	$password = $_POST['passwd'];

	if (empty($username) || empty($password)) {
		echo "<script>document.getElementById('error').innerHTML = 'All Fields are required.';</script>";
	} else {
		$query = "SELECT * FROM `user_info` WHERE `username` = '$username'";
		$result= mysqli_query($conn, $query);
		$rows = mysqli_fetch_array($result);
		$store_password = $rows['password'];
		$check = password_verify($password, $store_password);
		if ($check) {
			$_SESSION['user_login'] = $username;
			header('Location: index.php');
		}else{
			echo "<script>document.getElementById('error').innerHTML = 'Username or Password Invalid.';</script>";
		}
	}
}
mysqli_close($conn);
?>