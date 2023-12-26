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
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-10 offset-1 pt-5 pt-5 border rounded shadow">
            <h2 class="text-center h2 text-success">Admin Login</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="">
                    <div class="form-group row align-items-center justify-content-center">
                        <label for="username_admin" class="col-sm-2 col-form-label">Username</label>
                        <input type="text" name="username_admin" id="username_admin" class="col-5 form-control">
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <label for="username_admin" class="col-sm-2 col-form-label">Password</label>
                        <input type="password" name="password_admin" id="password_admin" class="col-5 form-control">
                    </div>

                    <div class="form-group row align-items-center justify-content-center">
                        <button type="submit" name="admin_login" class="col-3 btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php 
session_start();

require_once __DIR__ . "../../../partitial/connect.php";

$username_admin = "";
$password_admin = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['username_admin']) && !empty($_POST['username_admin'])){
        $username_admin = $_POST['username_admin'];
    }

    if(isset($_POST['password_admin']) && !empty($_POST['password_admin'])){
        $password_admin = password_hash($_POST['password_admin'], PASSWORD_BCRYPT);
    }

    $query = "SELECT * FROM admin WHERE username_admin = ? AND password_admin = ?";
    $statment = $connect->prepare($query);
    $statment->execute([$username_admin, $password_admin]);
    $result = $statment->fetch(PDO::FETCH_ASSOC);

    if($result){
        $_SESSION['id'] = htmlspecialchars($result['id']);
        $_SESSION['username_admin'] = htmlspecialchars($result['username_admin']);
        $_SESSION['password_admin'] = htmlspecialchars($result['password_admin']);
        if(htmlspecialchars($result['picture']) === ""){
            $_SESSION['img'] = "default.png";
        } else {
            $_SESSION['img'] = htmlspecialchars($result['picture']);
        }
        $_SESSION['role'] = htmlspecialchars($result['role']);
        $_SESSION['expire'] = time() + 3600;
        header("Location: admin.php");
    }
}
?>