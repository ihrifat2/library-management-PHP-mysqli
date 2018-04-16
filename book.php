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
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library</title>
    <link rel="Shortcut Icon" href="favicon.ico" type="icon"/>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <style>
        img {
            border: 1px solid #ddd; /* Gray border */
            border-radius: 4px;  /* Rounded border */
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
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="font-family: cooper black">
                        <i class="fa fa-cog" aria-hidden="true"></i> Books Store
                    </h1>
                </div>
                <div class="col-md-4">
                    <p id="error"></p>
                    <p id="success"></p>
                </div>
                <div class="col-md-2 create">
                    <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#addPage">
                        Add Book
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="bd-example profileSetting">
        <div class="card ">
            <div class="card-header cardHead">
                <h3>Books</h3>
            </div>
            <div class="card-body cardBody">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="bookInput" onkeyup="searchFilter()" maxlength="100" placeholder="Search Book by name...">
                        </div>
                    </div>
                    <br>
                    <table class="table table-striped table-hover" id="bookTable">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publish</th>
                            <th>Cover</th>
                            <th></th>
                        </tr>
                        <?php

                        // Pagination Start

                        include("pagination.php");

                        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                        $limit = 5;
                        $startpoint = ($page * $limit) - $limit;
                        $statement = "book_info WHERE `username` = '$username'";
                        
                        // Pagination End

                        $bookdata = array();
                        $bookresult=mysqli_query($conn, "SELECT `id`, `book_name`, `book_author`, `book_cover` FROM {$statement} LIMIT {$startpoint} , {$limit}");
                        if ($bookresult) {
                            while ($bookrows = $bookresult->fetch_array(MYSQLI_ASSOC)) {
                                $bookdata[] = $bookrows;
                            }
                            $bookresult->close();
                        }                                
                        foreach ($bookdata as $bookrow) {
                            echo '
                            <tr>
                                <td class="text-truncate">'.ucfirst($bookrow['book_name']).'</td>
                                <td class="text-truncate">'.ucwords($bookrow['book_author']).'</td>
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td><a href="view_book.php?id='.$bookrow['id'].'"><img src="asset/books/'.$bookrow['book_cover'].'" width="30" height="40"></a></td>
                                <td>
                                    <a class="btn btn-outline-info" style="font-family: Segoe UI;" href="edit_book.php?id='.$bookrow['id'].'">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <button type="button" style="font-family: Segoe UI;" class="btn btn-outline-danger" onclick="deleteBookId('.$bookrow['id'].')" data-toggle="modal" data-target="#deleteBook">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                    </table>
                    <?php
                    // Pagination 
                        echo "<div id='paging' >";
                        echo pagination($statement,$limit,$page);
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="addPageLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPageLabel">Add Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <b><label>Book Title</label></b>
                            <input type="text" name="booktitle" class="form-control" maxlength="45" placeholder="Book Title ..." required="">
                        </div>
                        <div class="form-group">
                            <b><label>Author</label></b>
                            <input type="text" name="bookauthor" class="form-control" maxlength="45" placeholder="Author ..." required="">
                        </div>
                        <div class="form-group">
                            <b><label>Book Body</label></b>
                            <textarea name="bookdescription" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <b><label>Book Cover Photo</label></b>
                            <input type="file" class="form-control" name="uploaded" accept="image/png, image/jpeg, image/gif" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" name="bookaddbtn" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="deleteBook">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Book Delete</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Do you want to delete this Book?
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                        <button type="Submit" class="btn btn-outline-danger" name="deleteBookBtn">Yes</button>
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
        function searchFilter() {
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("bookInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                } 
            }
        }
        function deleteBookId(id) {
            document.cookie="bookId="+id;
        }
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

if (isset($_POST['bookaddbtn'])) {
    $bookTitle = validate_input($_POST['booktitle']);
    $bookAuthor = validate_input($_POST['bookauthor']);
    $bookDescription = str_replace("<p>","", $_POST['bookdescription']);
    $bookDescription = str_replace("</p>","", $bookDescription);
    $bookDescription = str_replace("javascript:","", $bookDescription);
    $bookDescription = str_replace("onerror","", $bookDescription);

    // File information
    $uploaded_name = $_FILES[ 'uploaded' ][ 'name' ];
    $uploaded_ext  = substr( $uploaded_name, strrpos( $uploaded_name, '.' ) + 1);
    $uploaded_size = $_FILES[ 'uploaded' ][ 'size' ];
    $uploaded_type = $_FILES[ 'uploaded' ][ 'type' ];
    $uploaded_tmp  = $_FILES[ 'uploaded' ][ 'tmp_name' ];
    $target_path = 'books/';
    $target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );
    $dir = 'asset/books/'; 
    // Where are we going to be writing to?
    $target_file   =  md5( uniqid() . $uploaded_name ) . '.' . 'jpg';
    $temp_file     = ( ( ini_get( $dir ) == '' ) ? ( sys_get_temp_dir() ) : ( ini_get( $dir  ) ) );
    $temp_file    .= DIRECTORY_SEPARATOR . md5( uniqid() . $uploaded_name ) . '.' . $uploaded_ext;

    if (empty($uploaded_name)) {
        $uploaded_name = 'noimage.png';
        // Can we move the file to the upload folder?
        if( !move_uploaded_file( $uploaded_tmp, $dir . $target_file ) ) {
            // No 
            echo "<script>document.getElementById('error').innerHTML = 'Your image is not uploaded.' </script>";
        }
        else {
            // Yes!
            $query = "INSERT INTO `book_info`(`id`, `username`, `book_name`, `book_author`, `book_body`, `book_cover`) VALUES (NULL, '$username', '$bookTitle', '$bookAuthor', '$bookDescription', '$target_file')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>javascript:document.location='book.php'</script>";
            } else {
                echo "<script>document.getElementById('error').innerHTML = 'Your image was not uploaded due to database error.' </script>";
            }
        }
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
                    $query = "INSERT INTO `book_info`(`id`, `username`, `book_name`, `book_author`, `book_body`, `book_cover`) VALUES (NULL, '$username', '$bookTitle', '$bookAuthor', '$bookDescription', '$target_file')";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<script>javascript:document.location='book.php'</script>";
                    } else {
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
if (isset($_POST['deleteBookBtn'])) {
    $deleteBookId = $_COOKIE['bookId'];
    $deleteBookQuery = "DELETE FROM `book_info` WHERE `id` = '$deleteBookId' AND `username` = '$username'";
    $deleteBookResult = mysqli_query($conn, $deleteBookQuery);
    if ($deleteBookResult) {
        setcookie('bookId', '', time() - 3600);
        echo '<script>document.cookie = "bookId=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";</script>';
        echo "<script>javascript:document.location='book.php'</script>";
    } else {
        echo "<script>document.getElementById('error').innerHTML = 'Book not Deleted.' </script>";
    }
}
mysqli_close($conn);
?>