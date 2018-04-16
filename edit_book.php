<?php 
session_start();
if (!isset($_SESSION['user_login']) || isset($_GET['id']) == '') {
    header('Location: index.php');
    exit();
}
require 'config.php';
$username = $_SESSION['user_login'];
if (isset($_GET)) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlQuery = "SELECT `id`, `book_name`, `book_author`, `book_body` FROM `book_info` WHERE `id` = '$id' AND `username`= '$username'";
    $result= mysqli_query($conn, $sqlQuery);
    $rows = mysqli_fetch_assoc($result);
    if ($rows) {
        $bookname = $rows['book_name'];
        $bookauthor = $rows['book_author'];
        $bookbody = $rows['book_body'];
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
    <title>Edit | <?php echo $bookname ?></title>
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body>
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
                                <a class="dropdown-item" href="change_password.php">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Change Password
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
    <div class="bd-example profileSetting">
        <div class="card ">
            <div class="card-header">
                Edit book
            </div>
            <div class="card-body">
                <form action="edit_book.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <b><label>Book Title</label></b>
                        <input type="text" name="booktitle" class="form-control" placeholder="Book Title ..." required="" value="<?php echo ucfirst($bookname); ?>">
                    </div>
                    <div class="form-group">
                        <b><label>Author</label></b>
                        <input type="text" name="bookauth" class="form-control" placeholder="Author ..." required="" value="<?php echo ucwords($bookauthor); ?>">
                    </div>
                    <div class="form-group">
                        <b><label>Book Body</label></b>
                        <textarea name="bookdescription" class="form-control text-justify">
                            <?php echo ucfirst($bookbody); ?>
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" name="bookEditBtn" class="btn btn-outline-dark" value="Submit">
                        </div>
                        <div class="col-md-8">
                            <p id="success"></p>
                            <p id="error"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'bookdescription' );
        window.setTimeout(function() {
            $(".fadeIn").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
    <script src="asset/js/jquery-3.2.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.js"></script>
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

if (isset($_POST['bookEditBtn'])) {
    $name = validate_input($_POST['booktitle']);
    $author = validate_input($_POST['bookauth']);
    $bookDescription = str_replace("<p>","", $_POST['bookdescription']);
    $bookDescription = str_replace("</p>","", $bookDescription);
    $bookDescription = str_replace("javascript:","", $bookDescription);
    $bookDescription = str_replace("onerror","", $bookDescription);
    //$body = validate_input($bookDescription);
    $body = $bookDescription;
    if (empty($name) || empty($author) || empty($body)) {
        echo "<script>document.getElementById('error').innerHTML = 'All field required.';</script>";
        echo "<script>document.getElementById('error').setAttribute('class', 'fadeIn')</script>";
    } else {
        $updatequery = "UPDATE `book_info` SET `book_name`= '$name',`book_author`='$author',`book_body`='$body' WHERE `id` = $id";
        $result = mysqli_query($conn, $updatequery);
        if ($result) {
            echo "<script>document.getElementById('success').innerHTML = 'Book updated.';</script>";
            echo "<script>document.getElementById('success').setAttribute('class', 'fadeIn')</script>";
            //header('Location: edit_book.php');
            echo "<script>javascript:document.location='edit_book.php?id=".$id."'</script>";
        } else {
            echo "<script>document.getElementById('error').innerHTML = 'Book not updated.';</script>";
            echo "<script>document.getElementById('error').setAttribute('class', 'fadeIn')</script>";
        }
    }
}
mysqli_close($conn);
?>