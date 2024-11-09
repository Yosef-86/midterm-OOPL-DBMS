<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar bg-warning fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand welcome">Welcome, <?php echo $_SESSION['customer_name'] ; ?>!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mi Restaurante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="view_restaurant.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </nav>
    
    
    <div class="container p-5" id="front-page">
        <h1 class="mt-5" id="res-name">Mi Restaurante</h1>
        <span><a href="view_menu_items.php" class="btn btn-warning m-me-3">ORDER NOW</a></span>
        <span><a href="view_order.php" class="btn btn-dark m-3">SHOPPING CART</a></span>
    </div>

    <div class="container d-flex align-items-center justify-content-center">
        <div id="carousel" class="carousel slide w-75" data-bs-ride="carousel">
            <div class="carousel-inner rounded-5">
                <div class="carousel-item active">
                    <img src="../resources/carousel7.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/carousel8.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/carousel9.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/carousel10.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/carousel11.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/carousel12.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    

        <footer class="text-white text-center text-lg-start mt-5" style="background-color: #23242a;">
            <!-- Grid container -->
            <div class="container p-4">
            <!--Grid row-->
            <div class="row mt-4">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">About company</h5>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                    voluptatum deleniti atque corrupti.
                </p>

                <p>
                    Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                    molestias.
                </p>

                </div>

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 pb-1">Contact</h5>


                <ul class="fa-ul" style="margin-left: 1.65em;">
                    <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Balanga, Bagong Silang 2100, PH</span>
                    </li>
                    <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">mirestauranteamore@example.com</span>
                    </li>
                    <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 01 234 567 88</span>
                    </li>
                    <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">+ 01 234 567 89</span>
                    </li>
                </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Opening hours</h5>

                <table class="table text-center text-white bg-warning-subtle">
                    <tbody class="font-weight-normal">
                    <tr>
                        <td>Mon - Thu:</td>
                        <td>8am - 9pm</td>
                    </tr>
                    <tr>
                        <td>Fri - Sat:</td>
                        <td>8am - 1am</td>
                    </tr>
                    <tr>
                        <td>Sunday:</td>
                        <td>9am - 10pm</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3 bg-warning">
            © 2024 Copyright:
            <a class="text-white" href="#">yoseffDgreat.com</a>
            </div>
        </footer>
        
        </div>

    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>