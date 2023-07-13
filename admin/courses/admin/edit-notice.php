<?php include('include/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
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
								<h3>Update Batches</h3>
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
                          
                           $title=$_POST['title'];
                           $date=$_POST['noticeDate'];
                           $permited  = array('zip', 'pdf', 'docx');//permission file
                           $file=$_FILES['notice_board']['name'];
                           $temp_file=$_FILES['notice_board']['tmp_name'];
                           $file_size = $_FILES['notice_board']['size'];
                           $div=explode('.', $file);//after . validation
                           $file_ext=strtolower(end($div));
                           $unique_file =substr(md5(time()), 0, 10).'.'.$file_ext;//rendom unique name define for same file name                             
                           $mainfile="upload/".$unique_file;
    
    
                          if(empty($title)||
                             empty($date)||
                             empty($mainfile)){
                          echo "field must not be empty";
                          }elseif($file_size>100000000){
							   
                            echo "Routine Size should be less then 1MB!";
                          }elseif(in_array($file_ext, $permited) === false){
                            echo "You can upload only:"
                                .implode(', ', $permited)."";
                            
                            
                           }else{
                            
                            move_uploaded_file($temp_file,$mainfile);
                        
                           $updatequery=" update notice                       
                           set
                           title='$title',	
                           noticeDate='$date'	,
                           notice_board='$mainfile'		
                           WHERE id = $editid";
                          
                            $update_notice=$db->update($updatequery);
                           if($update_notice){
                             echo "Notice Update Successful";
                           }else{
                              echo "Notice Update Not Successful";
                           }
                        }
                    }
      ?> 
                     
          
                 
							  
                  	
                        <?php

                         //select for edit
 
                        $editquery="select* from  notice where id='$editid'";
                        $getnotice = $db->catselect($editquery);
                        if($getnotice){
      
                        while($result=$getnotice->fetch_assoc()){
  ?>
 


                                         <div class="control-group">
                                         <label class="control-label" for="basicinput">Notice Title</label>
                                         <div class="controls">
                                         <input type="text"    name="title" value="<?php echo $result['title']; ?>" 
                                          class="span8 tip" required>
                                         </div>
                                         </div>

                                         
	          


                                               <div class="control-group">
                                              
                                               <label class="control-label" for="basicinput">Notice Board:</label>
                                               <div class="controls">
                                               <input type="text" value="<?php echo $result['notice_board']; ?>">
                                               <input type="file" name="notice_board">
                                               
                                              </div>
                                            </div>

   
                                            <div class="control-group">
                                         <label class="control-label" for="basicinput">Date</label>
                                         <div class="controls">
                                         <input type="text"    name="noticeDate" value="<?php echo $result['noticeDate']; ?>" 
                                          class="span8 tip" required>
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
