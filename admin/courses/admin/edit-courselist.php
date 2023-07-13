<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Course List</title>
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
								<h3>Update Courses</h3>
							</div>
							<div class="module-body">
									<div class="alert alert-success">
											

									<div class="alert alert-error">
										
									</div>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

            <?php 
		             $db=new database();
			        if(isset($_GET['editid'])){
			 
			         $editid= $_GET['editid'];
                    
		           }
			  
		  
		  
		        ?>

			            <?php 
                 
                           if(isset($_POST['submit'])){
                          
                          $course_id=$_POST['course_id'];
                          $amount=$_POST['amount'];
						  $description=$_POST['description'];
                          $permited  = array('jpg', 'jpeg', 'png', 'gif','pdf');
				           $file_name = $_FILES['image']['name'];
				           $file_size = $_FILES['image']['size'];
				           $file_temp = $_FILES['image']['tmp_name'];

				           $div = explode('.', $file_name);
				           $file_ext = strtolower(end($div));
				           $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				           $main_image = "upload/".$unique_image;           

                          if(empty($course_id)||
                          empty($amount)||
                           empty($main_image)||
						   empty($description)){
                          echo "field must not be empty";
                          }if(!empty($file_name)){
                            if ($file_size >104856714541) {
                             echo "<span class='error'>Image Size should be less then 1MB!
                             </span>";
                            } elseif (in_array($file_ext, $permited) === false) {
                             echo "<span class='error'>You can upload only:-"
                             .implode(', ', $permited)."</span>";
                            } else{		
                               move_uploaded_file($file_temp, $main_image);


                               $updatequery="
                               update courses 
                               
                                set
                               course_id='$course_id',
                               amount='$amount',
							   description='$description',                            
                               image='$main_image'                             
                               where id='$editid' ";
                               $upadatecourses=$db->update($updatequery);
                               if($upadatecourses){
                                   echo "courses update success";
                               }else{
                                   echo "courses not updated";
                               }
                         }
                             } else{
                                   
                                   $updatequery="
                               update courses 
                               
                                set
                               course_id='$course_id',
                               amount='$amount',
							   description='$description'
                               where id='$editid' ";
                               $upadatecourses=$db->update($updatequery);
                               if($upadatecourses){
                                   echo "courses update success";
                               }else{
                                   echo "courses not updated";
                                   
                                   
                                   
                               }
                             
                            
                      
                    }
                   }
              
                ?>
                     
          
                 
							  
                  	
					  <?php
				   //select for edit
				    $editquery="SELECT course_plan.*,courses.*
                                   FROM course_plan
                                   INNER JOIN courses ON course_plan.id=courses.course_id
								     where courses.id='$editid'";
									$get_courses = $db->catselect($editquery);
					              if($get_courses){
						 
				               while($result=$get_courses->fetch_assoc()){
					
                            ?>






   
   
<div class="control-group">
<label class="control-label" for="basicinput">Course Name: </label>
<div class="controls">
<select name = "course_id">    
<option value ="<?php echo $result['course_id']; ?>"><?php echo $result['Course_Name']; ?> </option> 


    <?php
								
								
							    $catquery="select * from course_plan";
								$course_read=$db->catselect($catquery);
								if($course_read){
									while($course_result=$course_read->fetch_assoc()){
								
								
								?>
								
								
								
								
								<option value="<?php echo $course_result['id'];?>"><?php echo $course_result['Course_Name'];?></option>
                                <?php }};?>  

								</select class="span8 tip" required >    
                                                                               
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Amounts</label>
<div class="controls">
<input type="text"    name="amount" value="<?php echo $result['amount']; ?>"  class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Image</label>
<div class="controls">
<img width="100px" height="100px" type="text" src="<?php echo $result['image']; ?>"  class="span8 tip" required>
<input type="file" name="image"/>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Description</label>
<div class="controls">
<input type="text"    name="description" value="<?php echo $result['description']; ?>"  class="span8 tip" required>
</div>
</div>

<?php }};?>


  
                                

	                                       
                                            <div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
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
