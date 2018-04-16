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
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="asset/css/bulma.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<style>
		#error{
			color: #ff0033;
		}
	</style>
</head>
<body>
	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Login</h3>
					<p class="subtitle has-text-grey">Please login to proceed.</p>
					<div class="box">
						<figure class="avatar">
							<img src="asset/img/logo.PNG" width="100">
						</figure>
						<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="field">
								<div class="control">
									<input class="input is-large" type="text" name="uname" maxlength="35" id="username" placeholder="Enter your Username" autofocus="">
								</div>
							</div>

							<div class="field">
								<div class="control">
									<input class="input is-large" type="password" name="passwd" maxlength="35" id="password" placeholder="Enter your Password">
								</div>
							</div>
							<div class="field">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <label class="radio">
                                                <input type="radio" name="answer">
                                                Remember
                                            </label>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <button type="button" id="showpassword" class="button">Show Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="field">
								<p id="error"></p>
								<button type="submit" name="btn_login" class="button is-block is-info is-large">
									<i class="fa fa-user-circle" aria-hidden="true"></i>
									<b>Login</b>
								</button>
							</div>
						</form>
					</div>
					<p class="has-text-grey">
						<a href="signup.php">Sign Up</a> &nbsp;·&nbsp;
						<!-- <a href="../">Forgot Password</a> &nbsp;·&nbsp;
						<a href="../">Need Help?</a> -->
					</p>
				</div>
			</div>
		</div>
	</section>
	<script src="asset/js/jquery-3.2.1.slim.min.js"></script>
	<script>
		$("#showpassword").on('click', function(){
            var password = $("#password");
            var type = password.attr('type');
            if (type == 'password') {
                password.attr('type', 'text');
                $(this).text("Hide Password");
            } else {
                password.attr('type', 'password');
                $(this).text("Show Password");
            }
        });
	</script>
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