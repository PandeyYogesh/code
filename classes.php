<?php
//$new_password = password_hash('curtainrus@2017', PASSWORD_DEFAULT);
//echo $new_password;
require_once('codac_confi_file.php');
class Manufacturer{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_manufacturer";
  
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
    
	
    function mcreate(){
    $query = "INSERT INTO " . $this->table_name . "
                     SET
                     `manufacturer_name`= :manufacturer_name,`flag`= :flag,`created_date`= :created_date";
					 
        $stmt = $this->conn->prepare($query);
		$stmt->bindParam(":manufacturer_name", $this->manufacturer_name);
	    $stmt->bindParam(":flag", $this->flag);
		$stmt->bindParam(":created_date", $this->created_date);
		
		
		 if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }
     
    }
	function mreadAll($from_record_num, $records_per_page){
    $query = "SELECT  * FROM " . $this->table_name . " WHERE flag = 0 ORDER BY id DESC  LIMIT ".$from_record_num.", ".$records_per_page;
	$stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
// used for paging products
public function mcountAll(){
 
    $query = "SELECT id FROM " . $this->table_name . " WHERE flag = 0 ";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $num = $stmt->rowCount();
    return $num;
}
function mreadOne(){
 
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->catalogue_name = $row['catalogue_name'];
    $this->pattern_number = $row['pattern_number'];
    $this->image = $row['image'];
   
}

}

class Model{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_model";
  
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
  


    function mo_create(){
    $query = "INSERT INTO " . $this->table_name . "
                     SET
                     `model_name`= :model_name,`manufacturer_id`= :manufacturer_id,`colour`= :colour,`year`= :year,`registration_number`= :registration_number,`note`= :note,`picture1`= :picture1,`picture2`= :picture2,`flag`= :flag,`created_date`= :created_date";
					 
        $stmt = $this->conn->prepare($query);
		$stmt->bindParam(":model_name", $this->model_name);
	    $stmt->bindParam(":manufacturer_id", $this->manufacturer_id);
		$stmt->bindParam(":colour", $this->colour);
		$stmt->bindParam(":year", $this->year);
	    $stmt->bindParam(":registration_number", $this->registration_number);
		$stmt->bindParam(":note", $this->note);
		$stmt->bindParam(":picture1", $this->picture1);
	    $stmt->bindParam(":picture2", $this->picture2);
		$stmt->bindParam(":flag", $this->flag);
		$stmt->bindParam(":created_date", $this->created_date);
		if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }
     
    }
	function mo_readAll(){
    $query = "SELECT  * FROM " . $this->table_name . " WHERE flag = 0 ORDER BY id DESC ";
	$stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
// used for paging products
public function mcountAll(){
 
    $query = "SELECT id FROM " . $this->table_name . " WHERE flag = 0 ";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $num = $stmt->rowCount();
    return $num;
}
function mo_readOne(){
 
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->model_name = $row['model_name'];
    $this->manufacturer_id = $row['manufacturer_id'];
    $this->colour = $row['colour'];
	$this->year = $row['year'];
	$this->registration_number = $row['registration_number'];
	$this->note = $row['note'];
	$this->picture1 = $row['picture1'];
	$this->picture2 = $row['picture2'];
	
	
	
	
    
	
	
}
function mo_deleteOne(){
 
    $query = " UPDATE " . $this->table_name . " SET flag = 1 WHERE id = :id";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
}

}



function manufacturer_name($id){
	$db2 = new Database();
    $conn = $db2->dbConnection();
    $query = "SELECT manufacturer_name FROM tbl_manufacturer WHERE id = :id ";
    $stmt = $conn->prepare( $query );
	$stmt->bindParam(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	$db2 = null;
	$conn = null;
    return $row['manufacturer_name'];
}
function manufacturer_names(){
	$db2 = new Database();
    $conn = $db2->dbConnection();
    $query = "SELECT manufacturer_name,id FROM tbl_manufacturer ";
    $stmt = $conn->prepare( $query );
	$stmt->execute();
    $row = $stmt->fetchAll();
	$db2 = null;
	$conn = null;
    return $row;
}
?>