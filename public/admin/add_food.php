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
    <script src="../js/check_add_food.js"></script>
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

    <div class="container p-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 border rounded shadow p-5">
                <div class="justify-content-center align-items-center">
                    <img src="../image/product_picture/add_food.png" alt="" class="img-fluid">
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="form-add-product">
                    <div class="form-group row">
                        <label for="product_id" class="col-sm-3 col-form-label">ID product</label>
                        <input type="text" name="product_id" id="product_id" class="form-control col-sm-9" required placeholder="Enter product ID">
                    </div>

                    <div class="form-group row">
                        <label for="product_name" class="col-sm-3 col-form-label">Product name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control col-sm-9" required placeholder="Enter product name">
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control col-sm-9" required placeholder="Enter price">
                    </div>
                    <div class="form-group row">
                        <label for="picture_product" class="col-sm-3 col-form-label">Picture product</label>
                        <input type="file" name="picture_product" id="picture_product" class="form-control col-sm-9">
                    </div>

                    <div class="form-group row">
                        <label for="type_product" class="col-sm-3 col-form-label">Type product</label>
                        <select name="type_product" id="type_product" class="form-control col-sm-9">
                            <option value="burger" class="form-control" active>Burger</option>
                            <option value="pizza" class="form-control">Pizza</option>
                            <option value="drink" class="form-control">Drink</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control col-sm-9" placeholder="Enter description"></textarea>
                    </div>

                    <div class="row justify-content-center align-items-center pt-5">
                        <button type="submit" class="btn btn-success col-md-3" name="submit">Add</button>
                        <button type="reset" class="btn btn-danger col-md-3 ml-3">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
ob_start();
$product_name = "";
$price = "";
$description = "";
$url_picture = "";
$id = "";
$type = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
        $id = $_POST['product_id'];
    }

    if(isset($_POST['product_name']) && !empty($_POST['product_name'])){
        $product_name = $_POST['product_name'];
    }

    if(isset($_POST['price']) && !empty($_POST['price'])){
        $price = doubleval($_POST['price']);
    }

    if(isset($_POST['description']) && !empty($_POST['description'])){
        $description = $_POST['description'];
    }

    if(isset($_POST['submit'])){
        if(isset($_FILES['picture_product']) && !empty($_FILES['picture_product']['name'])){
            $url_picture = $_FILES['picture_product']['name'];
        }
    }

    if(isset($_POST['type_product']) && !empty($_POST['type_product'])){
        $type = $_POST['type_product'];
    }

    $query = "SELECT * FROM products WHERE id = ?";
    $statment = $connect->prepare($query);
    $statment->execute([$id]);

    if($statment->rowCount() > 0){
        echo "
            <script>
                alert('Product's ID already exists');
            </script>
        ";
    } else {
        $query = "INSERT INTO products(id, product_name, price, description, picture, type) VALUES (?, ?, ?, ?, ?, ?)";
        $statment = $connect->prepare($query);
        $statment->execute([$id, $product_name, $price, $description, $url_picture, $type]);
        move_uploaded_file($_FILES['picture_product']['tmp_name'], "../image/product_picture/".strtolower($type). '/' . $url_picture);
        echo "
            <script>
                alert('Add product successful');
            </script>
        ";
    }
} 

ob_end_flush();
?>