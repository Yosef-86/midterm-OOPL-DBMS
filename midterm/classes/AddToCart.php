<?php
session_start();
require_once('menu_items.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemId = $_POST['item_id'];
    $quantity = (int)$_POST['quantity'];

    $menu = new MenuItems();
    $item = $menu->getItemById($itemId);

    if ($item) {
        $cartItem = [
            'id' => $itemId,
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $quantity,
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $cartItem;
    }

    header('Location: ../view/view_menu_items.php');
    exit();
}

?>
