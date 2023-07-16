<?php
class Product {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT * FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $quantity, $id_pt, $value) {
        try {
            $sql = "INSERT INTO product (name, description, quantity, id_pt, value) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $description, $quantity, $id_pt, $value]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Created: ' . $e->getMessage()));
            return $response;
        }
    }
    
    public function update($id, $name, $description, $quantity, $id_pt, $value) {
        try {
            $sql = "UPDATE product SET name = ?, description = ?, quantity = ?, id_pt = ?, value = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $description, $quantity, $id_pt, $value, $id]);
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
            $sql = "DELETE FROM product WHERE id = ?";
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
