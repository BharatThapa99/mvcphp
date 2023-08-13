<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'test');
        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }
    }
    public function saveUserToken($username, $token) {
        $username = $this->db->real_escape_string($username);
        $token = $this->db->real_escape_string($token);
        
        // Replace 'your_table_name' with the actual name of the table where user data is stored.
        $query = "UPDATE customer SET token = '$token' WHERE username = '$username'";
        $result = $this->db->query($query);

        if (!$result) {
            die('Error updating token: ' . $this->db->error);
        }
    }

    public function getUserByUsername($username) {
        $username = $this->db->real_escape_string($username);
        $query = "SELECT * FROM customer WHERE username = '$username'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }
}
?>
