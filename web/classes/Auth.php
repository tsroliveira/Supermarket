<?php
class Auth {
    private $db;
    private $frontendtoken;

    public function __construct($conn) {
        $this->db = $conn;
        $this->frontendtoken = 'frontendtoken';
    }
    
    public function returnAuthWeb() {
        $sql = "SELECT username, password FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->frontendtoken]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData){
            $username = $userData['username'];
            $password = base64_decode($userData['password']);
            $auth = 'Authorization: Basic ' . base64_encode("$username:$password");
        }
        return $auth;
    }
}
?>
