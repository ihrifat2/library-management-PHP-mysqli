<?php 
session_start();
require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 3px;
        }
        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
</head>
<body class="indexBody">
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
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3 indexHeading">Bibliothecam!!!</h1>
                <p style="font-family: snap itc; font-size: 24px;">Create your own virtual library just the way you want!!!</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    if (isset($_SESSION['user_login'] )) {
                        $username = $_SESSION['user_login'];
                        $bookshowdata = array();
                        $bookshowquery = "SELECT `id`, `book_name`, `book_author`, `book_cover` FROM `book_info`";
                        $bookshowresult = $conn->query($bookshowquery);
                        if ($bookshowresult) {
                            while ($bookshowrows = $bookshowresult->fetch_array(MYSQLI_ASSOC)) {
                                $bookshowdata[] = $bookshowrows;
                            }
                            $bookshowresult->close();
                        }                                
                        foreach ($bookshowdata as $bookrow) {
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-5 books">
                                    <h5 class="text-truncate" style="font-family: snap itc;">'.ucfirst($bookrow['book_name']).'
                                    </h5>
                                    <a href="view_book.php?id='.$bookrow['id'].'">
                                        <img class="bookCover" title="'.ucwords($bookrow['book_name']).'" src="asset/books/'.$bookrow['book_cover'].'" width="180" height="250">
                                    </a>
                                    <br>
                                    <a class="btn btn-outline-secondary" href="view_book.php?id='.$bookrow['id'].'">View details &raquo;</a>
                                </div>
                            ';
                        }
                        mysqli_close($conn);
                    }
                ?>
            </div>
            <hr>
        </div>
    </main>
</body>
</html>