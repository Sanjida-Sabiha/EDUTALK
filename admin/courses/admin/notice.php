<?php include('include/database.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Notice</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>

<?php
	  $db=new database();
	  if(isset($_GET['deletenotice'])){
		$deletenotice=$_GET['deletenotice'];
		$deletequery="delete from notice where id= $deletenotice";
		$noticedelete=$db->delete($deletequery);
		if($noticedelete){
			echo"Notice Delete Succesfully";
		}else{
			echo"Notice Delete Not Succesfull";

		}
	  }
	 
	 
	 ?>

			<div class="span9">
					<div class="content">

	                      <div class="module">
							<div class="module-head">
								<h3>Notice</h3>
							</div>
							<div class="module-body table">

									<div class="alert alert-error">
										<br> <a href="add-notice.php">Add Notice</a> 	<?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
                                     

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											
											<th>Title</th>	
                                            <th>Notice Board</th>							
									    	<th>Date</th>						
									    	<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<!-- Select Notice start--> 
					
				        	<?php
                           $db=new database();
					       $query="Select * from notice";
					       $notice_read=$db->catselect($query);
					       if($notice_read){
						   $i=0;
						   
						   while( $result=$notice_read->fetch_assoc()){
							   $i++;



			              	 ?>
				 

													
					             <tr class="odd gradeX">
					            	
					            	 <td><?php echo $result['title']; ?></td>
                                     <td><?php echo $result['notice_board']; ?></td>
                                     <td><?php echo $result['noticeDate']; ?></td>
					            		           
						             <td>
									 <a href="edit-notice.php?editid=<?php echo $result['id']; ?>">Edit</a> || 
					            	 <a onclick="alert('Are You Sure To Delete ?')" href ="?deletenotice=<?php echo $result['id']; ?>">Delete</a>|| 
									  <a download="<?php echo $result['notice_board']; ?>" href="<?php echo $result['notice_board']; ?>">download</a> 
									 
									 </td>
					            	 
					                       </tr>
					                     </tr>			
								       <?php }}?>			 						
  					               </tr>					
								</table>
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
