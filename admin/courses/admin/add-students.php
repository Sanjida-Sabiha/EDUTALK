<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Student</title>
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
								<h3>Student Registration</h3>
							</div>
									<?php 
		
				   
                 
                   $db=new database();
                   $error=$errorpass=$matcherrorpass=$errorname=$erroremail="";
                   if(isset($_POST['submit'])){
                       
                       $student_name=$_POST['student_name'];
                       $course_id=$_POST['course_id'];    
                       $mobile=$_POST['mobile'];					   
                       $email=$_POST['email'];    
                       $password=$_POST['password'];
                       $conpass=$_POST['conpassword'];
				  

                       if($password!=$conpass){
                        $matcherrorpass = "password not match";
                       
                    }elseif(strlen($password)<8){
                        $errorpass = "password should be at least 8 digit";
                    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $erroremail= "Sorry! Your Email is Invalid";
                    }else
                         if( $student_name=='' 
                         || $course_id=='' 
                         || $email=='' 
                         || $password=='' 
                         || $mobile=='' 
                         || $conpass==''){
                        echo "field must not be empty";
                    }else{
                        
                        $emailquery= "select *from  students  where email= '$email' limit 1";
                        $mailcheck= $db->catselect($emailquery);

                     if($mailcheck != false){

                        $erroremail = "email already exist";
                    }
                                      
                   else{

                         $query="insert into students(student_name,course_id,email,password,mobile,status)
                         values('$student_name','$course_id','$email','$password','$mobile','pending')";
                         $insert_students=$db->catinsert($query);

                         if($insert_students){
                             echo "<script>alert('registration success')</script>";
                         }else{
                              echo "<script>alert('Somthing went wrong')</script>";
                         }
                         
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
<label class="control-label" for="basicinput">Student Name:</label>
<div class="controls">
<input type="text"    name="student_name"  placeholder=" Enter Student Name" class="span8 tip" required>
</div>
</div>

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
<label class="control-label" for="basicinput">Mobile Phone:</label>
<div class="controls">
<input type="text" required name="mobile" maxlength="13" placeholder="Phone No." class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Email:</label>
<div class="controls">
    <input type="email" required name="email" placeholder="Email"  class="span8 tip" required>
    <?php echo $erroremail;?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Password:</label>
<div class="controls">
<input type="Password" required name="password" placeholder="Password"  class="span8 tip" required>
<?php echo $errorpass;?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Confirm Password:</label>
<div class="controls">
<input type="Password" required name="conpassword" placeholder="Confirm Password"   class="span8 tip" required>
<?php echo $matcherrorpass;?>
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
