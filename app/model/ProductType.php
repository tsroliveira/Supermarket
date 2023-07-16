<?php
class ProductType {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT * FROM productType";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM productType WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $sector, $id_tx) {
        try {
            $sql = "INSERT INTO productType (name, description, sector, id_tx) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $description, $sector, $id_tx]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Created: ' . $e->getMessage()));
            return $response;
        }
    }
    
    public function update($id, $name, $description, $sector, $id_tx) {
        try {
            $sql = "UPDATE productType SET name = ?, description = ?, sector = ?, id_tx = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $description, $sector, $id_tx, $id]);
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
            $sql = "DELETE FROM productType WHERE id = ?";
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
