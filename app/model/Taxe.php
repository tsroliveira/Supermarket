<?php
class Taxe {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT * FROM taxe";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM taxe WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($taxe, $description, $value, $status) {
        try {
            $sql = "INSERT INTO taxe (taxe, description, value, status) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$taxe, $description, $value, $status]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Created: ' . $e->getMessage()));
            return $response;
        }
    }
    
    public function update($id, $taxe, $description, $value, $status) {
        try {
            $sql = "UPDATE taxe SET taxe = ?, description = ?, value = ?, status = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$taxe, $description, $value, $status, $id]);
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
            $sql = "DELETE FROM taxe WHERE id = ?";
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
}
?>
