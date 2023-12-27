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
    <script src="../js/check_edit_admin.js"></script>
</head>

<body>
    <?php
    session_start();
    require_once __DIR__ . "../../../partitial/connect.php";
    if ($_SESSION['role'] == 'client' || (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin']))) {
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
                        <a class="dropdown-item" href="add_food.php">Add food</a>
                        <a class="dropdown-item" href="delete_food.php">Delete food</a>
                        <a class="dropdown-item" href="edit_food.php">Edit food</a>
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
        <div class="row border rounded shadow">
            <div class="col-8 offset-2 p-5">
                <h2 class="text-center text-success">Edit admin</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="form_edit_admin" class="mt-5">
                    <div class="form-group row">
                        <label for="fullname_admin_edit" class="col-sm-3 form-label">Full name</label>
                        <input type="text" name="fullname_admin_edit" id="fulllname_admin_edit" class="form-control col-sm-9" required placeholder="Enter new full name">
                    </div>

                    <div class="form-group row">
                        <label for="username_admin_edit" class="col-sm-3 form-label">Username</label>
                        <input type="text" name="username_admin_edit" id="username_admin_edit" class="form-control col-sm-9" required placeholder="Enter username">
                    </div>

                    <div class="form-group row">
                        <label for="username_admin_edit" class="col-sm-3 form-label">New username</label>
                        <input type="text" name="new_username_admin_edit" id="new_username_admin_edit" class="form-control col-sm-9" required placeholder="Enter new username">
                    </div>

                    <div class="form-group row">
                        <label for="email_admin_edit" class="col-sm-3 form-label">Email</label>
                        <input type="email" name="email_admin_edit" id="email_admin_edit" class="form-control col-sm-9" required placeholder="Enter new email">
                    </div>

                    <div class="form-group row">
                        <label for="phone_admin_edit" class="col-sm-3 form-label">Phone</label>
                        <input type="text" name="phone_admin_edit" id="phone_admin_edit" class="form-control col-sm-9" placeholder="Enter new phone">
                    </div>

                    <div class="form-group row">
                        <label for="password_admin_edit" class="col-sm-3 form-label">Old password</label>
                        <input type="password" name="password_admin_edit" id="password_admin_edit" class="form-control col-sm-9" required placeholder="Enter new password">
                    </div>

                    <div class="form-group row">
                        <label for="change_admin_password" class="col-sm-3 form-label">New password</label>
                        <input type="password" name="change_admin_password" id="change_admin_password" class="form-control col-sm-9" placeholder="Enter new password" required>
                    </div>

                    <div class="form-group row">
                        <label for="confirm_pwd_admin" class="col-sm-3 form-label">Confirm new password</label>
                        <input type="password" name="confirm_pwd_admin" id="confirm_pwd_admin" class="form-control col-sm-9" required placeholder="Enter confirm password">
                    </div>

                    <div class="form-group row">
                        <label for="edit_img" class="col-sm-3 form-label">Avatar</label>
                        <input type="file" name="edit_img" id="edit_img" class="form-control col-sm-4">
                    </div>

                    <div class="row justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success mr-4 col-3">Edit</button>
                        <button type="reset" class="btn btn-danger col-3">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
$fullname = "";
$username = "";
$new_username = "";
$email = "";
$phone = "";
$old_password = "";
$new_password = "";
$confirm_new_password = "";
$new_url_img = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['fullname_admin_edit']) && !empty($_POST['fullname_admin_edit'])){
        $fullname = $_POST['fullname_admin_edit'];
    }

    if(isset($_POST['username_admin_edit']) && !empty($_POST['username_admin_edit'])){
        $username = $_POST['username_admin_edit'];
    }

    if(isset($_POST['new_username_admin_edit']) && !empty($_POST['new_username_admin_edit'])){
        $new_username = $_POST['new_username_admin_edit'];
    }

    if(isset($_POST['email_admin_edit']) && !empty($_POST['email_admin_edit'])){
        $email = $_POST['email_admin_edit'];
    }

    if(isset($_POST['phone_admin_edit']) && !empty($_POST['phone_admin_edit'])){
        $phone = $_POST['phone_admin_edit'];
    }

    if(isset($_POST['password_admin_edit']) && !empty($_POST['password_admin_edit'])){
        $old_password = password_hash($_POST['password_admin_edit'], PASSWORD_BCRYPT);
    }

    if(isset($_POST['change_admin_password']) && !empty($_POST['change_admin_password'])){
        $new_password = password_hash($_POST['change_admin_password'], PASSWORD_BCRYPT);
    }

    if(isset($_POST['confirm_pwd_admin']) && !empty($_POST['confirm_pwd_admin'])){
        $confirm_new_password = password_hash($_POST['confirm_pwd_admin'], PASSWORD_BCRYPT);
    }
    $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $statment = $connect->prepare($query);
    $statment->execute([$username, $old_password]);

    if($statment->rowCount() > 0){
        if($old_password === $new_password){
            if($new_password === $confirm_new_password){
                $query = "UPDATE admin SET fullname = ?, username = ?, email = ?, phone = ?, password = ? WHERE username = ? AND password = ?";
                $statment = $connect->prepare($query);
                $statment->execute([$fullname, $new_username, $email, $phone, $new_password, $username, $old_password]);
                echo "
                    <script>
                        alert('Edit success');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('The confirm password must be the same as the new password');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('The old password must be the same as the new password');
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Account not found!');
            </script>
        ";
    }
}
?>