<?php
session_start();
include_once __DIR__ . "/connect.php";
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php
                                        echo "index.php";
                                        ?>" target="_blank">
            <img src="image/logo.jpg" alt="logo" class="rounded-circle" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php
                                                echo "index.php";
                                                ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="food.php">Products</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Order online</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <a href="" class="shoping-cart mr-3">
                <i class="fa-solid fa-cart-shopping nav-link my-2 my-lg-0 text-light" style="font-size: 40px"></i>
                <span class="rounded-circle badge badge-light text-decoration-none text-danger">
                    <?php
                        $quantity = 0;
                        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
                            $query = "SELECT * FROM detail_bill WHERE username = ? AND password = ?";
                            $statment = $connect->prepare($query);
                            $statment->execute([$_SESSION['username'], $_SESSION['password']]);

                            if($statment->rowCount() > 0){
                                $quantity = $statment->rowCount();
                            }
                        }
                        echo $quantity;
                    ?>
                </span>
            </a>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php
            ob_start();
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if($_SESSION['role'] == 'client'){
                    $path = "user_img/" . $_SESSION['img'];
                } else if($_SESSION['role'] == 'admin'){
                    $path = "admin_img/" . $_SESSION['img'];
                }
                echo "
                    <a href='client/client.php'>
                        <img src='image/avatar/" . $path . "' class='rounded-circle p-1' width='50' height='50'>
                    </a>
                    <ul class='navbar-nav '>
                        <li class='nav-item'>
                            <a href='logout.php' class='nav-link my-2 my-sm-0'>Log out</a>
                        </li>
                    </ul>
                ";
            } else {
                echo "
                    <ul class='navbar-nav '>
                        <li class='nav-item'>
                            <a class='nav-link my-2 my-sm-0' href='login.php'>Login</a>
                            
                        </li>

                        <li class='nav-item'>
                            
                            <a class='nav-link my-2 my-sm-0' href='signup.php'>Sign up</a>
                        </li>
                    </ul>
                    ";
            }
            ob_end_flush();
            ?>

        </div>
    </nav>
    </div>

<style>
    .shoping-cart{
        position: relative;
    }

    .badge{
        position: absolute;
        left: 40px
    }
</style>



