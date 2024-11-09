<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
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
                        <a class="nav-link active" aria-current="page" href="view/view_restaurant.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container bg-warning-subtle cod rounded-4">
        <h1>Your order has been confirmed! Payment will be collected upon delivery.</h1>
        <h2>Thank you for purchasing!</h2>
        <a class="btn btn-dark" href="view/view_restaurant.php">Back to homepage</a>
    </div>

<script src="js/bootstrap.js"></script>
</body>
</html>