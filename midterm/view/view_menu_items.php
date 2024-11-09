<?php include('../classes/menu_items.php');  
session_start();

$totalQuantity = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];  // Add up the quantity of each item in the cart
    }
}

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
            <span><a href="view_order.php" class="btn bg-light"><img src="../resources/cart1.png" alt="">Cart <?php if ($totalQuantity > 0): ?>
                    <span class="badge bg-danger"><?php echo $totalQuantity; ?></span>
                <?php endif; ?> </a></span>
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

    <div id="alertSuccess" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 20px; right: 20px; z-index: 1050;">
        Item added to cart successfully!
    </div>
    
    <p class="container text-center best-seller">Our Best Sellers</p>

    
    <div class="container p-2 mt-5">
        <div class="row">
            <div class="col">
                <div class="row">
                <?php 
                    $menu = new MenuItems();
                    $menu_items = $menu->viewMenu();
                    foreach ($menu_items as $key => $value) {
                        echo '<div class="col">
                                <div class="card bg-warning-subtle mt-5" style="width: 18rem;">
                                    <img id="menu-images" src="../resources/'. $value['image'] .'.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"> P ' . $value['price'] . ' . 00</h5>
                                        <p class="card-text">'. $value['name'] .'</p>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" 
                                                data-bs-target="#addToCartModal" data-id="' . $value['id'] . '">
                                        Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>';    
                    }
                ?>

                </div>                
            </div>
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

    
    
    
    <!-- Add to Cart Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../classes/AddToCart.php" method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Quantity input -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" min="1" value="1" class="form-control">
                    </div>
                    <!-- Hidden field for Menu Item ID -->
                    <input type="hidden" name="item_id" id="item_id">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Add to cart</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>
</html>