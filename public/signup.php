<?php
require_once __DIR__ . "../../partitial/connect.php";
// session_start();
?>

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
    <link rel="shortcut icon" href="image/favicons/home-page-favicon.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="js/check_signup.js"></script>
</head>

<body>
    <?php include_once __DIR__ . "../../partitial/navbar.php"; ?>
    <div class="container p-3 mt-4">
        <div class="row ">
            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto rounded shadow border border-success">
                <h1 class="text-center text-success pt-4">Sign up</h1>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="p-3" enctype="multipart/form-data" method="post" id="form-signup">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">First name:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control col-sm-10" placeholder="Your first name..." required>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label">Last name:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control col-sm-10" placeholder="Your last name..." required>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control col-sm-10" placeholder="Your email..." required>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control col-sm-10" placeholder="Your phone..." required>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control col-sm-10" placeholder="Username..." required> 
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control col-sm-10" placeholder="Password..." required>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control col-sm-4" placeholder="Your address..."></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birthday:</label>
                        <input type="date" name="birthday" id="birthday" class="form-control col-sm-4" required>
                    </div>

                    <div class="form-check row">
                        <input type="radio" name="gender" id="gender" class="form-check-input col0-sm-1" value="0" checked required>
                        <label for="gender" class="form-check-label col-sm-2">Male</label>

                        <input type="radio" name="gender" id="gender" class="form-check-input col0-sm-1" value="1">
                        <label for="" class="form-check-label col-sm-2">Female</label>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="img" class="form-label col-sm-2">Picture</label>
                        <input type="file" name="img" id="img" class="form-control col-sm-4"> 
                    </div>

                    <button type="submit" name="submit" class="btn btn-success rounded-pill col-12 mt-3">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "../../partitial/footer.php"; ?>
</body>

</html>


<?php
require_once __DIR__ . "../../partitial/connect.php";
$id = "";
$username = "";
$password = "";
$email = "";
$gender = "";
$url_picture = "";
$role = "client";
$birthday = "";
$phone = "";
$address = "";
$firstname = "";
$lastname = "";
$fullname = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    for ($i = 0; $i < 9; $i++) {
        $id .= random_int(0, 9);
    }

    if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    }

    if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    }

    $fullname = $lastname . " " . $firstname;

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = filter_var($_POST['phone'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[0-9]{10,}$/")));
    }

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    if (isset($_POST['address']) && !empty($_POST['address'])) {
        $address = $_POST['address'];
    }

    if (isset($_POST['birthday']) && !empty($_POST['birthday'])) {
        $birthday = date("Y-m-d", strtotime($_POST['birthday']));
    }

    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $gender = intval($_POST['gender']);
    }

    if (isset($_POST['submit'])) {
        if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
            $url_picture = $_FILES['img']['name'];
            if (move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . "/image/avatar/" . $url_picture)) {
                // Thành công khi upload
            } else {
                // Lỗi khi upload
                echo "Failed to upload image!";
            }
        }
    }

    $query = "INSERT INTO users(id, username, email, password, role, fullname, picture, gender, phone, address, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statment = $connect->prepare($query);
    $statment->execute([$id, $username, $email, $password, $role, $fullname, $url_picture, $gender, $phone, $address, $birthday]);
    
    if($statment->rowCount() > 0){
        $_SESSION['username'] = htmlspecialchars($result['username']);
        $_SESSION['password'] = htmlspecialchars($result['password']);
        $_SESSION['id'] = htmlspecialchars($result['id']);
        $_SESSION['img'] = htmlspecialchars($result['picture']);
        $_SESSION['role'] = htmlspecialchars($result['role']);
        $_SESSION['expire'] = time() + 3600;
        echo "
            <script>
                window.location.href = 'index.php'
            </script>";
        exit();
    } else {
        echo "
            <script>
                alert('Sign up failed!');
            </script>
        ";
    }

}
?>