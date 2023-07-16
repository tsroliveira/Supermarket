<?php
class User {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT id, name, username, profile FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $username, $password, $profile) {
        try {
            $sql = "INSERT INTO users (name, username, password, profile) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $username, $password, $profile]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Created: ' . $e->getMessage()));
            return $response;
        }
    }
    
    public function update($id, $name, $username, $password, $profile) {
        try {
            $sql = "UPDATE users SET name = ?, username = ?, password = ?, profile = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $username, $password, $profile, $id]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Update: ' . $e->getMessage()));
            return $response;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('User deletion failed: ' . $e->getMessage()));
            return $response;
        }
    }

    public function getUserByLogin($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
