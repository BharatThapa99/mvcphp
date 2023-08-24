<?php
class Model {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'test');
        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }
    }
    public function saveToken($username, $token) {
        $query = "UPDATE customer SET token = '$token' WHERE username = '$username'";
        $result = $this->db->query($query);

        if (!$result) {
            die('Error updating token: ' . $this->db->error);
        }
    }
    function generateToken() {
        $bytes = random_bytes(7);
        $token = substr(bin2hex($bytes), 0, 7);

        // echo $token;
        // echo "<b>token </b>". $token;
        return $token;
    }

    function sendEmail($username, $token) {
        
        $subject = 'Login Link';
        
        $message = "Dear $username, Please use this login link to continue. http://localhost/mvc/2fa/view/display.php?username=$username&token=$token. - Admin team";
        // $message = "hello world ";
        
        $email = "thapabharat1231@yahoo.com";
        
        $stri = 'wsl echo "' . $message .'" | wsl mail -s "' . $subject . '" ' . $email;
   
        $last_line = system($stri, $retval);
        
        return $retval;
        

    }

    public function validate($username,$password) {
        $query = "SELECT * FROM customer WHERE username = '$username'";
        $result = $this->db->query($query);
        $result = $result->fetch_assoc();
        if ($result['username']== $username && $result['password'] == $password) {
            $_SESSION['old_token'] = $result['token'];
            return true;
        } else {
            return false;
        }
        // return $result->fetch_assoc();
    }

    public function getUserInfo($username) {
        $query = "SELECT * FROM customer WHERE username = '$username'";
        $result = $this->db->query($query);
        
        return $result->fetch_assoc();
        
    }
}
?>
