<!DOCTYPE html>
<?php 
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
    <section class="header-top-area">
        <div class="container">
            <div class="header-left">
                <ul>
                    <li><a href="student-profile.php"><i class="fa-solid fa-user"></i>my account</a></li>
                    <li><a href="wishlist.php"><i class="fa-solid fa-heart"></i>wishlist</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-right-to-bracket"></i>log out</a></li>
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
                    <a href="index.html">eduTalk</a>
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

    <!-- Wishlist Area Start -->
    <section class="wishlist-area pt-80 pb-80">
        <div class="container">
            <div class="wish-info">
                <h1>wish list</h1>
            </div>
            <div class="wishlist">
            <?php
				
                $db= new database(); 

               if(isset($_POST['submit'])){
              
              $message=$_POST['message'];     
              if(empty($message)){
                echo '<script>alert("field must not be empty")</script>';
              }
       

               $insert="INSERT INTO  wishlist (message) 
               VALUES('$message')";
                  $insert_rows=$db->catinsert($insert);
                  if($insert_rows){
                    echo '<script>alert("Text Sent!! We will reply you with an email")</script>';
                  }else{
                    echo '<script>alert("Text Not Sent")</script>';
                  
              }
              
          }
      



          ?>
				 
                 <form method="post" action="">
                    <textarea placeholder="Your Message Here" name="message"></textarea>
                    <input type="submit" name="submit" value="Submit"/>
                    	
                </form>
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
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </div>    
        </div>
    </footer>
    <!-- Footer Area End -->
</body>
</html>