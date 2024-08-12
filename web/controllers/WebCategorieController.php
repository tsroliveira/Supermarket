<?php
require_once './classes/Config.php';
require_once './classes/Database.php';
require_once './classes/Auth.php';

class WebCategorieController
{
    private $auth;
    private $url;

    public function __construct() {
        $database = new Database();
        $conn = $database->getConnection(); 
        $getAuth = new Auth($conn);
        $this->auth = $getAuth->returnAuthWeb();
        $this->url = BASE_URL;
    }

    public function list()
    { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url.'productType',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            $this->auth
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        
        require_once './view/pages/categories/list.php';
    }

    public function read()
    { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url . 'productType/'. $_GET['id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            $this->auth
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        $response = $response->response;
        require_once './view/pages/categories/read.php';
    }

    public function create()
    {
        $ok = "";
        if(!empty($_POST))
        {
            $name           = (isset($_POST['name']))           ? $_POST['name']        : '';   
            $description    = (isset($_POST['description']))    ? $_POST['description']    : '';   
            $sector          = (isset($_POST['sector']))          ? $_POST['sector']    : '';   
            $id_tx         = (isset($_POST['id_tx']))         ? $_POST['id_tx']     : '';   

            $curl = curl_init();            
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'productType/add',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'    {
                    "name": "'.$name.'",
                    "description": "'.$description.'",
                    "sector": "'.$sector.'",
                    "id_tx": "'.$id_tx.'"
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
              $ok = '<div class="alert alert-success" role="alert"><br>'.$response->response.'<br><br></div>';
            }
        }
        require_once './view/pages/categories/create.php';
    }
    public function update()
    {
        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';    
        $ok = "";
        if(!empty($_POST)) {
            $id         = (isset($_POST['id']))         ? $_POST['id']          : '';   
            $name       = (isset($_POST['name']))       ? $_POST['name']        : '';   
            $description   = (isset($_POST['description']))   ? $_POST['description']    : '';   
            $sector   = (isset($_POST['sector']))   ? $_POST['sector']    : '';   
            $id_tx    = (isset($_POST['id_tx']))    ? $_POST['id_tx']     : '';   
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'productType/upd',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => ' {
                "id": "'.$id.'",
                "name": "'.$name.'",
                "description": "'.$description.'",
                "sector": "'.$sector.'",
                "id_tx": "'.$id_tx.'"
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
              $ok = '<div class="alert alert-success" role="alert"><br>'.$response->response.'<br><br></div>';
            }
        }  
        else {
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url.'productType/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $this->auth
            ),
          ));
          $response = curl_exec($curl);
          curl_close($curl);
          $response = json_decode($response);
          $response = $response->response;
        }
        require_once './view/pages/categories/update.php';
    }

    public function delete()
    {
        $ok = "";
        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';
        if(!empty($_POST)) {
            $id     = $_POST['id'];
            $name   = $_POST['name'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url.'productType/del',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'    {
                    "id": '.$id.'
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
                $ok = '<div class="alert alert-success text-center" role="alert">User ID Nº'.$id.'  ('.$name.') successfully deleted!</div>';
            }
        }
        else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . 'productType/'. $_GET['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $this->auth
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            $response = $response->response;    
        }
        require_once './view/pages/categories/delete.php';
    }
}