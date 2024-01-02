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
    <link rel="stylesheet" href="css/food.css">
    <link rel="shortcut icon" href="image/favicons/home-page-favicon.jpg" type="image/x-icon">
    <script src="js/script_food.js"></script>
</head>

<body>
    <?php require_once __DIR__ . "../../partitial/navbar.php" ?>
    <div class="image-container">
        <img src="image/food_img/bg_food.png" alt="Background Food">
    </div>
    <div class="container-fluid pt-3 shadow rounded">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-sm-12 text-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="type_food" value="burger">
                    <button type="submit" class="btn">
                        <i class="fa-solid fa-burger" style="font-size: 30px; color: red"></i>
                    </button>
                </form>

            </div>
            <div class="col-lg-4 col-sm-12 text-center ">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="type_food" value="pizza">
                    <button type="submit" class="btn">
                        <i class="fa-solid fa-pizza-slice" style="font-size: 30px; color: red"></i>
                    </button>
                </form>

            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="type_food" value="drink">
                    <button type="submit" class="btn">
                        <i class="fa-solid fa-mug-saucer" style="font-size: 30px; color: red"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                require_once __DIR__ . "../../partitial/connect.php";
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['type_food']) && !empty($_POST['type_food'])) {
                        $query = "SELECT * FROM products WHERE type = ?";
                        $statment = $connect->prepare($query);
                        $statment->execute([$_POST['type_food']]);
                        $result = $statment->fetchAll(PDO::FETCH_ASSOC);

                        echo '
                            <div id="carouselExampleIndicators" class="carousel slide p-5 shadow mt-4" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    
                            ';

                        
                        echo '</ol>
                            <div class="carousel-inner">
                            ';
                        $active = "active";
                        for ($i = 0; $i < $statment->rowCount(); $i += 4) {
                            echo '<div class="carousel-item ' . $active . '">';
                            echo '<div class="row">';
                            for ($j = $i; $j < $i + 4 && $j <$statment->rowCount(); $j++) {
                                echo '
                                    <div class="col-sm-12 col-md-2 col-lg-3 p-3">
                                        <div class="card shadow">
                                            <a href=""><img src="image/product_picture/'.$result[$j]['picture'].'" class="card-img-top img-fluid rounded card-hover-burger"></a>
                                            <div class="card-body">
                                                <h5 class="card-title">'.$result[$j]['product_name'].'</h5>
                                                <p class="card-text">'.$result[$j]['price'].'$</p>
                                            </div>
                                            <div class="card-footer">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="order_product" value="'.$result[$j]['id'].'" >
                                                    <button type="submit" class="btn btn-primary">Add card</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            }
                            echo "</div>";
                            echo "</div>";
                            $active = "";
                        }
                        echo '</div>
                        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                        ';
                        
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <?php require_once __DIR__ . "../../partitial/footer.php" ?>
</body>

</html>

