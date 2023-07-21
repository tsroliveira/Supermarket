<?php

require_once './classes/Database.php';
require_once './model/User.php';

class WebAppController
{
    private $user;

    public function __construct() {
        $database = new Database();
        $conn = $database->getConnection(); 
        $this->user = new User($conn);
    }

    public function home()
    {
        require_once './view/pages/home.php';
    }

    public function login() {
        if(!empty($_POST))
        {   
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $response = $this->user->getUserByLogin($username);
            if ($response) {
                if ( $password == base64_decode($response['password']) ) {
                    session_start();
                    $_SESSION["status"]   = 'online_mkt_key';
                    $_SESSION["username"] = $response['username'];
                    $_SESSION["profile"]  = $response['profile'];
                    $_SESSION["id"]       = $response['id'];
                    $_SESSION["fullname"] = $response['name'];
                    $presentation_Name    = explode(" ", $response['name']);
                    $_SESSION["name"]     = $presentation_Name[0];
                    header("Location: home");  
                }
            }
            else {
                $msg = '<div class="alert alert-warning" role="alert">Username or password doesn\'t match!</div>';
            }
        }
        require_once './view/pages/login.php';
    }

    public function logout() {
        session_start();
        unset($_SESSION["status"]);
        unset($_SESSION["username"]);
        unset($_SESSION["profile"]);
        unset($_SESSION["id"]);
        unset($_SESSION["fullname"]);
        unset($_SESSION["name"]);
        unset($_SESSION["cart"]);
        header("Location: login");
        exit;
    }
    
}
?>