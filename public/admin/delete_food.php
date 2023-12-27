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

    ob_start();
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

            ?>

        </div>
    </nav>

    <div class='container-fluid p-5'>
        <div class='row'>
            <div class='col'>
                <img src="../image/product_picture/delete_product.png" alt="" class="img-fluid" width="100%">
                <table class='table'>
                    <thead class='thead-dark text-center'>
                        <th scope='col'>ID</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Price</th>
                        <th scope='col'>Picture</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Del</th>
                    </thead>

                    <tbody>

                        <?php

                        $query = "SELECT * FROM products";
                        $statment = $connect->prepare($query);
                        $statment->execute();
                        $products = $statment->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($products as $product) {
                            $path = ($product['picture'] !== "") ? $product['picture'] : "food-default.png";
                            echo "<tr class='justify-content-center align-items-center'>
                        <td class='text-center'>" . $product['id'] . "</td>
                        <td class='text-center'>" . $product['product_name'] . "</td>
                        <td class='text-center'>" . $product['price'] . "</td>
                        <td class='text-center'>
                            <img src='../image/product_picture/" . $path . "' class='img-fluid' width='350' height='auto'>
                        </td>
                        <td>" . $product['description'] . "</td>
                        <td class='text-center'>
                            <form action='" . $_SERVER['PHP_SELF'] . "' method='POST' enctype='multipart/form-data'>
                                <input type='hidden' name='id' value='" . $product['id'] . "'>
                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</button>
                            </form>
                        </td>
                    </tr>";
                        }
                        $id = "";
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            if (isset($_POST['id']) && !empty($_POST['id'])) {
                                $id = $_POST['id'];
                            }
                            $query = "DELETE FROM products WHERE id = ?";
                            $statment = $connect->prepare($query);
                            $statment->execute([$id]);
                            echo "
        <script>
            window.location.href = 'delete_food.php';
        </script>
    ";
                            exit();
                        }

                        ob_end_flush();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>