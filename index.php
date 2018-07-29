<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
   
  </head>
  <body>
   <div class="container">
   
   <div class="col-md-12 headline">
   Codoc - Mini Car Inventory System
   </div>
   <div class="col-md-8 col-md-offset-2 mainform">
 <form action="" method="POST" id="manufacture_form" >
 <div class="form-group">
    <label for="manufacturer">Manufacturer Name:</label>
    <input type="text" class="form-control" id="manufacturer_name" name="manufacturer_name">
 </div>
 
 
  <button type="submit" class="btn btn-default" id="manufacture_submit">Submit</button>
</form>
   </div>
   <div class="col-md-offset-2">
   </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script>
	$(document).ready(function(){

	$('#manufacture_form').validate({ 
        rules: {
           	manufacturer_name: {required: true},
			
			},
		messages: {
    		manufacturer_name: {required: 'Please specify manufacturer name'},
			
			},
		
		submitHandler: function(form) {
			
			var aUrl = 'ajax_add_manufacturer.php';
			
			$('#manufacture_form').ajaxSubmit({
				type:'POST',
				url: aUrl,
				success: function(data){
					
					if(data==1){
		                alert('success');
					}
					else{
    
					}
				}
			});
		}
    });  
  });   

	</script>
  </body>
</html>