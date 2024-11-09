<?php
session_start();
require_once('menu_items.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemId = $_POST['item_id'];
    $quantity = (int)$_POST['quantity'];
    $deliveryMethod = $_POST['deliveryMethod'];
    $paymentMethod = $_POST['paymentMethod'];
    $deliveryVehicle = $_POST['deliveryVehicle'];

    $menu = new MenuItems();
    $item = $menu->getItemById($itemId);

    if ($item) {
        $cartItem = [
            'id' => $itemId,
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $quantity,
            'deliveryMethod' => $deliveryMethod
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $cartItem;
    }

    // Store payment method and delivery vehicle in the session
    $_SESSION['paymentMethod'] = $paymentMethod;
    $_SESSION['deliveryVehicle'] = $deliveryVehicle;

    header('Location: ../view/view_items.php');
    exit();
}

?>
