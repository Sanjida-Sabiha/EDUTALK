<!DOCTYPE html>
<?php 
include 'library/session.php';
Session_start();


?>
<?php 
include ('helper/format.php');
include('library/database.php');

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
    <!-- Header-Top Area End -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="index.php">a b c</a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contact.php">contact</a></li>
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

    <!-- Student Profile Area Start -->
    <section class="profile-area pt-80 pb-80">
        <div class="container">
               <div class="std-info">
                <h3>student profile</h3>
            </div>
            <div class="std-profile">
                <div class="pro-menu">
                    <ul>
                        <li><a href="student-profile.html">profile</a></li>
                        <li><a href="">file</a>
                            <ul>
                                <li><a href="routine.php">routine</a></li>
                                <li><a href="notice.php">notice</a></li>
                                <?php if($_SESSION['Course_Name']=='IELTS'){
								
							
								?> 
                                <li>
                                <a href="ielts.php">ielts</a> <?php } ?></li>

                                <?php if($_SESSION['Course_Name']=='Basic Computer'){
								
							
								?> 
                                <li><a href="basic-computer.php">basic computer</a>
                                <?php } ?></li>

                                <?php if($_SESSION['Course_Name']=='Spoken English'){
								
							
								?> 

                                <li><a href="spoken.php">spoken english</a><?php } ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="single-pro">
                    <!-- Select students start--> 
                    <?php
                       
                       $db= new database(); 
                       $subquery="select course_plan.Course_Name,students.*
                       from course_plan
                       INNER JOIN  students ON course_plan.id = students.course_id
                       order by id asc";
                       $students_read=$db->catselect($subquery);
                       if($students_read){
                       $i=0;
                       
                       while($result=$students_read->fetch_assoc()){
                           $i++;
              
      
                      }
					}
  


      ?>
                    
                    
                    <form action="" method="post">
                    
                      

                        <input type="text" name="student_name" value="<?php echo $_SESSION['student_name']; ?>" >
                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                        <input type="text" name="mobile" value="<?php echo $_SESSION['mobile']; ?>">
                        
                    </form>
                    <!--<a href="">update</a>-->
                    
            
                </div>
                
            </div>
        </div>
    </section>
    <!-- Student Profile Area End -->

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
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </div>
            </div>    
        </div>
    </footer>
    <!-- Footer Area End -->
</body>
</html>