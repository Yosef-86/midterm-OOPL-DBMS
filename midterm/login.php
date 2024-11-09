<?php
require_once 'classes/customer.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $customer = Customer::authenticate($email, $password);
    if ($customer) {
        $_SESSION['customer_id'] = $customer->id;
        $_SESSION['customer_name'] = $customer->name;
        header("Location: view/view_restaurant.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="main text-center">
        <div class="loginbox mx-auto bg-warning-subtle rounded-3">
            <h2>Login</h2>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        
            <form action="login.php" method="POST">
                <div class="input-group mt-5">
                    <span class="input-group-text">Email</span>
                    <input type="email" class="form-control" name="email" required><br>
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" name="password" required><br>
                </div>
                <button type="submit" class="btn btn-warning mt-2">Login</button>
                <button onclick="register()" class="btn btn-dark mt-2">Register</button>
            </form>
                
        </div>
    </div>
    
    <script src="js/main.js"></script>
</body>
</html>