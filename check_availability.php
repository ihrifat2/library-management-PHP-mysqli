<?php
require "config.php";
if (!empty($_POST["username"]) && !empty($_POST["oldpassword"])) {
	$query = "SELECT * FROM `user_info` WHERE `username` = '" . $_POST["username"] . "'";
	$result= mysqli_query($conn, $query);
	$rows = mysqli_fetch_array($result);
	$store_password = $rows['password'];
	$check = password_verify($_POST["oldpassword"], $store_password);
	if($check) {
		echo "<span class='status-not-available'>Password Correct.</span>";
		echo "<script>document.getElementById('oldpassword').setAttribute('class', 'input is-success')</script>";
		echo "<script>document.getElementById('oldpassword-status').setAttribute('class', 'help is-success')</script>";
	} else {
		echo "<span class='status-available'>Password Incorrect.</span>";
		echo "<script>document.getElementById('oldpassword').setAttribute('class', 'input is-danger')</script>";
		echo "<script>document.getElementById('oldpassword-status').setAttribute('class', 'help is-danger')</script>";
	}
} elseif (!empty($_POST["username"])) {
	$query = "SELECT * FROM `user_info` WHERE `username` = '" . $_POST["username"] . "'";
	$result= mysqli_query($conn, $query);
	$rows = mysqli_fetch_row($result);
	$user_count = $rows[0];
	if($user_count>0) {
		echo "<span class='status-not-available'>Username Not Available.</span>";
		echo "<script>document.getElementById('username').setAttribute('class', 'input is-large is-danger')</script>";
		echo "<script>document.getElementById('username-status').setAttribute('class', 'help is-danger')</script>";
		echo "<script>document.getElementById('regbtn').setAttribute('disabled', true)</script>";
	} else {
		echo "<span class='status-available'>Username Available.</span>";
		echo "<script>document.getElementById('username').setAttribute('class', 'input is-large is-success')</script>";
		echo "<script>document.getElementById('username-status').setAttribute('class', 'help is-success')</script>";
		echo "<script>document.getElementById('regbtn').removeAttribute('disabled')</script>";
	}
} elseif (!empty($_POST["email"])) {
	$query = "SELECT * FROM `user_info` WHERE `email` = '" . $_POST["email"] . "'";
	$result= mysqli_query($conn, $query);
	$rows = mysqli_fetch_row($result);
	$user_count = $rows[0];
	if($user_count>0) {
		echo "<span class='status-not-available'>Email Not Available.</span>";
		echo "<script>document.getElementById('email').setAttribute('class', 'input is-large is-danger')</script>";
		echo "<script>document.getElementById('email-status').setAttribute('class', 'help is-danger')</script>";
		echo "<script>document.getElementById('regbtn').setAttribute('disabled', true)</script>";
	} else {
		echo "<span class='status-available'>Email Available.</span>";
		echo "<script>document.getElementById('email').setAttribute('class', 'input is-large is-success')</script>";
		echo "<script>document.getElementById('email-status').setAttribute('class', 'help is-success')</script>";
		echo "<script>document.getElementById('regbtn').removeAttribute('disabled')</script>";
	}
} else {
	echo "<span class='status-available'>Unexpected Error.</span>";
	echo "<script>document.getElementById('username').setAttribute('class', 'input is-large is-danger')</script>";
	echo "<script>document.getElementById('username-status').setAttribute('class', 'help is-danger')</script>";
}
mysqli_close($conn);
?>