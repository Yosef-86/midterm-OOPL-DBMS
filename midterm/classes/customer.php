<?php
require_once 'connection.php';

class Customer {
    public $id, $name, $email, $address, $phone;

    public function __construct($id, $name, $email, $address, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }

    public static function create($name, $email, $address, $phone, $password) {
        global $connection;
        $stmt = $connection->prepare("INSERT INTO customers (name, email, address, phone, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $address, $phone, $password]);
        return new Customer($connection->lastInsertId(), $name, $email, $address, $phone);
    }

    public static function authenticate($email, $password) {
        global $connection;
        $stmt = $connection->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            return new Customer($row['id'], $row['name'], $row['email'], $row['address'], $row['phone']);
        } else {
            return null;
        }
    }
}
?>