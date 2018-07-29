<?php
session_start();

include('codac_confi_file.php'); 
include('classes.php');
$database = new Database();
$db = $database->dbConnection();
$model = new Model($db);

if($_POST){
extract($_POST);
    $model->id = $id;
	$model->mo_readOne();
	$manufacturer_name = manufacturer_name($model->manufacturer_id);
   if($model)
   {
    echo '<div class="col-md-12 clearfix">
		<div class="list-records">Model : <strong>'.$model->model_name.'</strong></div>
		<div class="list-records">Manufacturer : <strong>'.$manufacturer_name.'</strong></div>
		<div class="list-records">Colour : <strong>'.$model->colour.'</strong></div>
		<div class="list-records">Colour : <strong>'.$model->year.'</strong></div>
		<div class="list-records">Registration : <strong>'.$model->registration_number.'</strong></div>
		<div class="list-records">Note : <strong>'.$model->note.'</strong></div>
		
		</div>
      
	   <div class="col-md-6 clearfix">
		<img src="inventory/'.$model->picture1.'" class="img-responsive">
		</div>
		<div class="col-md-6 clearfix">
		<img src="inventory/'.$model->picture2.'" class="img-responsive">
		</div>';
   }
  else
    {
        echo "0";
    }
}

?>