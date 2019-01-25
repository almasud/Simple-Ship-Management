<div class="lpost">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 style="text-align:center">Our Latest Post</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="post_area">
			<div class="post">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<?php 
								
								$results = mysqli_query($con,"SELECT * FROM post WHERE page = 'AboutGoldenCarier' ORDER BY pid DESC LIMIT 1 OFFSET 0") or die ('Database not connect'.mysqli_error());
								$row = mysqli_fetch_array($results);
								$title = $row['title'];
								$pid = $row['pid'];
								$content = $row['content'];
								$category = $row['category'];
								$page = $row['page'];
								$photo = $row['photo'];
								$post_bid = $row['bid'];
								$datetime = $row['datetime'];
							
							
							if($photo !=null || $photo !=""){
							echo '<div class="post1image">
								
								<img class="img-responsive" src="admin/images/upload/'.$photo.'" alt="Image" />
									
							</div>'; }
							echo'<h3 style="text-align:center">'.$page.'</h3>';
							if(strlen($content)>450){
							echo'<p>'.substr($content,0,445) . '...</p>
							<a class="btn btn-success" href="post_details.php?pid='.$row['pid'].'" >Read More</a>';
							}else{ echo '<p>'.$content.'</p>'; } ?>
						</div>
						<div class="col-md-4">
							<?php 
								
								$results = mysqli_query($con,"SELECT * FROM post WHERE page = 'WhoWeAre' ORDER BY pid DESC LIMIT 1 OFFSET 0") or die ('Database not connect'.mysqli_error());
								$row = mysqli_fetch_array($results);
								$title = $row['title'];
								$pid = $row['pid'];
								$content = $row['content'];
								$category = $row['category'];
								$page = $row['page'];
								$photo = $row['photo'];
								$post_bid = $row['bid'];
								$datetime = $row['datetime'];
							
					if ($row!="" || $row!=null) {	
						
							if($photo !=null || $photo !=""){
							echo '<div class="post1image">
								
								<img class="img-responsive" src="admin/images/upload/'.$photo.'" alt="Image" />
									
							</div>'; }
							echo'<h3 style="text-align:center">'.$category.'</h3>';
							if(strlen($content)>450){
							echo'<p>'.substr($content,0,445) . '...</p>
							<a class="btn btn-success" href="post_details.php?pid='.$row['pid'].'" >Read More</a>';
							}else{ echo '<p>'.$content.'</p>'; } ?>
						</div>
						<div class="col-md-4">
							<?php 
								
								$results = mysqli_query($con,"SELECT * FROM post WHERE page = 'OurTraining' ORDER BY pid DESC LIMIT 1 OFFSET 0") or die ('Database not connect'.mysqli_error());
								$row = mysqli_fetch_array($results);
								$title = $row['title'];
								$pid = $row['pid'];
								$content = $row['content'];
								$category = $row['category'];
								$page = $row['page'];
								$photo = $row['photo'];
								$post_bid = $row['bid'];
								$datetime = $row['datetime'];
							
							
							if($photo !=null || $photo !=""){
							echo '<div class="post1image">
								
								<img class="img-responsive" src="admin/images/upload/'.$photo.'" alt="Image" />
									
							</div>'; }
							echo'<h3 style="text-align:center">'.$page.'</h3>';
							if(strlen($content)>450){
							echo'<p>'.substr($content,0,445) . '...</p>
							<a class="btn btn-success" href="post_details.php?pid='.$row['pid'].'" >Read More</a>';
							}else{ echo '<p>'.$content.'</p>'; } 
							
					}else{echo'There are no post yet.';}		?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>