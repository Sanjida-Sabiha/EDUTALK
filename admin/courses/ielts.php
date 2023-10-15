<!DOCTYPE html>
<?php 
include ('helper/format.php');
include('library/database.php');

?>

<?php 
include 'library/session.php';
Session_start();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aims | Student Profile</title>
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>


                  <?php
						if(isset($_GET['action'])){
							
							Session::destroy();
                            
						}						
					

					?>
    <!-- Header-Top Area Start -->
	<?php if(isset($_SESSION['login'])){
				?>
   <section class="header-top-area">
	
	 
      <div class="container">
            <div class="header-left">
			
                <ul>
				
				
								
							
							
                    <li><a href="student-profile.php"><i class="fa-solid fa-user"></i>my account</a></li>
                    <li><a href="wishlist.php"><i class="fa-solid fa-heart"></i>wishlist</a></li>
                    <li><a href="?action=logout"><i class="fa-solid fa-right-to-bracket"></i>log out</a></li>
					
                </ul>
            </div>
        </div>
    </section>
	<?php }?>
    <!-- Header-Top Area End -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="index.php">EduTalk</a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                   <?php if($_SESSION['login']=='false'){
				  ?>
	 
                    <div class="enroll">
                        <a href="login.php">login</a>
                    </div>.
					<?php }?>
                    <div class="enroll">
                        <a href="login.php">instructor</a>
                    </div>
                </div>
                <div class="search">
                    <form action="">
                        <input type="text" placeholder="search">
                    </form>
                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Start -->
    <section class="common-banner" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="same-banner">
                <h1>investing in your knowledge &<span>your future</span></h1>
                <p>with the help of learning, create your own path and drive on your skills on your own to achieve what you seek</p>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Routine Area Start -->
    <section class="routine-area pt-80 pb-80">
        <div class="container">
            <div class="std-info">
                <h3>ielts</h3>
            <div class="routine">
                <h4>ielts <span>modules</span> </h4>
                <table border="1">
									<thead>
										<tr>
											<th>Title</th>
											<th>Mode</th>
											<th>Date</th>
											<th>action</th>
										</tr>
									</thead>
									<tbody>
										<!-- Select Modules start--> 
					
				 	<?php
                       $db=new database();
					   $query="Select * from ielts_modules";
					   $modules_read=$db->catselect($query);
					   if($modules_read){
						   $i=0;
						   
						   while( $result=$modules_read->fetch_assoc()){
							   $i++;



			              	 ?>
				 

													
					             <tr class="odd gradeX">
					            	 <td><?php echo $result['Title']; ?></td>
									 <td><?php echo $result['Mode']; ?></td>
									 <td><?php echo $result['module_Date']; ?></td>
                                     <td><a download="<?php echo $result['Mode']; ?>" href="admin/<?php echo $result['Mode']; ?> ">download</a></td>
					            	 
					                       </tr>
					                     </tr>			
								       <?php }}?>			 						
  					               </tr>					
								</table>
            </div>
        </div>
    </section>
    <!-- Routine Area End -->

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer"> 
                <div class="foot-outer">
                    <ul>
                        <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-xing"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-main">
                <div class="main">
                    <p>2023 &copy; aims all rights reserved </p>
                </div>
                <div class="policy">
                    <ul>
                        <li><a href="">privacy</a></li>
                        <li><a href="">terms</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </div>    
        </div>
    </footer>
    <!-- Footer Area End -->
</body>
</html>