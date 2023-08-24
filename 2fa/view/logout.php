<?php
require_once '../controller/Controller.php';
session_start();

$controller = new Controller();
$controller->handleLogout();

echo "<h3> You are logged out!! Goodbye</h3>";
?>
<a href="../index.php">Login here</a>
