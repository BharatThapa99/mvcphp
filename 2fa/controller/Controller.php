
<?php 
require_once __DIR__ .'/../model/Model.php';

class Controller {

    public function viewLoginPage() {
        require_once __DIR__ .'/../view/login.php';
    }
    public function handleLogin($username, $password) {
        session_start();
        $model = new Model();
        if ($model->validate($username, $password)) {
            // echo "<h3>Logged In</h3>";
            
            $_SESSION['username'] = $username;

            $token = $model->generateToken();
            // echo "genrated token is $token";
            $model->saveToken($username,$token);
            $model->sendEmail($username,$token);
        } else {
            echo "Invalid credentials. Please go back and try again.";
        }
    }
    public function viewDisplay($username,$inputToken) {
        $model = new Model();

        $user = $model->getUserInfo($username);
        if ($user['token'] == $inputToken)
        {
            $_SESSION['authenticated'] = true;
            return $user;
        }
        else if ($_SESSION['old_token'] == $inputToken) {
                echo "Token Expired!";
        }
        else {
            echo "$inputToken = ".$user['token'] ." Token didn't matched";
        }
    }
    
    public function handleLogout() {
        unset($_SESSION["username"]);
        unset($_SESSION["authenticated"]);
        unset($_SESSION['old_token']);

       
    }
}


?>
