<!DOCTYPE html>
<?php 
include 'library/session.php';
Session:: init();


?>
<?php include 'library/database.php';?>
 <?php $db=new database ;?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aims || Login</title>
     <!-- FontAwesome CSS -->
     <link rel="stylesheet" href="assets/css/font-awesome.min.css">
     <!-- Main CSS -->
     <link rel="stylesheet" href="assets/css/style.css">
     <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
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
    
    <!-- Login Banner Area Start -->
    <?php 
	     if($_SERVER['REQUEST_METHOD'] =='POST'){
			 
              $email= mysqli_real_escape_string($db->link,$_POST['email']);
			  $password= $_POST['password'];
			  $query= "SELECT  teachers.*,course_plan.*
              FROM  teachers 
              INNER JOIN course_plan ON teachers.course_id=course_plan.id  WHERE email='$email' AND password='$password' ";
			  $result= $db->select($query);
			  if($result != false){
				  $value=$result->fetch_array();
				   Session::set("login",true);
				   
				   Session::set("email",$value['email']);
				   Session::set("password",$value['password']);
				   Session::set("usertype",$value['usertype']);
				   Session::set("Course_Name",$value['Course_Name']);
				   Session::set("course_id",$value['course_id']);
                   Session::set("fname",$value['fname']);
                   Session::set("id",$value['id']);

				   header("Location:admin/index.php");
				   }else{
                    
				echo   "<script>alert('user name or password not match')</script>";
			  }
		 }   
			  
			  
			 
			  
			 
			 
			 
			 
	 
	
	?>
    <section class="banner-area" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="login-banner">
                <h1>instructor log in</h1>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Enter Email"/>
                    <input type="password"  name="password" placeholder="Password"/>
                    <input type="submit" name="submit" value="submit"/>
                </form>
                
            </div>    
        </div>
    </section>
    <!-- Login Banner Area End -->
</body>
</html>