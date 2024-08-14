<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';

class WebTaxeController
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
        CURLOPT_URL => $this->url.'taxes',
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
        
        require_once './view/pages/taxes/list.php';
    }

    public function read()
    { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url . 'taxes/'. $_GET['id'],
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
        require_once './view/pages/taxes/read.php';
    }

    public function create()
    {
        $ok = "";
        if(!empty($_POST))
        {
            $taxe           = (isset($_POST['taxe']))           ? $_POST['taxe']        : '';   
            $description    = (isset($_POST['description']))    ? $_POST['description']    : '';   
            $value          = (isset($_POST['value']))          ? $_POST['value']    : '';   
            $status         = (isset($_POST['status']))         ? $_POST['status']     : '';   

            $curl = curl_init();            
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'taxes/add',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'    {
                    "taxe": "'.$taxe.'",
                    "description": "'.$description.'",
                    "value": "'.$value.'",
                    "state": "'.$status.'"
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
        require_once './view/pages/taxes/create.php';
    }
    public function update()
    {
        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';    
        $ok = "";
        if(!empty($_POST)) {
            $id         = (isset($_POST['id']))         ? $_POST['id']          : '';   
            $taxe       = (isset($_POST['taxe']))       ? $_POST['taxe']        : '';   
            $description   = (isset($_POST['description']))   ? $_POST['description']    : '';   
            $value   = (isset($_POST['value']))   ? $_POST['value']    : '';   
            $status    = (isset($_POST['status']))    ? $_POST['status']     : '';   
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'taxes/upd',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => ' {
                "id": "'.$id.'",
                "taxe": "'.$taxe.'",
                "description": "'.$description.'",
                "value": "'.$value.'",
                "state": "'.$status.'"
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
            CURLOPT_URL => $this->url.'taxes/'.$id,
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
        require_once './view/pages/taxes/update.php';
    }

    public function delete()
    {
        $ok = "";
        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';
        if(!empty($_POST)) {
            $id     = $_POST['id'];
            $taxe   = $_POST['taxe'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url.'taxes/del',
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
                $ok = '<div class="alert alert-success text-center" role="alert">User ID Nº'.$id.'  ('.$taxe.') successfully deleted!</div>';
            }
        }
        else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . 'taxes/'. $_GET['id'],
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
        require_once './view/pages/taxes/delete.php';
    }
}