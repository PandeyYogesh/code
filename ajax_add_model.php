<?php
session_start();

include('codac_confi_file.php'); 
include('classes.php');
$database = new Database();
$db = $database->dbConnection();
$model = new Model($db);
$picture = array();
if($_POST){
$dir = 'uploads';
	$files = opendir($dir);
	if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..")
        {
      array_push($picture,$file);
		}
    }
    closedir($handle);
}
   //print_r($picture);
	extract($_POST);
	$model->model_name = $model_name;
    $model->manufacturer_id = $manufacturer_id;
	$model->colour = $colour;
	$dateInput = explode('/',$year);
    $year = $dateInput[2].'-'.$dateInput[0].'-'.$dateInput[1];
	$model->year = $year;
	$model->registration_number = $registration_number;
	$model->note = $note;
	$model->picture1 = $picture[0];
	$model->picture2 = $picture[1];
	$model->flag = 0;
	$model->created_date = date('Y-m-d H:i:s');
    $last_id = $model->mo_create();
    if(isset($last_id)){
		
		$files = scandir("uploads/");
		$source = "uploads/";
		$destination = "inventory/";
		foreach ($files as $file) {
		if (in_array($file, array(".",".."))) continue;
		if (copy($source.$file, $destination.$file)) {
		$delete[] = $source.$file;
		}
		}
		// Delete all successfully-copied files
		foreach ($delete as $file) {
		unlink($file);
		}
	echo "1";
	}
     else{
        echo "0";
    }
}

?>