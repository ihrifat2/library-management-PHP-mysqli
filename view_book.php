<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['user_login']) || isset($_GET['id']) == '') {
    header('Location: index.php');
    exit();
}
require 'config.php';
$username = $_SESSION['user_login'];
if (isset($_GET)) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlQuery = "SELECT `book_name`, `book_author`, `book_body`, `book_cover` FROM `book_info` WHERE `id` = '$id'";
    $result= mysqli_query($conn, $sqlQuery);
    $rows = mysqli_fetch_assoc($result);
    if ($rows) {
        $bookname = $rows['book_name'];
        $bookauthor = $rows['book_author'];
        $bookbody = $rows['book_body'];
        $bookcover = $rows['book_cover'];
    }
}
if(isset($bookname) == NULL || isset($bookauthor) == NULL || isset($bookbody) == NULL){
    header('location: error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $bookname ?></title>
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/vendor/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script> -->
    <style type="text/css">
        img {
            border: 1px solid #ddd; /* Gray border */
            border-radius: 8px;  /* Rounded border */
            padding: 3px; /* Some padding */
        }
        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
</head>
<body class="viewBook">
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
        <div class="row">
            <div class="col-md-10">
                <div class="mt-3">
                    <h1><?php echo ucfirst($bookname); ?></h1>
                </div>
                <div class="lead">
                    Written by : <b><?php echo ucwords($bookauthor); ?></b>
                </div>
            </div>
            <div class="col-md-2">
                <a href="index.php"><img class="bookCover" title="<?php echo ucfirst($bookname) ?>" src="asset/books/<?php echo $bookcover; ?>" width="100" height="150"></a>
            </div>
        </div>
        <div class="mt-1 text-justify">
            <p class="text-justify">
                <?php echo ucfirst($bookbody); ?>
            </p>
        </div>
    </div>
</body>
</html>