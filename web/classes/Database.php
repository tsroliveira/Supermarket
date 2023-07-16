<?php
#Here I include in the beginer the credentials and remove it from the default constructor, but the class could be modified for to accept connections in others DB, have a lot of options
define('db_host', 'localhost');
define('db_user', 'sa');
define('db_pass', 'SqlServer2019!');
define('db_name', 'supermarket');

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct()
    {
        $this->hostname = db_host;
        $this->username = db_user;
        $this->password = db_pass;
        $this->database = db_name;
        $this->conn     = NULL;
        $this->getConnection();
    }
    public function getConnection()
    {        
        try {   
            $this->conn = new PDO("odbc:Driver={SQL Server};Server=$this->hostname;Database=$this->database;", $this->username, $this->password);
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }   
            
        catch( PDOException $e ) {   
            die( "Error connecting to SQL Server:".$e->getMessage() );    
        }
        return $this->conn; 
    }
}
?>

