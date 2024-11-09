<?php
require_once 'classes/connection.php';
require_once 'classes/customer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        $customer = Customer::create($name, $email, $address, $phone, $password);
        echo "
        <div class='container mx-auto mt-5'>
        <h2>Registration successful.</h2>
        <a href='login.php' class='btn btn-success'>Log in here</a>.
        </div>
        ";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="reg text-center">
        <div class="regbox mx-auto bg-warning-subtle rounded-3">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <div class="input-group mt-2">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" name="name" required><br>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Email</span>
                    <input type="email" class="form-control" name="email" required><br>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Address</span>
                    <input type="text" class="form-control" name="address" required><br>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Phone</span>
                    <input type="text" class="form-control" name="phone" required><br>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" name="password" required><br>
                </div>
                    <button type="submit" class="btn btn-dark mt-2">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>