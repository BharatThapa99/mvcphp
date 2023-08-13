<?php
class LoginController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = $this->model->getUserByUsername($username);

                if ($user && $user['password'] === $password) {
                    // Generate a random token (you can modify the function to generate a token as you see fit)
                    $token = $this->generateRandomToken(7);

                    // Save the token in the database for the user (You need to implement this function in the model)
                    $this->model->saveUserToken($username, $token);

                    // Send the email with the unique URL containing the token
                    $this->sendEmail($user['username'], $username, $token);

                    // Notify the user
                    $this->view->showNotification('An email has been sent. Please check your inbox (and spam).');
                } else {
                    $this->view->showLoginForm('Invalid username or password.');
                }
            }
        } else {
            $this->view->showLoginForm();
        }
    }

    private function sendEmail($username, $token) {
        // Replace 'your_email@example.com' with your actual email address
        // ini_set('SMTP', 'ssl://smtp.gmail.com');
        // ini_set('smtp_port', 587);
        $subject = 'Login Link';
        // $message = "Dear ".$username.",
        // Please use this link to login to the website:
        // http://<ipaddress>/.../display.php?username=".$username."&token=".$token."
        
        // Admin Team";
        $message = "Dear $username please use"."\r\n"."this link to login to the website:";
        // $message = escapeshellarg($message);
        // $headers = "From: achrxn@gmail.com";
        $email = "thapabharat1231@yahoo.com";
        // mail("thapabharat1231@yahoo.com", $subject, $message, $headers);
        // echo '<pre>';
        // $message = "hellow";
        $stri = 'wsl echo -e "' . "Dear $username, please \n fk off". '" | wsl mail -s "' . $subject . '" ' . $email;
        // $stri = 'wsl echo "' . str_replace('"', '\\"', $message) . '" | wsl mail -s "' . $subject . '" ' . $email;

        // $stri = "wsl echo -e "."$message"." | wsl mail -s "."$subject" . $email;
        // $stri = "wsl echo -e "$message\" | wsl mail -s \"$subject\" $email";

        $last_line = system($stri, $retval);
        // echo '</pre> <hr />Last line of the output: ' . $last_line . ' <hr/>
        echo 'Return value: ' . $retval;
        return $retval;
        

    }

    function generateRandomToken($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $token .= $characters[$randomIndex];
        }
        // echo "<b>token </b>". $token;
        return $token;
    }


}
?>
