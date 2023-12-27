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
    <script src="../js/check_add_admin.js"></script>
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
                } else if ($_SESSION['role'] == 'admin') {
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


    <div class="container p-3 ">
        <div class="row ">
            <div class="col-10 offset-1 border shadow rounded pt-5 pb-5">
                <h2 class="h2 text-center text-success">ADD ADMIN</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="pt-3" enctype="multipart/form-data" id="form_add_admin">
                    <div class="form-group row align-items-center justify-content-center">
                        <label for="fullname_admin" class="col-sm-2 col-form-label">Full name admin</label>
                        <input type="text" name="fullname_admin" id="fullname_admin" class="form-control col-sm-5" placeholder="Enter full name..." required>
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="username_admin" class="col-sm-2 col-form-label">Username admin</label>
                        <input type="text" name="username_admin" id="username_admin" class="form-control col-sm-5" placeholder="Enter username..." required>
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="email_admin" class="col-sm-2 col-form-label">Email admin</label>
                        <input type="email" name="email_admin" id="email_admin" class="form-control col-sm-5" placeholder="Enter email..." required> 
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="phone_admin" class="col-sm-2 col-form-label">Phone admin</label>
                        <input type="text" name="phone_admin" id="phone_admin" class="form-control col-sm-5" placeholder="Enter phone..." required>
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="password_admin" class="col-sm-2 col-form-label">Password admin</label>
                        <input type="password" name="password_admin" id="password_admin" class="form-control col-sm-5" placeholder="Enter password..." required>
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="confirm_pwd_admin" class="col-sm-2 col-form-label">Confirm password admin</label>
                        <input type="password" name="confirm_pwd_admin" id="confirm_pwd_admin" class="form-control col-sm-5" placeholder="Enter confirm password..." required>
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="img_admin" class="col-sm-2 col-form-label">Choose picture</label>
                        <input type="file" name="img_admin" id="img_admin" class="form-control col-sm-5">
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success col-sm-2 m-4" name="submit">Add admin</button>
                        <button type="reset" class="btn btn-danger col-sm-2">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$fullname_admin = "";
$username_admin = "";
$email_admin = "";
$phone_admin = "";
$password_admin = "";
$role = "admin";
$url_picture = "";
$id = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['fullname_admin']) && !empty($_POST['fullname_admin'])){
        $fullname_admin = $_POST['fullname_admin'];
    }

    if(isset($_POST['username_admin']) && !empty($_POST['username_admin'])){
        $username_admin = $_POST['username_admin'];
    }

    if(isset($_POST['email_admin']) && !empty($_POST['email_admin'])){
        $email_admin = $_POST['email_admin'];
    }

    if(isset($_POST['phone_admin']) && !empty($_POST['phone_admin'])){
        $phone_admin = $_POST['phone_admin'];
    }

    if(isset($_POST['password_admin']) && !empty($_POST['password_admin'])){
        $password_admin = password_hash($_POST['password_admin'], PASSWORD_BCRYPT);
    }

    if($_POST['submit']){
        if(isset($_POST['img_admin']) && !empty($_FILES['img_admin']['name'])){
            $url_picture = $_FILES['img_admin']['name'];
            move_uploaded_file($_FILES['img_admin']['tmp_name'], "../image/admin_img/" . $url_picture);  
        }
    }

    $query = "SELECT * FROM admin WHERE username_admin = ?";
    $statment = $connect->prepare($query);
    $statment->execute([$username_admin]);
    $statment->fetch(PDO::FETCH_ASSOC);
    if($statment->rowCount() > 0){
        echo "
            <script>
                alert('Username already exist');
            </script>
        ";
    } else {
        for($i=1; $i<=10; $i++){$id .= random_int(0, 9);}
        $query = "INSERT INTO admin(fullname, username_admin, password_admin, email, phone, role, id, picture)";
        $statment = $connect->prepare($query);
        $statment->execute([$fullname_admin, $username_admin, $password_admin, $email_admin, $phone_admin, $role, $id, $url_picture]);

        echo "
            <script>
                alert('Add admin successful');
            </script>
        ";
        header("Location: admin.php");
    }
}
?>