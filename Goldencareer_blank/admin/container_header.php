
	<div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="welcome.php?ok"><i class="icon-chevron-right"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="view_all_message.php?ok"><span class="badge badge-important pull-right"><?php $results = mysqli_query($con,"SELECT * FROM message");$count = mysqli_num_rows ($results);echo $count;?></span>Message</a>
                        </li>
						<li>
                            <a href="view_all_comment.php?ok"><span class="badge badge-important pull-right"><?php $results = mysqli_query($con,"SELECT * FROM comment");$count = mysqli_num_rows ($results);echo $count;?></span>Comment</a>
                        </li>
                        <li>
                            <a href="slider_option.php"><i class="icon-chevron-right"></i>Slider Image</a>
                        </li>
                        <li>
                            <a href="post_option.php"><i class="icon-chevron-right"></i>Post</a>
                        </li>
						<li>
                            <a href="photo_option.php"><i class="icon-chevron-right"></i>Gallery Photo</a>
                        </li>
                      
                        
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right"><?php $results = mysqli_query($con,"SELECT * FROM post");$count = mysqli_num_rows ($results);echo $count;?></span>Total Post</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-right"><?php $results = mysqli_query($con,"SELECT DISTINCT category FROM post");$count = mysqli_num_rows ($results);echo $count;?></span>Posted Category</a>
                        </li>
						<li>
                            <a href="#"><span class="badge badge-info pull-right"><?php $results = mysqli_query($con,"SELECT * FROM photogallery");$count = mysqli_num_rows ($results);echo $count;?></span>Total Gallery Photo</a>
                        </li>
						<li>
                            <a href="#"><span class="badge badge-info pull-right"><?php $results = mysqli_query($con,"SELECT * FROM slider");$count = mysqli_num_rows ($results);echo $count;?></span>Total Slider Image</a>
                        </li>
                        
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
					<?php
						if(isset($_GET['msg1'])){
						
							$alert = "success";
							 
							echo '<div class="alert alert-'.$alert.'">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	'.$_GET['msg1'].'</div> ';
							}
							else if(isset($_GET['msg0'])){
						
							$alert = "danger";
							 
							echo '<div class="alert alert-'.$alert.'">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Erorr:</h4>
                        	'.$_GET['msg0'].'</div> ';
							}
							else{}
					?>
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li>
	                                        <a href="#">Settings</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li class="active">Tools</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        
                    </div>
                    
					
                   
            
