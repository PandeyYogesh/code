<?php
//echo password_hash('curtain_r_us@2017', PASSWORD_DEFAULT);
class Database
{   
    /*private $host = 'localhost';
    private $db_name = 'codoc_cars';
    private $username = 'root';
    private $password = '';*/
	
	private $host = 'codac.epizy.com';
    private $db_name = 'epiz_22476781_codac';
    private $username = 'epiz_22476781';
    private $password = 'a2U5gfa8wnMy';
	
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
 $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			//$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

?>

