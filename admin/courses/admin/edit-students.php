<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|update Student</title>
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
								<h3>Update Student</h3>
							</div>
							<div class="module-body">
									<div class="alert alert-success">
										
									<div class="alert alert-error">
										
									</div>

									<br />
									
							  <?php 
									 $db=new database();
									if(isset($_GET['editid'])){
							 
									 $editid= $_GET['editid'];
									
								   }
							  
						  
						     ?>

			            <?php 
                           
                           if(isset($_POST['submit'])){
                           
                           $student_name=$_POST['student_name'];
                           $course_id=$_POST['course_id'];
                           $mobile=$_POST['mobile'];
                           $email=$_POST['email'];
                           $password=$_POST['password'];
						   $status=$_POST['status'];
    
                        if(strlen($password)<8){
                          echo "password should be at least 8 digit";
                       }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                          echo  "Sorry! Your Email is Invalid";
                       }elseif($student_name=='' 
                            || $course_id=='' 
                            || $email==''                           
                            || $mobile=='' 
                            || $password=='' ){
                           echo "field must not be empty";
						} else{
                           
                          
                        
                               $updatequery="
							     update students
								 
								set
                                 student_name='$student_name',
                                 course_id='$course_id',
                                 mobile ='$mobile',
                                 email='$email',
								 password='$password',
								 status='$status'                    
								 where id='$editid' ";
								 $upadate_students=$db->update($updatequery);
								 if($upadate_students){
									 echo "Students  update success";
								 }else{
									 echo "Students  not updated";
								 
                         }
                        
            
							   
                       
						      
               
               }
		}
       
            ?>		
									
									
									
									

			<form class="form-horizontal row-fluid" name="insertproduct" action="" method="post" enctype="multipart/form-data">

          
                     
          
                 
							  
                  	
                     <?php
				   //select for edit

				    $editquery="SELECT students.*,course_plan.*
                                   FROM students 
                                   INNER JOIN course_plan ON course_plan.id=students.course_id
								     where students.id='$editid' ";
									$get_students = $db->catselect($editquery);
					              if($get_students){
						 
				               while($result=$get_students->fetch_assoc()){
					
                            ?>


                                         
            <div class="control-group">
<label class="control-label" for="basicinput">Student Name:</label>
<div class="controls">
<input type="text"    name="student_name"  value="<?php echo $result['student_name']; ?>" class="span8 tip" required>
</div>
</div>

                                         
	          


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
<label class="control-label" for="basicinput">Status: </label>
<div class="controls">
<select name="status">    
                  <option value ="<?php echo $result['status']; ?>"><?php echo $result['status']; ?> </option>




   
								
								
							
								<option value="enroll">enroll</option>
                                

								</select class="span8 tip" required >    
                                                                               
</div>
</div>


   
                                          <div class="control-group">
                                         <label class="control-label" for="basicinput">Mobile No.</label>
                                         <div class="controls">
                                         <input type="text"   required name="mobile" maxlength="13" value="<?php echo $result['mobile']; ?>" 
                                          class="span8 tip" required>
                                         </div>
                                         </div>
                                              



                                    <div class="control-group">
                                     <label class="control-label" for="basicinput">Email:</label>
                                     <div class="controls">
                                     <input type="text"   required name="email"  value="<?php echo $result['email']; ?>"  class="span8 tip" read only>
                                        
                                     </div>
                                </div>

                                <div class="control-group">
                                     <label class="control-label" for="basicinput">Password:</label>
                                     <div class="controls">
                                     <input type="text"   required name="password"  value="<?php echo $result['password']; ?>"  class="span8 tip" required>
                                       
                                     </div>
                                </div>


                                         <?php }}?>
                                         





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
