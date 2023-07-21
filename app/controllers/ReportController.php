<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';
require_once './model/Report.php';

class ReportController
{
    private $report;
    private $auth;

    public function __construct() {
        $database = new Database();
        $conn = $database->getConnection(); 
        $this->report = new Report($conn);

        $authUser = isset($_SERVER['PHP_AUTH_USER'])  ?  $_SERVER['PHP_AUTH_USER']  : ""; 
        $authPass = isset($_SERVER['PHP_AUTH_PW'])    ?  $_SERVER['PHP_AUTH_PW']    : "";
        $this->auth = new Auth($conn, $authUser, $authPass);
    }

    public function list()
    { 
        if ($this->auth->validateCredentials()) {
            $response = $this->report->list();
            if (count($response) == 0) {
                header('HTTP/1.0 200 OK');
                $response = array('code' => 204, 'response' => 'No content available');
                echo json_encode($response);
            }
            else {
                header('HTTP/1.0 200 OK');
                $response = array('code' => 200, 'response' => $response);
                echo $response = json_encode($response);
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Autenticação"');
            header('HTTP/1.0 401 Unauthorized');
            $response = array('code' => 401, 'response' => 'Authentication failed');
            echo json_encode($response);
        }
    }

    public function read($id)
    { 
        if ($this->auth->validateCredentials()) {
            $response = $this->report->read($id);
            if ($response === false) {
                header('HTTP/1.0 200 OK');
                $response = array('code' => 200, 'response' => "No record found");
                echo $response = json_encode($response);
            }
            else {
                header('HTTP/1.0 200 OK');
                $response = array('code' => 200, 'response' => $response);
                echo $response = json_encode($response);
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Autenticação"');
            header('HTTP/1.0 401 Unauthorized');
            $response = array('code' => 401, 'response' => 'Authentication failed');
            echo json_encode($response);
        }
    }

    public function create()
    {
        if ($this->auth->validateCredentials()) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this->report->create($data['idpd'], $data['pvalue'], $data['tvalue'], $data['qtde'], $data['vtotal']);
          
            if ($response['rowCount'] > 0) {
                header('HTTP/1.0 200 OK');
                $response = "Report successfully created";
                $response = array('code' => 200, 'response' => $response);
                echo $response = json_encode($response);
            }
            else {
                header('HTTP/1.0 400 Bad Request');
                $response = array('code' => 400, 'response' => $response['message']);
                echo json_encode($response);
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Autenticação"');
            header('HTTP/1.0 401 Unauthorized');
            $response = array('code' => 401, 'response' => 'Authentication failed');
            echo json_encode($response);
        }
    }
    public function update()
    {
        if ($this->auth->validateCredentials()) {

            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this->report->update($data['id'], $data['idpd'], $data['pvalue'], $data['tvalue'], $data['qtde'], $data['vtotal']);

            if ($response['rowCount'] > 0) {
                header('HTTP/1.0 200 OK');
                $response = ("Report updated successfully");
                $response = array('code' => 200, 'response' => $response);
                echo $response = json_encode($response);
            }
            else {
                header('HTTP/1.0 409 Conflict');
                $message = ($response['message'] == "") ? "ProductType update failure" : $response['message'];
                $response = array('code' => 409, 'response' => $message);
                echo json_encode($response);
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Autenticação"');
            header('HTTP/1.0 401 Unauthorized');
            $response = array('code' => 401, 'response' => 'Authentication failed');
            echo json_encode($response);
        }
    }

    public function delete()
    {
        if ($this->auth->validateCredentials()) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this->report->delete($data['id']);
            
            if ($response['rowCount'] > 0) {
                header('HTTP/1.0 200 OK');
                $response = array('code' => 200, 'response' => ("ProductType ID ". $data['id'] . " successfully deleted "));
                echo $response = json_encode($response);
            }
            else {
                header('HTTP/1.0 400 Bad Request');
                $message = ($response['message'] == "") ? ('Bad request for '.$data['id']) : $response['message'];
                $response = array('code' => 400, 'response' => $message);
                echo $response = json_encode($response);
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Autenticação"');
            header('HTTP/1.0 401 Unauthorized');
            $response = array('code' => 401, 'response' => 'Authentication failed');
            echo json_encode($response);
        }
    }
}