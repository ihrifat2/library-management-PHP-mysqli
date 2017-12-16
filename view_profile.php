<?php 
session_start();
if (!isset($_SESSION['user_login'])) {
    header('Location: index.php');
    exit();
}
require 'config.php';
$username = $_SESSION['user_login'];
$sqlQuery = "SELECT * FROM `user_info` WHERE `username` = '$username'";
$result= mysqli_query($conn, $sqlQuery);
$rows = mysqli_fetch_assoc($result);
if ($rows) {
    $name = $rows['name'];
    $email = $rows['email'];
    $photo = $rows['photo'];
    $address = $rows['address'];
    $phone = $rows['phone'];
    $facebook = $rows['facebook'];
    $twitter = $rows['twitter'];
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Profile</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/vendor/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script> -->
    <style type="text/css">
        img {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 3px;
        }
        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
</head>
<body class="indexBook">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand indexHeading" href="index.php">
            <img src="asset/img/logo.PNG" alt="logo" style="width: 50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <?php 
                    if (isset($_SESSION['user_login'] )) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="book.php">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                Library
                            </a>
                        </li>
                        ';
                    }
                ?>
            </ul>
            <ul class="navbar-nav nav-right">
                <?php 
                    if (isset($_SESSION['user_login'] )) {
                        echo '
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Username : '.ucfirst($_SESSION['user_login']).'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="view_profile.php">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    View Profile
                                </a>
                                <a class="dropdown-item" href="setting.php">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Setting
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="logout.php">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                logout
                            </a>
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                Login
                            </a>
                        </li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Your Profile
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="view_profile.php">
                        <img class="card-img-top profilePic rounded" src="asset/uploads/<?php echo $photo; ?>" alt="Card image cap" style="width: 200px;">
                    </a>
                </div>
                <div class="col-md-8 card-body">
                    <table class="table table-striped form-group">
                        <tbody>
                            <tr>
                                <td>Full Name :</td>
                                <td><?php echo ucwords($name); ?></td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td><a href="mailto:imran@hadid.me"><?php echo ucwords($email); ?></a></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td><?php 
                                if ($address == '' || $address == null) {
                                    echo "<b><font color='red'>Please fill up this field</font></b>";
                                } else {
                                    echo $address;
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Phone :</td>
                                <td><?php 
                                if ($address == '' || $address == null) {
                                    echo "<b><font color='red'>Please fill up this field</font></b>";
                                } else {
                                    echo $phone;
                                }
                                ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body">
                        <?php 
                            if ( !$facebook == '' || !$facebook == null) {
                                echo '
                                <a href="https://facebook.com/'.$facebook.'" class="card-link">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    Facebook
                                </a>
                                ';
                            }
                        ?>
                        <?php 
                            if ( !$twitter == '' || !$twitter == null) {
                                echo '
                                <a href="https://twitter.com/'.$twitter.'" class="card-link">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    Twitter
                                </a>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>