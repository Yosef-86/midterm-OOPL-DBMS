<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand welcome">Welcome, <?php echo $_SESSION['customer_name']; ?>!</a>
            <a href="view_menu_items.php" class="btn bg-light">Continue Shopping</a>
            <a href="../checkout.php" class="btn btn-info">Proceed to Checkout</a>
        </div>
    </nav>

    <div class="container pt-5 bg-light cart-table rounded-4">
        <h2 class="text-center">Your Cart</h2>
        
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $totalAmount = 0;
                        foreach ($_SESSION['cart'] as $index => $item):
                            $itemTotal = (float)$item['price'] * $item['quantity'];
                            $totalAmount += $itemTotal;
                    ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>P <?php echo number_format((float)$item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>P <?php echo number_format($itemTotal, 2); ?></td>
                        <td>
                            <form action="../classes/RemoveFromCart.php" method="POST" style="display:inline;">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-end">
                <h4>Total: P <?php echo number_format($totalAmount, 2); ?></h4>
            </div>
        <?php else: ?>
            <p class="text-center mt-5">Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <script src="../js/bootstrap.js"></script>
</body>
</html>
