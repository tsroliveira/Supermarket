<?php
require_once './classes/Database.php';
require_once './classes/Auth.php';

class HomeController
{
    public function index()
    {
        require_once './view/pages/home.php';
    }
}
?>