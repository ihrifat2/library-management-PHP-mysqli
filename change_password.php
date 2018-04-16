<?php 
session_start();
if (!isset($_SESSION['user_login'])) {
    header('Location: index.php');
    exit();
}
require 'config.php';
$username = $_SESSION['user_login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Change</title>
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bulma.css"/>
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style>
        .dropdown-item{
            color: #000!important;
        }
        img {
            border: 1px solid #aaa;
            border-radius: 8px;
            padding: 2px;
        }
    </style>
</head>
<body>
    <section class="hero is-dark is-fullheight">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="index.php">
                            <figure class="image is-32x32">
                                <img src="asset/img/logo.PNG" alt="logo">
                            </figure>
                        </a>
                        <?php 
                            if (isset($_SESSION['user_login'] )) {
                                echo '
                                <a class="navbar-item" href="book.php">
                                    <p class="control">
                                        <span class="icon is-small is-right">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </span>
                                        <span>Library</span>
                                    </p>
                                </a>
                                ';
                            }
                        ?>
                        <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <?php 
                                if (isset($_SESSION['user_login'] )) {
                                    echo '
                                    <div class="navbar-item dropdown">
                                        <div class="dropdown-trigger">
                                            <a class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu">
                                            <span>Username : '.ucfirst($_SESSION['user_login']).'</span>
                                                <span class="icon is-small">
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
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
                                        </div>
                                    </div>
                                    <div class="navbar-item">
                                        <a class="button is-light is-outlined" href="logout.php">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            logout
                                        </a>
                                    </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body columns is-mobile is-centered">
            <div class="column is-half is-narrow">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <!-- old password -->

                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" name="oldpassword" type="password" id="oldpassword" onBlur="checkAvailability()" placeholder="old password">
                            <span class="icon is-small is-left">
                                <i class="fa fa-key"></i>
                            </span>
                        </p>
                        <p class="help" id="oldpassword-status"></p>
                        <p><img src="asset/img/LoaderIcon.gif" id="loaderIcon" style="display:none; width: 100px" /></p>
                    </div>

                    <!-- new password -->

                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" name="newpassword" type="password" id="newpassword" placeholder="new password">
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                    </div>

                    <!-- Confirm new password -->

                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" name="conpassword" type="password" id="conpassword" placeholder="Confirm Password">
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                        <p class="" id="verifypassword"></p>
                    </div>
                    <p id="error"></p>
                    <p id="success"></p>
                    <div class="field">
                        <p class="control">
                            <button class="button is-success" id="passwordbtn" type="submit" name="btn_passChng">
                                Login
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all "navbar-burger" elements
            var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(function ($el) {
                    $el.addEventListener('click', function () {

                        // Get the target from the "data-target" attribute
                        var target = $el.dataset.target;
                        var $target = document.getElementById(target);

                        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                        $el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');

                    });
                });
            }
        });
        var dropdown = document.querySelector('.dropdown');
        dropdown.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.classList.toggle('is-active');
        });
        var username = '<?php echo $username; ?>';
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'username='+username+'&oldpassword='+$("#oldpassword").val(),
                type: "POST",
                success:function(data){
                    $("#oldpassword-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
        $(document).ready(function() {
            $('#conpassword').keyup(function() {
                if ( $(this).val() == $('#newpassword').val()) {
                    $("#verifypassword").html("Password Match.");
                    $("#verifypassword").attr("class", "help is-success");
                    $("#passwordbtn").show();
                } else {
                    $("#verifypassword").html("Password not match.");
                    $("#verifypassword").attr("class", "help is-danger");
                }
            });
        });
        $("#passwordbtn").hide();
    </script>
</body>
</html>
<?php 

if (isset($_POST['btn_passChng'])) {
    $oldPass = $_POST['oldpassword'];
    $newPass = $_POST['newpassword'];
    $conPass = $_POST['conpassword'];
    //echo $oldPass . " : " . $newPass . " : " . $conPass;
    if (empty($oldPass) || empty($newPass) || empty($conPass)) {
        echo "<script>document.getElementById('error').innerHTML = 'All fields are required.';</script>";
    } else {
        if ($newPass != $conPass) {
            echo "<script>document.getElementById('error').innerHTML = 'Confirm Password not match.';</script>";
        } else {
            $query = "SELECT * FROM `user_info` WHERE `username` = '$username'";
            $result= mysqli_query($conn, $query);
            $rows = mysqli_fetch_array($result);
            $store_password = $rows['password'];
            $check = password_verify($oldPass, $store_password);
            if ($check) {
                $password = password_hash($conPass, PASSWORD_BCRYPT);
                $passUpdateQuery = "UPDATE `user_info` SET `password`='$password' WHERE `username` = '$username'";
                $passUpdateResult = mysqli_query($conn, $passUpdateQuery);
                if ($passUpdateResult) {
                    echo "<script>document.getElementById('success').innerHTML = 'Password updated.';</script>";
                } else {
                    echo "<script>document.getElementById('error').innerHTML = 'Password not updated.';</script>";
                }
            }else{
                echo "<script>document.getElementById('error').innerHTML = 'Old Password not match.';</script>";
            }
        }
    }
}
mysqli_close($conn);

?>