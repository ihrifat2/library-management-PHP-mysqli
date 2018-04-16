<?php
session_start();
if (isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}
require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="asset/css/bulma.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Registration</h3>
					<div class="box">
						<figure class="avatar">
							<img src="asset/img/logo.PNG" width="100">
						</figure>
						<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

							<!-- Full name -->

							<div class="field">
								<div class="control">
									<input class="input is-large" type="text" name="fullname" maxlength="35" id="name" placeholder="Enter your Name" autofocus="">
								</div>
							</div>

							<!-- Email -->

							<div class="field">
								<div class="control">
									<input class="input is-large" type="email" name="email" maxlength="35" id="email" placeholder="Enter your Email" onBlur="checkEmail()">
									<p class="help" id="email-status"></p>
									<p><img src="asset/img/LoaderIcon.gif" id="loaderIcon" style="display:none; width: 100px" /></p>
								</div>
							</div>

							<!-- Username -->

							<div class="field">
								<div class="control">
									<input type="text" class="input is-large" name="username" maxlength="30" id="username" placeholder="Enter your Username" autocomplete="off" onBlur="checkUsername()"/>
									<p class="help" id="username-status"></p>
									<p><img src="asset/img/LoaderIcon.gif" id="loaderIcon" style="display:none; width: 100px" /></p>
								</div>
							</div>

							<!-- password -->

							<div class="field">
								<div class="control">
									<input class="input is-large" type="password" name="passwd" maxlength="35" id="password" placeholder="Enter your Password">
								</div>
							</div>

							<!-- confirm password -->
							
							<div class="field">
								<div class="control">
									<input class="input is-large" type="password" name="conpasswd" maxlength="50" id="conpassword" placeholder="Confirm Password">
								</div>
							</div>
							<p id="error"></p>
							<button type="submit" name="btn_reg" id="regbtn" class="button is-block is-info is-large">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
								<b>Sign up</b>
							</button>
						</form>
					</div>
					<p class="has-text-grey">
						<a href="login.php">Login</a> &nbsp;·&nbsp;
						<a href="../">Need Help?</a>
					</p>
				</div>
			</div>
		</div>
	</section>
	<script>
		function checkUsername() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'username='+$("#username").val(),
                type: "POST",
                success:function(data){
                    $("#username-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
        function checkEmail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#email-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
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
	$username = validate_input($_POST['username']);
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