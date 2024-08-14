<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';

class WebUserController
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
        CURLOPT_URL => $this->url.'users',
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
        
        require_once './view/pages/users/list.php';
    }

    public function read()
    { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url . 'users/'. $_GET['id'],
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
        require_once './view/pages/users/read.php';
    }

    public function create()
    {
        $ok = "";
        if(!empty($_POST))
        {
            $name       = (isset($_POST['name']))       ? $_POST['name']        : '';   
            $username   = (isset($_POST['username']))   ? $_POST['username']    : '';   
            $password   = (isset($_POST['password']))   ? $_POST['password']    : '';   
            $profile    = (isset($_POST['profile']))    ? $_POST['profile']     : '';   

            $curl = curl_init();            
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'users/add',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'    {
                    "name": "'.$name.'",
                    "username": "'.$username.'",
                    "password": "'.$password.'",
                    "profile": "'.$profile.'"
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
        require_once './view/pages/users/create.php';
    }
    public function update()
    {
        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';    
        $ok = "";
        if(!empty($_POST)) {
            $id         = (isset($_POST['id']))         ? $_POST['id']          : '';   
            $name       = (isset($_POST['name']))       ? $_POST['name']        : '';   
            $username   = (isset($_POST['username']))   ? $_POST['username']    : '';   
            $password   = (isset($_POST['password']))   ? $_POST['password']    : '';   
            $profile    = (isset($_POST['profile']))    ? $_POST['profile']     : '';   
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->url.'users/upd',
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
                "username": "'.$username.'",
                "password": "'.$password.'",
                "profile": "'.$profile.'"
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
            CURLOPT_URL => $this->url.'users/'.$id,
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
        require_once './view/pages/users/update.php';
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
            CURLOPT_URL => $this->url.'users/del',
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
            CURLOPT_URL => $this->url . 'users/'. $_GET['id'],
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
        require_once './view/pages/users/delete.php';
    }
}