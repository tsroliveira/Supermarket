<?php
    #GET Session
    require_once './classes/Database.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if ($_SESSION["status"] == 'online_mkt_key') 
    {  
        #Segue em frente
    }    
    if ($_SESSION["status"] != 'online_mkt_key') 
    {
        session_destroy();
        header("Location: login");
        exit;
    }
?>