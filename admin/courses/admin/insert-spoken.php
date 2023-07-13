<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Routine</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Insert Spoken English Routine</h3>
							</div>
									<?php 
				   $db=new database();
				   
				   
				   if(isset($_POST['submit'])){
					
					       $routine_title=$_POST['routine_title'];
					       $permited  = array('zip', 'pdf', 'docx');//permission file
						   $file=$_FILES['routine']['name'];
   					       $temp_file=$_FILES['routine']['tmp_name'];
						    $file_size = $_FILES['routine']['size'];
						   $div=explode('.', $file);//after . validation
						   $file_ext=strtolower(end($div));
						   $unique_file =substr(md5(time()), 0, 10).'.'.$file_ext;//rendom unique name define for same file name
						             
						   $mainfile="upload/".$unique_file;
						   if(empty($routine_title)||empty($mainfile)){
							   echo "field must not be empty";
						   }elseif($file_size>100000000){
							   
							   echo "Routine Size should be less then 1MB!";
						   }elseif(in_array($file_ext, $permited) === false){
							   echo "You can upload only:"
						           .implode(', ', $permited)."";
							   
							   
						   }else{
							   
							   move_uploaded_file($temp_file,$mainfile);
							   $routine_insert="insert into routine(routine_title,routine,size,download)
							         values('$routine_title','$mainfile','$file_size','')";
									 
					                $routine_insert_row=$db->catinsert($routine_insert);
									if($routine_insert_row){
										echo "routine insert success";
									}else{
										echo "routine insert not success";
									}
					
						   }
				   }
				
				
				
				
				?>
				
					<div class="module-body">
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	

									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 
									</div>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">



<div class="control-group">
<label class="control-label" for="basicinput">Routine Title:</label>
<div class="controls">
<input type="text"    name="routine_title"  placeholder="Enter Routine" class="span8 tip" required>
</div>
</div>




<div class="control-group">
<label class="control-label" for="basicinput">Routine:</label>
<div class="controls">
<input type="file" name="routine" class="span8 tip" required>
</div>
</div>






	                                     <div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Insert</button>
											</div>
										</div>
									</form>
							</div>
						</div>										
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
