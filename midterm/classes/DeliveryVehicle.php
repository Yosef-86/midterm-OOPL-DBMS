<?php
require_once 'DeliveryMode.php';

class DeliveryVehicle extends DeliveryMode {
    public function calculateDeliveryFee() {
        return $this->fee;
    }

    public function isAvailable($quantity) {
        return $quantity <= 15;
    }
}
?>