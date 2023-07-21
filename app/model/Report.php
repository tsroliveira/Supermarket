<?php
class Report {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT * FROM report";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM report WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($idpd, $pvalue, $tvalue, $quantity, $vtotal) {
        try {
            $sql = "INSERT INTO report (idpd, pvalue, tvalue, quantity, vtotal) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$idpd, $pvalue, $tvalue, $quantity, $vtotal]);
            $response = array('rowCount' => $stmt->rowCount(), 'message' => '');
            return $response;
        }
        catch (Exception $e) {
            $response = array('rowCount' => 0, 'message' => ('Exception found on Created: ' . $e->getMessage()));
            return $response;
        }
    }
    
    public function update($id, $idpd, $pvalue, $tvalue, $quantity, $vtotal) {
        try {
            $sql = "UPDATE report SET idpd = ?, pvalue = ?, tvalue = ?, vtotal = ?, quantity = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$idpd, $pvalue, $tvalue, $vtotal, $quantity, $id]);
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
            $sql = "DELETE FROM report WHERE id = ?";
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
