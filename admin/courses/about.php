<!DOCTYPE html>



<?php 
include 'library/session.php';
Session_start();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
                    <li><a href="student-profile.html"><i class="fa-solid fa-user"></i>my account</a></li>
                    <li><a href="wishlist.html"><i class="fa-solid fa-heart"></i>wishlist</a></li>
                    <li><a href="?action=logout"><i class="fa-solid fa-right-to-bracket"></i>log out</a></li>
                </ul>
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

    <!-- About Area Start -->
    <section class="about-area pt-80 pb-80" id="about">
        <div class="container">
            <div class="section-title">
            <h4>About Us</h4>
            </div>
            <div class="about-us">
                <div class="main-about">
                    <div class="about-infos">
                        <h4>this is our story</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta adipisci voluptates debitis quos commodi culpa deleniti delectus!
                            Possimus repudiandae deserunt tenetur ipsam minus quaerat unde similique</p>
                    </div>
                    <div class="about-content">
                        <div class="single-about">
                            <h4>our vission</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, quisquam cum maiores facere nostrum eius itaque vero incidunt blanditiis illo dolorem sunt esse earum consequuntur in quibusdam libero.</p>
                        </div>
                        <div class="single-about">
                            <h4>our mission</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, quisquam cum maiores facere nostrum eius itaque vero incidunt blanditiis illo dolorem sunt esse earum consequuntur in quibusdam libero.</p>
                        </div>
                    </div>
                </div>
                <div class="main-about-img">
                    <img src="assets/img/about/about-7.jpg" alt="About Us">
                </div>
            </div>
            
        </div>
    </section>
    <!-- About Area End -->

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
