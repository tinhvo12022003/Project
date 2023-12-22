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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Information
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Food</a>
                        <a class="dropdown-item" href="#">Drink</a>
                        <a class="dropdown-item" href="#">Snack</a>
                        <a class="dropdown-item" href="#">Dessert</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Order online</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php
            ob_start();
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                $query = "SELECT * FROM users WHERE username = ? AND password = ?";
                $statment = $connect->prepare($query);
                $statment->execute([$_SESSION['username'], $_SESSION['password']]);
                $result = $statment->fetch(PDO::FETCH_ASSOC);

                $path = "";

                if(htmlspecialchars($result['picture']) == ""){
                    $path = "default-avatar.png";
                } else {
                    $path = htmlspecialchars($result['picture']);
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
