<!DOCTYPE html>
<?php 
include ('helper/format.php');
include('library/database.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aims | Profile</title>
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!-- Header-Top Area Start -->
    <section class="header-top-area">
        <div class="container">
            <div class="header-left">
                <ul>
                    <li><a href="student-profile.html"><i class="fa-solid fa-user"></i>my account</a></li>
                    <li><a href="wishlist.html"><i class="fa-solid fa-heart"></i>wishlist</a></li>
                    <li><a href=""><i class="fa-solid fa-right-to-bracket"></i>log in</a></li>
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
                    <a href="index.html">EduTalk</a>
                </div>
               <div class="menu">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                  
	 
                    <div class="enroll">
                        <a href="login.php">login</a>
                    </div>.
				
                    <div class="enroll">
                        <a href="instructor-login.php">instructor</a>
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

    <!-- Instructor Area Start -->
    <section class="instructor-area pt-80 pb-80">
        <div class="container">
            <div class="instructor-info">
                <h3>instructor profile</h3>
            </div>
            <div class="profile">
                <div class="single-image">
                    <!-- Select Teachers start--> 
                    <?php
                       
                       $db= new database();
                       $fm=new Format(); 
                       $subquery="select course_plan.Course_Name,teachers.*
                       from course_plan
                       INNER JOIN  teachers ON course_plan.id = teachers.course_id
                       order by id asc limit 1";
                       $teachers_read=$db->catselect($subquery);
                       if($teachers_read){
                       $i=0;
                       
                       while($result=$teachers_read->fetch_assoc()){
                           $i++;
              
      

  


      ?>

                    <img src ="admin/<?php echo $result['image']; ?>" alt="Profile">
                    <?php }};?>

                    <div class="profile-info">
                        <!-- Select Teachers start--> 
                    <?php
                       
                       $db= new database(); 
                       $subquery="select course_plan.Course_Name,teachers.*
                       from course_plan
                       INNER JOIN  teachers ON course_plan.id = teachers.course_id
                       order by id asc limit 1";
                       $teachers_read=$db->catselect($subquery);
                       if($teachers_read){
                       $i=0;
                       
                       while($result=$teachers_read->fetch_assoc()){
                           $i++;
              
      

  


      ?>
                        <h1><?php echo $result['teacher_name']; ?></h1>
                        <h4><?php echo $result['Course_Name']; ?></h4>
                        <?php }};?>

                        <div class="prof-address">

                        <?php
                       
                       $db= new database(); 
                       $subquery="select course_plan.Course_Name,teachers.*
                       from course_plan
                       INNER JOIN  teachers ON course_plan.id = teachers.course_id
                       order by id asc limit 1";
                       $teachers_read=$db->catselect($subquery);
                       if($teachers_read){
                       $i=0;
                       
                       while($result=$teachers_read->fetch_assoc()){
                           $i++;
              
      

  


      ?>
                            <ul>
                                <li><i class="fa-solid fa-comment-dots"></i><a href="mailto:alex@smith.com"><span>Chat with me </span> <?php echo $result['email']; ?></a></li>
                                <li><i class="fa-solid fa-phone"></i><a href="tel:(555) 892-94045"><span>Call me during morning hours at</span> <?php echo $result['mobile']; ?></a></li>
                            </ul>
                            <?php }};?>
                        </div>
                        <div class="prof-link">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="prof-edu">
                <?php
                       
                       $db= new database(); 
                       $subquery="select course_plan.Course_Name,teachers.*
                       from course_plan
                       INNER JOIN  teachers ON course_plan.id = teachers.course_id
                       order by id asc limit 1";
                       $teachers_read=$db->catselect($subquery);
                       if($teachers_read){
                       $i=0;
                       
                       while($result=$teachers_read->fetch_assoc()){
                           $i++;
              
      

  


      ?>
                    <h1><?php echo $result['teacher_name']; ?></h1>
                    <h4><?php echo $result['Course_Name']; ?></h4>
                    <p><?php echo $result['details']; ?></p>
                    <?php }};?>
                       <h3>education</h3>
                    <div class="education">
                        
                        <ul>
                            <li>year</li>
                            <li>2008</li>
                            <li>2012</li>
                        </ul>
                        <ul>
                            <li>degree</li>
                            <li>bachelor of business administration</li>
                            <li>MBA</li>
                        </ul>
                        <ul>
                            <li>institute</li>
                            <li>University of London</li>
                            <li>University of London</li>
                        </ul>
                    </div>
                    <h3>experienced</h3>
                    <div class="experienced">
                        
                        <ul>
                            <li>year</li>
                            <li>2007 - 2008</li>
                            <li>2010 - 2018</li>
                        </ul>
                        <ul>
                            <li>position</li>
                            <li>ielts instructor mentors</li>
                            <li>ielts instructor</li>
                        </ul>
                        <ul>
                            <li>institute</li>
                            <li>st. jhon institute</li>
                            <li>excel institute</li>
                        </ul>
                    </div>      
                </div>
            </div>
        </div>
    </section>
    <!-- Instructor Area End -->

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