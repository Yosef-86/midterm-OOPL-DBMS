<?php
session_start();

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

header('Location: ../view/view_order.php');
exit();
?>
