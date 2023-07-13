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
                    <a href="index.php">a b c</a>
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
			  $query= "SELECT students.*,course_plan.*
              FROM students 
              INNER JOIN course_plan ON course_plan.id=students.course_id WHERE email='$email' AND password= '$password' AND  status='enroll'";
			  $result= $db->select($query);
			  if($result != false){
				  $value=$result->fetch_array();
				   Session::set("login",true);
				   Session::set("login",false);
				   Session::set("email",$value['email']);
				   Session::set("password",$value['password']);
				   Session::set("usertype",$value['usertype']);
				   Session::set("status",$value['Updated']);
                   Session::set("Course_Name",$value['Course_Name']);
                   Session::set("student_name",$value['student_name']);
                   Session::set("mobile",$value['mobile']);				   
                   Session::set("id",$value['id']);

				   header("Location:student-profile.php");
				   }else{
				echo   "<script>alert('user name or password not match or waiting for confirm')</script>";
			  }
		 }   
			  
			  
			 
			  
			 
			 
			 
			 
	 
	
	?>
    <section class="banner-area" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="login-banner">
                <h1>log in</h1>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Enter Email"/>
                    <input type="password"  name="password" placeholder="Password"/>
                    <input type="submit" name="submit" value="submit"/>
                </form>
                <h4>not registered?<a href="registration.php">register here</a></h4>
            </div>    
        </div>
    </section>
    <!-- Login Banner Area End -->
</body>
</html>