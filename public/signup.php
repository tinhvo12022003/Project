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
    <?php include_once __DIR__ . "../../partitial/navbar.php"; ?>
    <div class="container p-3 mt-4">
        <div class="row ">
            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto rounded shadow border border-success">
                <h1 class="text-center text-success pt-4">Sign up</h1>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="p-3">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">First name:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control col-sm-4" placeholder="Your first name..." required>
                        <label for="lastname" class="col-sm-2 col-form-label">Last name:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control col-sm-4" placeholder="Your last name..." required>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control col-sm-4" placeholder="Your email..." required>
                        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control col-sm-4" placeholder="Your phone..." required>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control col-sm-4" placeholder="Username..." required> 
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control col-sm-4" placeholder="Password..." required>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control col-sm-4" placeholder="Your address..."></textarea>

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
                </form>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "../../partitial/footer.php"; ?>
</body>

</html>