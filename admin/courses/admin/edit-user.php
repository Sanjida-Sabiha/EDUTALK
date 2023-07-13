<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|update teacher</title>
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
								<h3>Update Teacher</h3>
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
                            $error=$errorpass=$matcherrorpass=$errorname=$erroremail="";
                           if(isset($_POST['submit'])){
                           
                              $usertype=$_POST['usertype'];
                           
                             $updatequery="
							    update users
								 
								set
                                usertype='$usertype'
								where id='$editid' ";

								 $upadate_teachers=$db->update($updatequery);
								 if($upadate_teachers){
									 echo "user update success";
								 }else{
									 echo "user not updated";
									 
									 
								 }
								
								
                        
                     
                  }
             
						  
            ?>
									
									

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

           
                     
          
                 
							  
                  	
                     <?php
				               //select for edit

				             $editquery="SELECT * from users where id='$editid' ";
									$get_teachers = $db->catselect($editquery);
					              if($get_teachers){
						 
				               while($result=$get_teachers->fetch_assoc()){
								   
					
                            ?>


                                         
            <div class="control-group">
<label class="control-label" for="basicinput">Full Name Name:</label>
<div class="controls">
<input type="text"    name="teacher_name"  value="<?php echo $result['fname']; ?> <?php echo $result['lname']; ?>" class="span8 tip" readonly>
</div>
</div>

                                         
	          


<div class="control-group">

<div class="controls">

                                                                               
</div>
</div>

                                    
									<div class="control-group">
                                     <label class="control-label" for="basicinput">User Name:</label>
                                     <div class="controls">
                                     <input type="text"   required name="email"  value="<?php echo $result['username']; ?>"  class="span8 tip" readonly>
                                         <?php echo $erroremail;?>
                                     </div>
                                   </div>
									<div class="control-group">
                                     <label class="control-label" for="basicinput">Email:</label>
                                     <div class="controls">
                                     <input type="email"   required name="email"  value="<?php echo $result['email']; ?>"  class="span8 tip" readonly>
                                         <?php echo $erroremail;?>
                                     </div>
                                   </div>
   
                                          <div class="control-group">
                                         <label class="control-label" for="basicinput">Mobile No.</label>
                                         <div class="controls">
                                         <input type="text"  name="mobile" minlength="11" maxlength="13" value="<?php echo $result['mobile']; ?>" 
                                          class="span8 tip" readonly>
                                         </div>
                                         </div>
										 
										 <div class="control-group">
                                     <label class="control-label" for="basicinput">User Type:</label>
                                     <div class="controls">
                                   <select name="usertype">    
                                        <option value ="<?php echo $result['usertype']; ?>"><?php echo $result['usertype']; ?> </option>
										<option value="admin">admin</option>
								        <option value="staff">staff</option>




   
								
								
							
								 
                                

								</select class="span8 tip" required >    
                                     </div>
                                              



                                    

                                <div class="control-group">
                                     <label class="control-label" for="basicinput">Gender:</label>
                                     <div class="controls">
                                     <input type="text"      value="<?php echo $result['gender']; ?>"  class="span8 tip" readonly>
                                         <?php echo $errorpass;?>
                                     </div>
                                </div>

                               
                               









								  <?php }} ?>
                                         





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
