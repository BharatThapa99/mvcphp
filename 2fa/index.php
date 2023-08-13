<?php
// Include the required files
require_once 'model/Model.php';
require_once 'view/View.php';
require_once 'controller/Controller.php';

// Initialize the model, view, and controller
$model = new UserModel();
$view = new LoginView();
$controller = new LoginController($model, $view);

// Handle the user's request
$controller->handleRequest();
$to = "thapabharat1231@yahoo.com";  // Replace with the recipient's email address
$subject = "Test Email from WSL";
$message = "This is a test email sent from WSL using PHP's system() function.\n\nThis is a new line.\nAnd another new line.";

// Command to send email
$command = "wsl printf \"%s\" \"$message\" | wsl mail -s \"$subject\" \"$to\"";

// Execute the command
$output = system($command, $return_var);

if ($return_var == 0) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email. Exit status: " . $return_var;
}
?>