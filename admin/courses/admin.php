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
    
    <!-- Login Banner Area Start -->
    <?php 
	     if($_SERVER['REQUEST_METHOD'] =='POST'){
			 
              $email= mysqli_real_escape_string($db->link,$_POST['email']);
			  $password= $_POST['password'];
			 
			  $query= "SELECT * FROM  users WHERE email='$email' AND password= '$password' ";
			  $result= $db->select($query);
			  if($result != false){
				  $value=$result->fetch_array();
				   Session::set("login",true);
				   Session::set("email",$value['email']);
				   Session::set("password",$value['password']);
				   Session::set("usertype",$value['usertype']);
				   Session::set("fname",$value['fname']);
				   Session::set("lname",$value['lname']);
				   Session::set("Course_Name",$value['Course_Name']);
                   Session::set("id",$value['id']);
				   header("Location:admin/index.php");
				   }else{
				echo   "<script>alert('user name or password not match or wait for admin confirmation')</script>";
			  }
		 }   
			  
			  
			 
			  
			 
			 
			 
			 
	 
	
	?>
	
    <section class="banner-area" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="login-banner">
                <h1>admin log in</h1>
				 <h4>you are teacher<a href="instructor-login.php">login here</a></h4>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Enter Email"/>
                    <input type="password"  name="password" placeholder="Password"/>
                    <input type="submit" name="submit" value="submit"/>
                </form>
                <h4>not registered?<a href="admin-reg/registration.php">register here</a></h4>
                
            </div>    
        </div>
    </section>
    <!-- Login Banner Area End -->
</body>
</html>