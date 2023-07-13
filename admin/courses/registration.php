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
    <title>Aims || Registration</title>
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
    
    <!-- Registration Banner Area Start -->
    <section class="banner-area" style="background-image: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="reg-banner">
                <h1>registration</h1>
				
				 <h4 style="color:black;text-align:center">if registration complete?<a href="login.php"> login here</a><h4>
                <!-- Select students start--> 
                

                <form action="registration.php" method="post">
                    <h1>
                        
                    <?php 
		
				   
                                            
                                    $db=new database();
                                   
                                    if(isset($_POST['submit'])){
                                        $student_name=$_POST['student_name'];
                                        $email=$_POST['email'];    
                                        $mobile=$_POST['mobile'];					   
                                        $course_id=$_POST['course_id'];    
                                        $password=$_POST['password'];
                                   
                            $query="insert into students(student_name,email,course_id,mobile,password,status)
                            values(' $student_name','$email','$course_id','$mobile','$password','pending')";
                            $insert_students=$db->catinsert($query);

                            if($insert_students){
                                echo "<script>alert('registration success,waiting for confirmation')</script>";
                            }else{
                                echo "<script>alert('Somthing went wrong')</script>";
                            }
                            
                            }

                          
                        





                            ?>



                    </h1>

               
                    <input type="text" name="student_name" placeholder="Name" value=""/>
                    <input type="email" name="email" placeholder="Email" value=""/>
                    <select name="course_id">    
                     <option value ="">Select Courses </option> 
                           <?php
								
								
							    $catquery="select * from course_plan";
								$course_read=$db->catselect($catquery);
								if($course_read){
									while($course_result=$course_read->fetch_assoc()){
								
								
								?>
								
								
								
								
								<option value="<?php echo $course_result['id'];?>"><?php echo $course_result['Course_Name'];?></option>
								<?php } };?>
								</select class="span8 tip" required >  
                    
                    <input type="mobile" name="mobile" placeholder="Mobile" value=""/>
                    <input type="password" name="password" placeholder="Password" value=""/>
                   <input type="submit" name="submit" value="submit"/>
                </form>
                
                
                
            </div>    
        </div>
    </section>
    <!-- Login Banner Area End -->
</body>
</html>