<?php
require_once '../controller/Controller.php';

// Usage in verification.php
$username = $_POST['username'];
$password = $_POST['password'];

$controller = new Controller();
$controller->handleLogin($username, $password);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verification Page</title>
</head>
<body>
    <h2>Verification Page</h2>
    <b>An email has been sent. Please check inbox (and spam)</b>
</body>
</html>
