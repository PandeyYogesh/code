<?php
session_start();

include('codac_confi_file.php'); 
include('classes.php');
$database = new Database();
$db = $database->dbConnection();
$manufacturer = new Manufacturer($db);

if($_POST){
	extract($_POST);
	$manufacturer->manufacturer_name = $manufacturer_name;
    $manufacturer->created_date = date('Y-m-d H:i:s');
	
	$manufacturer->flag = 0;
    $last_id = $manufacturer->mcreate();
    if(isset($last_id)){
	echo "1";
	}
     else{
        echo "0";
    }
}

?>