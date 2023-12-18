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
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="image/favicons/home-page-favicon.jpg" type="image/x-icon">
</head>

<body>
  <?php
  include_once __DIR__ . "../../partitial/navbar.php";

  ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block" src="image/banner1.png" alt="First slide" width="100%" height="400px">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="image/banner2.png" alt="Second slide" width="100%" height="400px">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="image/banner3.png" alt="Third slide" width="100%" height="400px">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <main>
    <div class="container">
      <h3 class="h3 pt-2">NEWS</h3>
      <hr>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <a href="" target="_blank">
            <img src="image/sale-off.png" alt="sale off" class="img-fluid p-3 news">
          </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <a href="" target="_blank">
            <img src="image/best-seller.png" alt="sale off" class="img-fluid p-3 news">
          </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <a href="" target="_blank">
            <img src="image/voucher.png" alt="sale off" class="img-fluid p-3 news">
          </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <a href="" target="_blank">
            <img src="image/combo.png" alt="sale off" class="img-fluid p-3 news">
          </a>
        </div>
      </div>


      <h3 class="h3 pt-3">New recipes</h3>
      <a href="" class="text-decoration-none" target="_blank">See full products</a>

      <hr>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/hambergerchecken.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Fried chicken hamburger and tomato salad</h5>
              <p class="card-text">20.00$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/lemontea.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Hot lemon tea</h5>
              <p class="card-text">23.99$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/new_chickenfries.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Fried chicken and french fries with tomato sauce</h5>
              <p class="card-text">9.99$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/new_hamberger.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Grilled lamb hamburger</h5>
              <p class="card-text">20.50$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/potatoe.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Mashed potatoes grilled with cheese</h5>
              <p class="card-text">4.49$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/spaghetti.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Grilled lobster spaghetti with cheese sauce</h5>
              <p class="card-text">13.99$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/spaghetti2.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Seafood spaghetti</h5>
              <p class="card-text">17.78$</p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
          <div class="card shadow">
            <a href=""><img src="image/new-recipes/wellington.jpg" class="card-img-top img-fluid rounded"></a>
            <div class="card-body">
              <h5 class="card-title">Beef Wellington and bacon</h5>
              <p class="card-text">58.85$</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
  include_once __DIR__ . "../../partitial/footer.php";
  ?>
</body>

</html>