<div class="span3">
					<div class="sidebar">


						<ul class="widget widget-menu unstyled">
						    <?php if($_SESSION['usertype']=='admin'){
								
							
								?> 	
								<li>
								
								
								<a href="routine.php"><i class="menu-icon icon-tasks"></i> Routine</a>
							</li>
								<?php } ?>
								<?php if($_SESSION['usertype']=='staff' ){
								
							
								?> 	
									<li>
								
								
								<a href="routine.php"><i class="menu-icon icon-tasks"></i> Routine</a>
							</li>
												
						         
									<?php } ?>	
									
									
									
								
									
									
									
										<?php if($_SESSION['Course_Name']){
								
							
								?> 
									<li>
								
								
								<a href="routine.php"><i class="menu-icon icon-tasks"></i> Routine</a>
							</li>
												
						         
									<?php } ?>
								 
                                <li>

								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="courses.php"><i class="menu-icon icon-tasks"></i> Courses </a>
								<?php } ?></li>

								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> 
								<li><a href="ielts-modules.php"><i class="menu-icon icon-tasks"></i>CSE Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['usertype']=='staff'){
								
							
								?> 
								<li><a href="ielts-modules.php"><i class="menu-icon icon-tasks"></i>EEE Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['Course_Name']=='IELTS'){
								
							
								?> 
								<li><a href="ielts-modules.php"><i class="menu-icon icon-tasks"></i>CIVIL Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> 
								<li>

								<a href="basic-computer.php"><i class="menu-icon icon-tasks"></i>Basic Computer Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['usertype']=='staff'){
								
							
								?> 
								<li>

								<a href="basic-computer.php"><i class="menu-icon icon-tasks"></i>Basic Computer Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['Course_Name']=='Basic Computer'){
								
							
								?> 
								<li>

								<a href="basic-computer.php"><i class="menu-icon icon-tasks"></i>Basic Computer Modules</a>
								</li>
								<?php } ?>

								<?php if($_SESSION['usertype']=='admin'){
								
							
								?>
								<li>
								 <a href="spoken-english.php"><i class="menu-icon icon-tasks"></i> English Modules</a>
								</li>
								<?php } ?>
								
								<?php if($_SESSION['usertype']=='staff'){
								
							
								?>
								<li>
								 <a href="spoken-english.php"><i class="menu-icon icon-tasks"></i>English Modules</a>
								</li>
                              <?php } ?>								

								<?php if($_SESSION['Course_Name']=='Spoken English'){
								
							
								?>
								<li>
								 <a href="spoken-english.php"><i class="menu-icon icon-tasks"></i> English Modules</a>
								</li>
                                <?php } ?>								

								<li>
								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="batch.php"><i class="menu-icon icon-tasks"></i>Batches </a>
								</li>
								<?php } ?>

								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> 
								<li>
								<a href="notice.php"><i class="menu-icon icon-tasks"></i>Notice </a>
								</li>
								<?php } ?>
								
								

								<?php if($_SESSION['usertype']=='staff'){
								
							
								?> 
								<li>
								<a href="notice.php"><i class="menu-icon icon-tasks"></i>Notice </a>
								</li>
								<?php } ?>
								
								
								
								
								
							
								
								
								<?php if($_SESSION['Course_Name']){
								
							
								?> 
								<li>
								<a href="notice.php"><i class="menu-icon icon-tasks"></i>Notice </a>
								</li>
								<?php } ?>
								
								
								
								
								

								<li>
								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="teacher-reg.php"><i class="menu-icon icon-tasks"></i>Teacher </a>
								<?php } ?></li>

								<li>
								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="students-reg.php"><i class="menu-icon icon-tasks"></i>Students </a>
								<?php } ?></li>

								<li>
								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="course-plan.php"><i class="menu-icon icon-paste"></i>Course Plan</a>
								<?php } ?></li>
                                <li>
								
								
								<li>
								<?php if($_SESSION['usertype']=='admin'){
								
							
								?> <a href="user.php"><i class="menu-icon icon-tasks"></i>users </a>
								<?php } ?></li>

								<li>
							
								
                        
                            </ul><!--/.widget-nav-->
                          
							
						
                       
					</div><!--/.sidebar-->		
							
				</div><!--/.span3-->
                     