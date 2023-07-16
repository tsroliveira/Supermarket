<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';
require_once './model/Product.php';

class WebCartController
{
    private $db;

    public function __construct() {
        $database = new Database();
        $conn = $database->getConnection(); 
        $this->db = $conn;
    }

    public function list() {
        $sql = "SELECT 
                    p.id as 'pdid',
                    p.name, 
                    p.description , 
                    p.quantity,
                    p.value as 'pvalue',
                    pt.name as 'type',
                    pt.id as 'ptid',
                    t.id as 'txid',
                    t.taxe,
                    t.value as 'tvalue'
                FROM product p
                LEFT JOIN productType pt
                ON p.id_pt = pt.id
                LEFT JOIN taxe t
                ON pt.id_tx = t.id                 
                ORDER BY p.name ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once './view/pages/cart/list.php';
    }

    public function create() {
        $product = $_POST['product'];
        $qtde    = $_POST['qtde'];
        require_once './view/pages/cart/update.php';
    }
    
    public function cartRem() {
    }

    public function clearCart() {
    }

    public function execute() {
    }

}
?>
