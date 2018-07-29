<?php 


include('codac_confi_file.php'); 
include('classes.php');
$database = new Database();
$db = $database->dbConnection();
$model = new Model($db);
$allrecords = $model->mo_readAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Aston Martin - Car Inventory</title>
<link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
    
	<link href="css/dataTables.material.min.css" rel="stylesheet">
	<link href="css/material.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/styles.css" />
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
  <?php include('menu.php');?>
  <!--menu end-->
     <div class="container">
<table id="example" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>Model Name</th>
                <th>Manufacturer Name</th>
                <th>Colour</th>
                <th>Registration Year</th>
                <th>Registration Number</th>
              
				<th>Operation</th>
            </tr>
        </thead>
		<tbody>
		<?php 
		foreach($allrecords as $rec) {
			extract($rec);
			?>
        
            <tr>
                <td><?php echo $model_name;?></td>
                <td><?php echo $model_name;?></td>
                <td><?php echo $colour;?></td>
                <td><?php echo $year;?></td>
                <td><?php echo $registration_number;?></td>
                
				<td><span id="<?php echo $id;?>" class="view-link">view </span> <span id="<?php echo $id;?>" class="sold-link"> Sold</span></td>
            </tr>
           
		   
		<?php } ?>
		</tbody>
        <tfoot>
            <tr>
               <th>Model Name</th>
                <th>Manufacturer Name</th>
                <th>Colour</th>
                <th>Registration Year</th>
                <th>Registration Number</th>
             
				<th>Operation</th>
            </tr>
        </tfoot>
    </table>
	
	</div>
	
	
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#000">Car Model Details</h4>
      </div>
      <div class="modal-body">
	   <div class="col-md-12 clearfix">
		<div class="list-records">Model : Model name</div>
		<div class="list-records">Manufacturer : Model name</div>
		<div class="list-records">Colour : Model name</div>
		<div class="list-records">Registration Year : Model name</div>
		<div class="list-records">Note : Model name</div>
		<div class="list-records">Model : Model name</div>
		</div>
      
	   <div class="col-md-6 clearfix">
		<img src="inventory/15328621975505.png" class="img-responsive">
		</div>
		<div class="col-md-6 clearfix">
		<img src="inventory/15328621974634.jpg" class="img-responsive">
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
	
	<script src="js/jquery.form.js"></script>
    
    <script src="js/datatables.min.js"></script>
    <script src="js/dataTables.material.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
	
	<script>
	
		
		
		$(document).ready(function() {
   var table = $('#example').DataTable();
 
$('#example tbody').on( 'click', '.sold-link', function () {
    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
		var id = $(this).attr('id');
		$.ajax({
        url: "ajax_delete_model.php",
        type: "POST",
        data: {"id":id},
        success: function(response) {
          
        }
   }); 
		
} );
	
$(".view-link").click(function() {
	var id = $(this).attr('id');
$.ajax({
        url: "ajax_read_model.php",
        type: "POST",
        data: {"id":id},
        success: function(response) {
          if(response == '0')
		  {
              alert('fail');
          }
		  else
		  {
              $('.modal-body').html(response);
			  $('#myModal').modal('show');
          }
        }
   }); 
 return false;
});


  });
 

	</script>
  </body>
</html>