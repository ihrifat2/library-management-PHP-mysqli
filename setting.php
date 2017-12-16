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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setting</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/vendor/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script> -->
    <style>
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
                        </li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="bd-example profileSetting">
        <div class="card ">
            <div class="card-header">
                Edit Profile
            </div>
            <div class="card-body row">
                <form class="form-group row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <a href="setting.php">
                            <img class="card-img-top profilePhoto rounded" src="asset/uploads/<?php echo $photo; ?>" alt="avater" style="width: 250px; padding: 5px 5px 5px 5px;">
                        </a>
                        <input type="file" class="btn btn-outline-dark" name="uploaded" accept="image/png, image/jpeg, image/gif" style="width: 100%">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Full Name :</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                            <input type="text" class="form-control" name="name" value="<?php echo ucwords($name);?>" required="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><a href="mailto:imran@hadid.me"><?php echo ucwords($email); ?></a></td>
                                </tr>
                                <tr>
                                    <td>Address :</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                                            <input type="text" class="form-control" name="address" value="<?php echo ucwords($address);?>" required="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone :</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control" name="phone" value="<?php echo ucwords($phone);?>" required="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook :</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon3">https://facebook.com/</span>
                                            <input type="text" class="form-control" name="facebook" id="basic-url" aria-describedby="basic-addon3" placeholder="Username">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Twitter :</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon3">https://twitter.com/</span>
                                            <input type="text" class="form-control" name="twitter"  id="basic-url" aria-describedby="basic-addon3" placeholder="Username">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8">
                                <p id="error"></p>
                                <p id="success"></p>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-dark float-right" type="Submit" name="btn_setting">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $("#error").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
        window.setTimeout(function() {
            $("#success").fadeTo(500, 0).slideUp(500, function(){
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

if (isset($_POST['btn_setting'])) {
    $name = validate_input($_POST['name']);
    $address = validate_input($_POST['address']);
    $phone = validate_input($_POST['phone']);
    $facebook = validate_input($_POST['facebook']);
    $twitter = validate_input($_POST['twitter']);

    // File information
    $uploaded_name = $_FILES[ 'uploaded' ][ 'name' ];
    $uploaded_ext  = substr( $uploaded_name, strrpos( $uploaded_name, '.' ) + 1);
    $uploaded_size = $_FILES[ 'uploaded' ][ 'size' ];
    $uploaded_type = $_FILES[ 'uploaded' ][ 'type' ];
    $uploaded_tmp  = $_FILES[ 'uploaded' ][ 'tmp_name' ];
    $target_path = 'asset/uploads/';
    $target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );
    $dir = 'asset/uploads/'; 
    // Where are we going to be writing to?
    $target_file   =  md5( uniqid() . $uploaded_name ) . '.' . 'jpg';
    $temp_file     = ( ( ini_get( $dir ) == '' ) ? ( sys_get_temp_dir() ) : ( ini_get( $dir  ) ) );
    $temp_file    .= DIRECTORY_SEPARATOR . md5( uniqid() . $uploaded_name ) . '.' . $uploaded_ext;

    if (empty($uploaded_name)) {
        echo "<script>document.getElementById('error').innerHTML = 'Please upload a photo.' </script>";
    }else{
        // Is it an image?
        if( ( strtolower( $uploaded_ext ) == "jpg" || strtolower( $uploaded_ext ) == "jpeg" || strtolower( $uploaded_ext ) == "png" ) ) {
            if ( $uploaded_size < 1000000 && $uploaded_size != 0 ) {
                // Can we move the file to the upload folder?
                if( !move_uploaded_file( $uploaded_tmp, $dir . $target_file ) ) {
                    // No 
                    echo "<script>document.getElementById('error').innerHTML = 'Your image is not uploaded.' </script>";
                }
                else {
                    // Yes!
                    $query_for_settings = "UPDATE `user_info` SET `name`='$name', `photo`='$target_file', `address`='$address', `phone`='$phone', `facebook`='$facebook', `twitter`='$twitter' WHERE `username` = '$username'";
                    $result_for_settings = mysqli_query($conn, $query_for_settings);
                    if ($result_for_settings) {
                        echo "<script>document.getElementById('success').innerHTML = 'Profile updated.' </script>";
                    }else{
                        echo "<script>document.getElementById('error').innerHTML = 'Your image was not uploaded due to database error.' </script>";
                    }
                }
            }else{
                echo "<script>document.getElementById('error').innerHTML = 'Photo is too large. The maximum upload limit is 1MB.' </script>";
            }
        }
        else {
            // Invalid file
            echo "<script>document.getElementById('error').innerHTML = 'Your image was not uploaded. We can only accept JPEG or PNG images.' </script>"; 
        }
    }
}
mysqli_close($conn);
?>