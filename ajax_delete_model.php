<?php
session_start();

include('codac_confi_file.php'); 
include('classes.php');
$database = new Database();
$db = $database->dbConnection();
$model = new Model($db);
$picture = array();
if($_POST)
{
	extract($_POST);
	$model->id = $id;
	$model->mo_deleteOne();
	echo "1";
}
     

else
    {
        echo "0";
    }
?>