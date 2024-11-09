<?php
session_start();

if (!isset($_POST['paymentMethod'])) {
    header('Location: checkout.php');
    exit();
}

$paymentMethod = $_POST['paymentMethod'];
$_SESSION['paymentMethod'] = $paymentMethod;

if ($paymentMethod === 'CreditCard') {
    header('Location: credit_card_payment.php');
    exit();
} elseif ($paymentMethod === 'CashOnDelivery') {
    header('Location: cash_on_delivery.php');
    unset($_SESSION['cart']);
    exit();
}
?>
