<?php include('classes.php');?>
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
    
	<link rel="stylesheet" href="assets/css/styles.css" />
  <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
<?php include('menu.php');?>
<!--menu end-->
   
   <div class="col-md-12 headline">
   Aston Martin - Mini Car Inventory System
   </div>
   <div class="col-md-10 col-md-offset-1 mainform">
 <form action="" method="POST" id="model_form" >
 
 <div class="form-group col-md-6">
    <label for="manufacturer">Model:</label>
    <input type="text" class="form-control" id="model_name" name="model_name">
 </div>
 
<div class="form-group col-md-6">
  <label for="sel1">Manufacturer list:</label>
  <select class="form-control" id="manufacturer_id" name="manufacturer_id">
  <?php $manu = manufacturer_names();?>
    <option value="default">Select Manufacturer</option>
	<?php foreach ($manu as $man) {
		extract($man);
		?>
    <option value="<?php echo $id;?>"><?php echo $manufacturer_name	;?></option>

	<?php } ?>
  </select>
</div>

<div class="form-group col-md-6">
    <label for="manufacturer">Colour:</label>
    <input type="text" class="form-control" id="colour" name="colour">
 </div>
 <div class="form-group col-md-6">
    <label for="manufacturer">Manufacturing year:</label>
    <input type="text" class="form-control datepicker" id="year" name="year">
 </div>
 <div class="form-group col-md-6">
    <label for="manufacturer">Registration Number:</label>
    <input type="text" class="form-control" id="registration_number" name="registration_number">
 </div>
 <div class="form-group col-md-6">
    <label for="manufacturer">Note:</label>
    <input type="text" class="form-control" id="note" name="note">
 </div>
 
  <div class="form-group col-md-12">
    <label for="exampleInputFile">File input</label>
   <div id="dropbox">
<span class="message">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
	</div>
   <span id="upload-error" class="error" for="upload-error">Please upload 2 images</span>
  </div>
  
  
 <div class="form-group col-md-6">
  <button type="submit" class="btn btn-default" id="model_submit">Submit</button>
  </div>
</form>
   </div>
   <div class="col-md-offset-1">
   </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	<script src="js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.filedrop.js"></script>
	
		<!-- The main script file -->
    <script src="assets/js/script.js"></script>
	<script src="js/jquery.form.js"></script>	
		
	<script>
	$(document).ready(function(){
		
		
		$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");
$('.datepicker').datepicker();
	$('#model_form').validate({ 
        rules: {
           	model_name: {required: true},
			year: {required: true},
			registration_number: {required: true},
			note: {required: true},
			colour: {required: true},
			manufacturer_id:{ valueNotEquals: "default" },
			
			},
		messages: {
    		model_name: {required: 'Please specify model name'},
			year: {required: 'Please specify manufacturer name'},
			registration_number: {required: 'Please specify resgistration number'},
			note: {required: 'Please specify short description'},
			colour: {required: 'Please specify colour of model'},
			manufacturer_id: {required: 'Please select manufacturer name'},
			},
		
		submitHandler: function(form) {
				$.get('count.php', function(data) {
				var totalfile = data;
				
				if(totalfile < 4)
				{   
			        $("#upload-error").css("display", "block");
					return false;
				}
				else {
					
					$("#upload-error").css("display", "none");
			var aUrl = 'ajax_add_model.php';
			
			$('#model_form').ajaxSubmit({
				//alert(totalfile);
				type:'POST',
				url: aUrl,
				success: function(data){
					
					if(data==1){
		                window.location.href="model-list.php";
					}
					else{
                               alert('something went wrong');
					}
				}
			});
				}
				});
				
				
		}
    }); 
 
  });   

	</script>
	<script src="js/jquery.hc-sticky.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/custom.js?v=3"></script>
  </body>
</html>