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
</head>

<body>
    <?php
    include_once __DIR__ . "../../partitial/navbar.php";

    ?>
    <div class="container">
        <div class="row p-2">
            <div class="col-sm-12 col-md-5">
                <img src="image/login-img/Modern design.png" alt="" class="img-fluid rounded shadow">
            </div>

            <div class="col-sm-12 col-md-7">
                <h1 class="h1 bold text-center p-3">Sign up now</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="p-3 form">
                    <div class="form-group">
                        <label for="username" class="form-label font-weight-bold">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label font-weight-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success col-12 rounded-pill">Login</button>
                    </div>
                </form>



                <div class="container">
                    <p class="text-center font-weight-bold">OR</p>
                    <p>Need an<a href="signup.php" class=""> Account</a> <a href="signup.php" class="text-decoration-none"></a>?</p>
                    <a href="">
                        <button type="button" class="btn btn-primary col-12 rounded-pill">
                            <i class="fa-brands fa-facebook"></i> Sign in with Facebook
                        </button>
                    </a>

                    <a href="">
                        <button type="button" class="btn btn-secondary col-12 rounded-pill mt-3">
                            <i class="fa-brands fa-google"></i> Sign in with Google
                        </button>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <?php include_once __DIR__ . "../../partitial/footer.php"; ?>
</body>

</html>