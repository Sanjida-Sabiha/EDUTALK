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
    <!-- Header-Top Area Start -->
    <!-- Header-Top Area Start -->
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
                    <a href="index.html">a b c</a>
                </div>
                 <div class="menu">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                   <?php if(isset($_SESSION['login'])==false){
			 	   ?>
	 
                    <div class="enroll">
                        <a href="login.php">login</a>
                    </div>.
					
                    <div class="enroll">
                        <a href="instructor-login.php">instructor</a>
                    </div>
					<?php }?>
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
                <h3>routine</h3>
            <div class="routine">
                <h4>class <span>routine</span> </h4>
                <table border="1">
									<thead>
										<tr>
											<th>Course Name</th>
                                            <th>Batch</th>
                                            <th>File</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										
					<!-- Select Routine start--> 
					<?php
					 $db=new database();
					$newsquery="Select routines.*,course_plan.Course_Name,batch.batch_name
					 from routines
					 inner join course_plan on routines.course_id =course_plan.id 
					 inner join batch on routines.batch_id =batch.id";
					$routine_read=$db->catselect($newsquery);
					if($routine_read){
						$i=0;
						while($result=$routine_read->fetch_assoc()){
							$i++;
						
					?>
					
					
					

					
													
					             <tr>
					            	 
					            	 <td><?php echo $result['Course_Name']; ?></td>
                                     <td><?php echo $result['batch_name']; ?></td>
                                     <td><?php echo $result['routine']; ?></td>
                                     <td><a download="<?php echo $result['routine']; ?>" href="admin/<?php echo $result['routine']; ?> ">download</a></td>
                                    



					            		    
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