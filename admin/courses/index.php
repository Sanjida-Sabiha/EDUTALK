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
    <title>Aims</title>
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
                        <li><a href="#about">about</a></li>
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
    <section class="banner-area" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="banner">
                <div class="banner-info">
                    <h1>investing in your knowledge &<span>your future</span></h1>
                    <p>with the help of learning, create your own path and drive on your skills on your own to achieve what you seek</p>
                </div>
                <div class="banner-contact">
                    <h1>contact</h1>
                    <?php
				
                $db= new database(); 

               if(isset($_POST['submit'])){
              
              $Name=$_POST['Name'];
              $email=$_POST['email'];
              $message=$_POST['message'];     
              if(empty($Name)||empty($email)||empty($message)){
                echo '<script>alert("field must not be empty")</script>';
              }
       

               $insert="INSERT INTO  contact (Name,email,message) 
               VALUES('$Name','$email','$message')";
                  $insert_rows=$db->catinsert($insert);
                  if($insert_rows){
                    echo '<script>alert("Text Send")</script>';
                  }else{
                    echo '<script>alert("Text Not Send")</script>';
                  
              }
              
          }
      



          ?>
                    <form method="post" action="">
                        <input type="text"  placeholder="Name" name="Name"/>
                        <input type="email"  placeholder="Email" name="email"/>
                        <textarea  placeholder="Your Message Here" name="message"></textarea>
                        <input type="submit" name="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- About Area Start -->
        <section class="about-area pt-80 pb-80" id="about">
            <div class="container">
                <div class="about">
                    <div class="about-info">
                        <span>get to know us</span>
                        <h1>grow your skills learn with us from anywhere</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, optio dolorem dicta error ab repudiandae sint voluptates quisquam beatae in, exercitationem, quas quis numquam voluptas. Ipsa saepe quo aspernatur enim?</p>
                        <a href="about.html">details</a>
                    </div>
                    <div class="about-img">
                        <div class="single-img">
                            <img src="assets/img/about/about-5.jpg" alt="About Us">
                        </div>
                        <div class="single-images">
                            <img src="assets/img/about/about-6.jpg" alt="About Us">
                            <img src="assets/img/about/about-3.jpg" alt="About Us">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- About Area End -->

    <!-- Courses Area Start -->
    <section class="courses-area pt-80 pb-80">
        <div class="container">
            <div class="courses-info">
                <h3>education courses</h3>
            </div>
            <div class="courses">
            
                <!-- Select Courses start--> 
					
                <?php
                       
                       $db= new database(); 
                       $fm=new Format();

                       $subquery="select course_plan.Course_Name, courses.*
                       from course_plan
                       INNER JOIN  courses  ON course_plan.id = courses.course_id
                       order by id asc limit 3";
                       $courses_read=$db->catselect($subquery);
                       if($courses_read){
                           $i=0;
                           
                           while($result=$courses_read->fetch_assoc()){
                               $i++;
                  
          

      


          ?>

                <div class="single-course">
                    
                    <h1><?php echo $result['Course_Name'];?></h1>
                    <h4><a href=""><?php echo $result['amount'];?></a></h4>
                    <img src ="admin/<?php echo $result['image'];?>" alt="">
                    <p><?php echo $result['description']; ?></p>
                    
                    <div class="link">
                        <a href="registration.php">enroll</a>
                    </div>
                
                    
                </div>
                <?php }}?>
            </div>
        </div>
    </section>
    <!-- Courses Area End -->

    <!-- Instructor Area Start -->
    <section class="instructors-area pt-80 pb-80">
        <div class="container">
            <div class="instructors-info">
                <h2>instructors</h2>
                <h4>meet our instructors</h4>
            </div>
            <div class="instructor">
                <!-- Select Teachers start--> 
                <?php
                       
                       $db= new database(); 
                       $subquery="select course_plan.Course_Name,teachers.*
                       from course_plan
                       INNER JOIN  teachers ON course_plan.id = teachers.course_id
                       order by id asc limit 3";
                       $teachers_read=$db->catselect($subquery);
                       if($teachers_read){
                       $i=0;
                       
                       while($result=$teachers_read->fetch_assoc()){
                           $i++;
              
      

  


      ?>
                <div class="single-instructor">
                    <a href="instructor-profile.php"><img src ="admin/<?php echo $result['image']; ?>" alt=""></a>
                    <div class="info">
                    <h1><?php echo $result['teacher_name']; ?></h1>
                    <span><?php echo $result['Course_Name']; ?></span>
                    </div>
                    
                </div>
                <?php }}?>
            </div>
        </div>
    </section>
    <!-- Instructor Area End -->

    <!-- Blogs Area Start -->
    <section class="blogs-area pt-80 pb-80">
        <div class="container">
            <div class="blog-info">
                <h4>testimonials</h4>
                <h1>student reviews</h1>
            </div>
            <div class="blogs">
                <div class="single-blog">
                    <div class="blog-img">
                        <img src="assets/img/testimonials/testimonial-1.png" alt="">
                    </div>
                    <div class="review">
                        <h2>amaye landson</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore autem sequi quod dolor quia! Libero, veritatis ullam cupiditate tenetur ut quos quibusdam facere eaque praesentium earum saepe consectetur placeat eos.</p>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="blog-img">
                        <img src="assets/img/testimonials/testimonial-2.png" alt="">
                    </div>
                    <div class="review">
                        <h2>miya william</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore autem sequi quod dolor quia! Libero, veritatis ullam cupiditate tenetur ut quos quibusdam facere eaque praesentium earum saepe consectetur placeat eos.</p>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="blog-img">
                        <img src="assets/img/testimonials/testimonial-3.png" alt="">
                    </div>
                    <div class="review">
                        <h2>mike perry</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore autem sequi quod dolor quia! Libero, veritatis ullam cupiditate tenetur ut quos quibusdam facere eaque praesentium earum saepe consectetur placeat eos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blogs Area End -->

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