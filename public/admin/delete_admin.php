<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c858f5b048.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/favicons/home-page-favicon.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="../js/check_delete_admin.js"></script>
</head>

<body>
    <?php
    session_start();
    require_once __DIR__ . "../../../partitial/connect.php";
    if($_SESSION['role'] == 'client' || (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin']))){
        echo "
            <script>
                alert('You don't have permission to access this page');
            </script>
        ";
        header("Location: ../index.php");
    }


    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">
            <img src="../image/logo.jpg" alt="logo" class="rounded-circle" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php
                                                echo "../index.php";
                                                ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin editor
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_admin.php">Add admin</a>
                        <a class="dropdown-item" href="delete_admin.php">Delete admin</a>
                        <a class="dropdown-item" href="edit_admin.php">Edit admin</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Editor Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Add food</a>
                        <a class="dropdown-item" href="#">Delete food</a>
                        <a class="dropdown-item" href="#">Edit food</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php
            ob_start();
            if (isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])) {
                if ($_SESSION['role'] == 'admin') {
                    $path = "admin_img/" . $_SESSION['img'];
                } 
                echo "
                <a href='edit_admin.php'>
                    <img src='../image/avatar/" . $path . "' class='rounded-circle p-1' width='50' height='50'>
                </a>
                    <ul class='navbar-nav '>
                        <li class='nav-item'>
                            <a href='../logout.php' class='nav-link my-2 my-sm-0'>Log out</a>
                        </li>
                    </ul>
                ";
            }
            ob_end_flush();
            ?>

        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 offset-2 border rounded shadow">
                <h2 class="text-center mt-5 text-danger">Delete admin</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="mt-4" id="form_delete_admin">
                    <div class="form-group row">
                        <label for="username_admin_delete" class="col-sm-2 col-form-label">Username</label>
                        <input type="text" name="username_admin_delete" id="username_admin_delete" class="form-control col-sm-8" placeholder="Enter username" required>
                    </div>

                    <div class="form-group row">
                        <label for="pwd_admin_delete" class="col-sm-2 col-form-label">Password</label>
                        <input type="password" name="pwd_admin_delete" id="pwd_admin_delete" class="form-control col-sm-8" placeholder="Enter password" required>
                    </div>

                    <div class="form-group row">
                        <label for="pwd_confirm_admin_delete" class="col-sm-2 col-form-label">Confirm password</label>
                        <input type="password" name="pwd_confirm_admin_delete" id="pwd_confirm_admin_delete" class="form-control col-sm-8" placeholder="Enter confirm password" required>
                    </div>

                    <div class="form-group row justify-content-center align-items-center">
                        <button type="submit" name="submit" class="btn btn-success mr-4">Delete</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

$username_admin_delete = "";
$pwd_admin_delete = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    if(isset($_POST['username_admin_delete']) && !empty($_POST['username_admin_delete'])){
        $username_admin_delete = $_POST['username_admin_delete'];
    }

    if(isset($_POST['pwd_admin_delete']) && !empty($_POST['pwd_admin_delete'])){
        $pwd_admin_delete = password_hash($_POST['pwd_admin_delete'], PASSWORD_BCRYPT);
    }

    $query = "SELECT * FROM admin WHERE username_admin = ? AND  password_admin = ?";
    $statment = $connect->prepare($query);
    $statment->execute([$username_admin_delete, $pwd_admin_delete]);
    $result = $statment->fetch(PDO::FETCH_ASSOC);

    if($statment->rowCount() > 0){
        $query = "DELETE FROM admin WHERE username_admin = ?";
        $statment = $connect->prepare($query);
        $statment->execute([$username_admin_delete]);
        echo "
            <script>
                alert('Delete admin successful');
            </script>
        ";
        session_unset();
        if(session_destroy()){
            header("Location: ../index.php");
        }
    } else {
        echo "
            <script>
                alert('Username or password incorrect');
            </script>
        ";
    }
}

?>