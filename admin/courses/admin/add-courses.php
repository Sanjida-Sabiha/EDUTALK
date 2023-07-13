<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Courses</title>
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
								<h3>Insert Courses</h3>
							</div>
									
                    <?php
				
                     $db=new database();
                    if(isset($_POST['submit'])){
                   
                   
                   $course_id=$_POST['course_id'];
                   $amount=$_POST['amount']; 
				   $description=$_POST['description'];
                   $permited  = array('png','jpg','webp');//permission file
						   $image=$_FILES['image']['name'];
						   $image_size = $_FILES['image']['size'];
						   $tempimage=$_FILES['image']['tmp_name'];
						   $div=explode('.', $image);//after . validation
						   $file_ext=strtolower(end($div));
						   $unique_image =substr(md5(time()), 0, 10).'.'.$file_ext;//rendom unique name define for same file name
						             
						   $mainimage="upload/".$unique_image;

                   if(empty($course_id)||
                      empty($amount)||
                      empty($mainimage)||
					  empty($description)
                      ){
                       echo "fill must not be empty";
                   }elseif($image_size>104856725465465){
							   
                    echo "logo Size should be less then 1GB!";
                }elseif(in_array($file_ext, $permited) === false){
                    echo "You can upload only:"
                        .implode(', ', $permited)."";
                    
                    
                }else{
                    
                    move_uploaded_file($tempimage,$mainimage);
            
  
                    $insert="INSERT INTO  courses (course_id,amount,image,description) 
                    VALUES('$course_id','$amount','$mainimage','$description')";


                       $insert_rows=$db->catinsert($insert);
                       if($insert_rows){
                           echo "Courses insert success";
                       }else{
                           echo "Courses  insert not success";
                       
                   }
                   
               }
            }



               ?>
                   
				
					<div class="module-body">
									<div class="alert alert-success">
										

									<div class="alert alert-error">
										
									</div>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">





<div class="control-group">
<label class="control-label" for="basicinput">Course Name: </label>
<div class="controls">
<select name = "course_id">    
<option value ="">Select Courses </option> 
<?php
								
								
							    $catquery="select * from course_plan";
								$course_read=$db->catselect($catquery);
								if($course_read){
									while($course_result=$course_read->fetch_assoc()){
								
								
								?>
								
								
								
								
								<option value="<?php echo $course_result['id'];?>"><?php echo $course_result['Course_Name'];?></option>
								<?php } };?>
								</select class="span8 tip" required >                                                     
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Amount:</label>
<div class="controls">
<input type="text"    name="amount"  placeholder=" Enter Amount" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Image:</label>
<div class="controls">
<input type="file"    name="image"  class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Description:</label>
<div class="controls">
<input type="text"    name="description"  placeholder=" Enter Description" class="span8 tip" required>
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
