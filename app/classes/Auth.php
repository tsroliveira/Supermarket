<?php
class Auth {
    #Created to validate credentials used in front end callers;
    private $db;
    private $authUser;
    private $authPass;

    public function __construct($conn, $authUser, $authPass) {
        $this->db = $conn;
        $this->authUser = $authUser;
        $this->authPass = $authPass;
    }
    
    public function validateCredentials() {
        $sql = "SELECT username, password FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->authUser]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData){
            if ($this->authUser === $userData['username'] && $this->authPass === base64_decode($userData['password'])) {
                return true;
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
?>
