<!DOCTYPE html>
<?php 
include 'library/session.php';
Session:: init();


?>
<?php 
include('library/database.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aims | Contact</title>
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

    <!-- Contact Area Start -->
    <section class="contact-area">
        <div class="container">
            <div class="contact-title">
                <h1>contact us</h1>
            </div>
            <div class="contact">
                <div class="contact-form">
                    <h3>send us a message</h3>
                    <p>We'd love to hear from you</p>
         
                    <div class="contact-text">
                    <?php
				
                $db= new database(); 

               if(isset($_POST['submit'])){
              
              $Name=$_POST['Name'];
              $email=$_POST['email'];
              $subject=$_POST['subject'];
              $message=$_POST['message'];     
              if(empty($Name)||empty($email)||empty($subject)||empty($message)){
                echo '<script>alert("field must not be empty")</script>';
              }
       

               $insert="INSERT INTO  contact (Name,email,subject,message) 
               VALUES('$Name','$email','$subject','$message')";
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
                            <input type="subject"  placeholder="Subject" name="subject"/>
                            <textarea  placeholder="Your Message Here" name="message"></textarea>
                            <input type="submit" name="submit" value="Submit"/>
                           
                        </form>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="single-contact">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                        <h2>address <span>new york, usa</span></h2>
                    </div>
                    <div class="single-contact">
                        <i class="fa-solid fa-phone"></i>
                        <h2>Phone<span>01234567890</span></h2>
                    </div>
                    <div class="single-contact">
                        <i class="fa-solid fa-envelope"></i>
                        <h2>Email<span>abc@gmail.com</span></h2>
                    </div>
                    <div class="single-contact">
                        <i class="fa-solid fa-sitemap"></i>
                        <h2>website<span>www.parker.com</span></h2>
                    </div>
                </div>
            </div>
        </div> 
        <hr class="section"></hr> 
    </section>
    <!-- Contact Area End -->

    <!-- Map Area Start -->
    <section class="map-area">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.375132877265!2d-0.13544616832210665!3d51.50633341449737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d048c70aa7%3A0x7c61e53746b583d5!2sInstitute%20of%20Contemporary%20Arts!5e0!3m2!1sen!2sbd!4v1674933330037!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- Map Area End -->

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