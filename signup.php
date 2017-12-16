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
	<title>Registration</title>
	<link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
</head>
<body>

	<div class="container">
		<div class="row regpanel"> 
			<div class="main-reg main-center">
				<div class="" id="txtdiv">
			        <strong id="txtmessage"></strong>
			    </div>
				<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="panel-heading">
		               <div class="panel-title text-center">
		               		<h1 class="title">Registration</h1>
		               	</div>
		            </div>

		            <div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="text"  class="form-control" name="fullname" maxlength="35" id="name" placeholder="Enter your Name" autocomplete="off" autofocus="on" />
								<span class="input-group-addon">
									<i class="fa fa-users" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="email" class="form-control" name="email" maxlength="35" id="email" placeholder="Enter your Email" autocomplete="on" />
								<span class="input-group-addon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="text" class="form-control" name="uname" maxlength="30" id="username" placeholder="Enter your Username" autocomplete="off" />
								<span class="input-group-addon">
									<i class="fa fa-user" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="password" class="form-control" name="passwd" maxlength="50" id="password" placeholder="Enter your Password" autocomplete="off"/>
								<span class="input-group-addon">
									<i class="fa fa-key fa-fw"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="password" class="form-control" name="conpasswd" maxlength="50" id="password" placeholder="Confirm Password" autocomplete="off" />
								<span class="input-group-addon">
									<i class="fa fa-key fa-fw"></i>
								</span>
							</div>
						</div>
					</div>

					<p id="error"></p>
					<div class="form-group">
						<button type="submit" name="btn_reg" class="btn btn-outline-dark btn-md btn-block">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
							<b>Sign up</b>
						</button>
					</div>
					
					<div class="form-group">
			            <a class="btn btn-outline-success btn-md btn-block" href="login.php">
			            	<i class="fa fa-user-circle" aria-hidden="true"></i>
			            	<b>Login</b>
			            </a>
			         </div>
				</form>
			</div>
		</div>
	</div>
	<script>
		window.setTimeout(function() {
            $(".fadeIn").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
	</script>
</body>
</html>

<?php

//Filtering user input
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['btn_reg'])) {
	$name = validate_input($_POST['fullname']);
	$email = validate_input($_POST['email']);
    $profilePhoto = validate_input("robot.png");
	$username = validate_input($_POST['uname']);
	$pass1 = validate_input($_POST['passwd']);
	$pass2 = validate_input($_POST['conpasswd']);
	
	$subject = "Welcome to Bibliothecam";
	$body = "<div style='font-family: Bookman Old Style; font-size:18px;'><center><h1>Welcome to Bibliothecam</h1></center><p>Thanks for registration in Bibliothecam. We're happy to have you here!</p><p>Account Name: ".$name."<br>Email: ".$email."</p><p>You can log in to your new account at http://localhost/library/login.php</p><p>All the best,<br>From team Bibliothecam</p></div>";
		
	//echo $name . " : " . $email . " : " . $profilePhoto . " : " . $username . " : " . $pass1 . " : " . $pass2;
	if (empty($name) || empty($email) || empty($username) || empty($pass1) || empty($pass2)) {
		echo "<script>document.getElementById('error').innerHTML = 'All Fields are required.';</script>";
	} else {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if ($pass1 != $pass2) {
				echo "<script>document.getElementById('error').innerHTML = 'Password not matched.'</script>";
			} else {
				if (strlen($pass1) < 8 && strlen($pass1) > 50) {
					echo "<script>document.getElementById('error').innerHTML = 'Weak password.'</script>";
				} else {
					$password = password_hash($pass1, PASSWORD_BCRYPT);
					$sqlquery = "INSERT INTO `user_info`(`id`, `name`, `email`, `photo`, `username`, `password`) VALUES (NULL, '$name', '$email', '$profilePhoto', '$username', '$password')";
					$result = mysqli_query($conn, $sqlquery);
					if ($result) {
						require 'sendmail.php';
						sendmail($name, $email, $subject, $body);
						echo "<script>document.getElementById('txtmessage').innerHTML = 'Registration Successfull.'</script>";
					    echo "<script>document.getElementById('txtdiv').setAttribute('class', 'alert alert-success fadeIn')</script>";
					} else {
						echo "<script>document.getElementById('error').innerHTML = 'Danger.'</script>";
					}
				}
			}
		} else {
			echo "<script>document.getElementById('error').innerHTML = 'Enter a valid email.'</script>";
		}
	}
}
mysqli_close($conn);
?>