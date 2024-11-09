<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: view/view_menu_items.php');
    exit();
}

$totalAmount = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalAmount += (float)$item['price'] * (int)$item['quantity'];
}
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
            <a href="view/view_menu_items.php" class="btn bg-light">Continue Shopping</a>
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


    <div class="receipt-container">
        <div class="receipt-header">
            <h3>Mi Restaurante</h3>
            <p>Order Receipt</p>
            <p>Date: <?php echo date("Y-m-d H:i:s"); ?></p>
        </div>
        <div class="receipt-details">
            <p><strong>Customer:</strong> <?php echo htmlspecialchars($_SESSION['customer_name']); ?></p>
        </div>
        <div class="receipt-items">
            <h5>Order Items</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $subtotal = 0;
                        foreach ($_SESSION['cart'] as $item):
                            $itemTotal = $item['price'] * $item['quantity'];
                            $subtotal += $itemTotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td>P <?php echo number_format((float)$item['price'], 2); ?></td>
                            <td>P <?php echo number_format($itemTotal, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="receipt-total">
            <p class="total-amount">Subtotal: P <?php echo number_format($subtotal, 2); ?></span></p>
            <p class="total-amount">Delivery Fee: P <span id="deliveryFee">0.00</span></p>
            <p class="total-amount"><strong>Grand Total: P <span id="totalAmount"><?php echo number_format($subtotal, 2); ?></span></strong></p>
        </div>
        <div class="receipt-payment">
            <form action="process_payment.php" method="POST">
                <h5>Select Payment Method</h5>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="paymentMethod" value="CashOnDelivery" required>
                    <label class="form-check-label">Cash on Delivery</label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" name="paymentMethod" value="CreditCard" required>
                    <label class="form-check-label">Credit Card</label>
                </div>
                    
                <h5>Delivery Option</h5>
                <span><p>(note: when maximum capacity limit is reach the delivery vehicle will disable and you need to pick another type of vehicle)</p></span>
                <select class="form-select mb-3" id="deliverySelect" required>
                    <option value="Bike" data-fee="50">Bike - P 50</option>
                    <option value="Motorcycle" data-fee="70">Motorcycle - P 70</option>
                    <option value="Sedan" data-fee="100">Sedan - P 100</option>
                    <option value="Van" data-fee="150">Van - P 150</option>
                </select>
                <button type="submit" id="confirmPaymentBtn" class="btn btn-primary w-100" disabled>Confirm Payment</button>
            </form>
        </div>
        <div class="receipt-footer">
            <p>Thank you for ordering with us!</p>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const maxQuantity = 15;
        const cartQuantity = <?php echo array_sum(array_column($_SESSION['cart'], 'quantity')); ?>;
        const deliverySelect = document.getElementById("deliverySelect");
        const deliveryFeeElement = document.getElementById("deliveryFee");
        const totalAmountElement = document.getElementById("totalAmount");
        const confirmPaymentBtn = document.getElementById("confirmPaymentBtn");
        let baseSubtotal = <?php echo $subtotal; ?>;

        function updateDeliveryOptions() {
            let validOptionSelected = false;

            Array.from(deliverySelect.options).forEach(option => {
                const fee = parseFloat(option.dataset.fee);
                option.disabled = cartQuantity > maxQuantity && (option.value === "Bike" || option.value === "Motorcycle");
                if (!option.disabled) {
                    option.textContent = `${option.value} - P ${fee}`;
                }
                if (!option.disabled && option.selected) {
                    validOptionSelected = true;
                    updateTotal(fee);
                }
            });

            confirmPaymentBtn.disabled = !validOptionSelected;
        }

        function updateTotal(deliveryFee) {
            deliveryFeeElement.textContent = deliveryFee.toFixed(2);
            totalAmountElement.textContent = (baseSubtotal + deliveryFee).toFixed(2);
        }

        deliverySelect.addEventListener("change", function () {
            const selectedOption = deliverySelect.options[deliverySelect.selectedIndex];
            const deliveryFee = parseFloat(selectedOption.dataset.fee);
            confirmPaymentBtn.disabled = selectedOption.disabled; 
            updateTotal(deliveryFee);
        });

        updateDeliveryOptions();
    });
</script>

<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>
