<?php
session_start();

// If cart is empty, redirect to menu page
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: view/view_menu_items.php');
    exit();
}

// If form is submitted, process the "payment"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    unset($_SESSION['cart']);
    header('Location: view/view_restaurant.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Payment</title>
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


    <div class="container bg-warning-subtle credit-card rounded">
        <h2 class="text-center">Enter Credit Card Details</h2>
        
        <form action="credit_card_payment.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="cardNumber" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" required pattern="\d{16}" title="Enter a 16-digit card number">
            </div>
            
            <div class="mb-3">
                <label for="cardHolder" class="form-label">Card Holder Name</label>
                <input type="text" class="form-control" id="cardHolder" name="cardHolder" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                    <input type="text" class="form-control" id="expiryDate" name="expiryDate" required placeholder="MM/YY" pattern="\d{2}/\d{2}" title="Format MM/YY">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" required pattern="\d{3}" title="Enter a 3-digit CVV">
                </div>
            </div>

            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#success">Confirm Payment</button>

            <!-- The Modal -->
            <div class="modal" id="success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">PAYMENT SUCCESSFUL!</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Thank you for purchasing!
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.js"></script>

</body>
</html>
