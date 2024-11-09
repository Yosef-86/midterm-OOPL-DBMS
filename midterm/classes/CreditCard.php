<?php

require_once 'PaymentMethod.php';

class CreditCard extends PaymentMethod {
    private $cardNumber;
    private $cardHolderName;

    public function __construct($amount, $cardNumber, $cardHolderName) {
        parent::__construct($amount);
        $this->cardNumber = $cardNumber;
        $this->cardHolderName = $cardHolderName;
    }

    public function processTransaction() {
        echo "Processing credit card payment of {$this->amount} for card holder: {$this->cardHolderName}.";
    }
}
?>
