<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';
require_once './model/Product.php';

class WebCartController
{
    private $auth;
    private $db;
    private $sql;
    private $url;

    public function __construct() {
        $this->url = 'http://localhost:8000/';
        $database = new Database();
        $conn = $database->getConnection(); 
        $getAuth = new Auth($conn);
        $this->auth = $getAuth->returnAuthWeb();
        $this->db = $conn;
        $this->sql = "SELECT 
                        p.id as 'pdid',
                        p.name, 
                        p.description , 
                        p.quantity,
                        p.id_pt,
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
    }

    public function list() {
        
        $stmt = $this->db->prepare($this->sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once './view/pages/cart/list.php';
    }

    public function checkoutCart() {
        require_once './view/pages/cart/create.php';
    }
    
    public function clearCart() {
        session_start();
        unset($_SESSION["cart"]);
        $msg = '<div class="alert alert-success text-light" role="alert">The cart was cleared.</div>';

        $stmt = $this->db->prepare($this->sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        require_once './view/pages/cart/list.php';
    }

    public function create() {
        $msg = "";
        session_start();

        if(!empty($_POST))
        {
            if (isset($_SESSION['cart'])) {
                if (count($_SESSION['cart']) == 0) {
                    $stmt = $this->db->prepare($this->sql);
                    $stmt->execute();
                    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $msg = '<div class="alert alert-danger" role="alert">There are no products added to the shopping cart.</div>';
                    require_once './view/pages/cart/create.php';
                }
                else {
                    foreach ($_SESSION['cart'] as $row) { 
                        $idpd           = $row['id'];
                        $name           = $row['name'];
                        $pvalue         = $row['pvalue'];
                        $tvalue         = $row['tvalue'];
                        $qtde           = $row['qtde'];
                        $stock          = $row['stock'] - $qtde;
                        $description    = $row['description'];
                        $id_pt          = $row['id_pt'];
                        $vtotal         = (($row['pvalue'] *  $row['tvalue']) * $row['qtde']);
                        $vtotal         = number_format($vtotal, 2, '.', '');                       

                        $curl = curl_init();            
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => $this->url.'report/add',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS =>'    {
                                "idpd": "'.$idpd.'",
                                "pvalue": "'.$pvalue.'",
                                "tvalue": "'.$tvalue.'",
                                "qtde": "'.$qtde.'",
                                "vtotal": "'.$vtotal.'"
                            }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json',
                            $this->auth
                        ),
                        ));

                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        $response = json_decode($response); 

                        if (isset($response->code) == 200){
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => $this->url . 'products/upd',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => ' {
                                        "id": "' . $idpd . '",
                                        "name": "' . $name . '",
                                        "description": "' . $description . '",
                                        "quantity": "' . $stock . '",
                                        "id_pt": "' . $id_pt . '",
                                        "value": "' . $pvalue . '"
                                    }',
                                CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json',
                                $this->auth
                                ),
                            ));
                            $response = curl_exec($curl);
                            curl_close($curl);
                            $response = json_decode($response);

                            $msg = '<div class="alert alert-success" role="alert"><br>'.$response->response.'<br><br></div>';

                            unset($_SESSION['cart'][$idpd]);
                        }
                    }
                    require_once './view/pages/cart/create.php';
                }
            }
        } 
        else {
            $stmt = $this->db->prepare($this->sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $msg = '<div class="alert alert-danger" role="alert">There are no products added to the shopping cart.</div>';
            require_once './view/pages/cart/create.php';
        }       
    }

    public function getReport(){
        $sql = "SELECT 
                    r.pvalue as 'price',
                    r.tvalue as 'taxe',
                    r.vtotal as 'finalvalue',
                    r.quantity,
                    r.[datetime],
                    p.id as 'pdid',
                    p.name, 
                    p.description , 
                    p.quantity,
                    p.id_pt,
                    p.value as 'pvalue',
                    pt.name as 'type',
                    pt.id as 'ptid',
                    t.id as 'txid',
                    t.taxe,
                    t.value as 'tvalue'
                FROM report r
                LEFT JOIN product p
                ON r.idpd = p.id
                LEFT JOIN productType pt
                ON p.id_pt = pt.id
                LEFT JOIN taxe t
                ON pt.id_tx = t.id                 
                ORDER BY r.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once './view/pages/cart/reports.php';

    }
}
?>
