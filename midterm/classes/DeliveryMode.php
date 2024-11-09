<?php
// DeliveryMode.php
abstract class DeliveryMode {
    protected $fee;

    public function __construct($fee) {
        $this->fee = $fee;
    }

    abstract public function calculateDeliveryFee();
    abstract public function isAvailable($quantity);
}

?>