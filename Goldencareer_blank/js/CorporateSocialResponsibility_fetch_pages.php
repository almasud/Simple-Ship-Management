<?php	

		include('admin/db_connect.php');


			//sanitize post value
			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//validate page number is really numaric
			if(!is_numeric($page_number)){die('Invalid page number!');}

			//get current starting point of records
			$position = ($page_number * $item_per_page);

			//Limit our results within a specified range. 
			$results = mysqli_query($con,"SELECT * FROM post WHERE page = 'CorporateSocialResponsibility' ORDER BY pid DESC LIMIT $position, $item_per_page") or die ('Database not connect'.mysqli_error());
			$count = mysqli_num_rows ($results);
			
			if($count !=0){

			//output results from database
			echo '<ul class="page_result">';
					while($row = mysqli_fetch_array($results))
					{	$title = $row['title'];
						$content = $row['content'];
						$category = $row['category'];
						$page = $row['page'];
						$photo = $row['photo'];
						$post_bid = $row['bid'];
						$datetime = $row['datetime'];
													
							$table = "userform";
							$sql = "SELECT * FROM $table WHERE bid = $post_bid";
							$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
							$data = mysqli_fetch_array($output);
							$first_name = $data['first_name'];
							$last_name = $data['last_name'];
							$role = $data['role'];
													
						  echo '<li id="item_'.$row["pid"].'">
									<div class="blog-post">
									<a href="post_details.php?pid='.$row["pid"].'"><h2 class="blog-post-title">'.$title.'</h2></a>
									<p class="blog-post-meta">
										'.$datetime.' by&nbsp;';
											if($role == 'admin'){
												echo '<a href="#">Admin</a>';
											}else
											{
												echo '<a href="#">'.$first_name.' '.$last_name.'</a>';
											}
							echo '</p>';
									 if($photo !=null || $photo !=""){ 
									echo '<div class="postimage_main">
										<img src="admin/images/upload/'.$photo.'" alt="Post Image" class="img-thumbnail">
									</div>'; }
									if(strlen($content)>450){
								echo'	<div class="postcontent_main">
										<p id="content">
											'.substr($content,0,445) . '...
											<a class="btn btn-primary" role="button" href="post_details.php?pid='.$row["pid"].'">View details</a>
										</p>
									</div>';}
									else{
									
										echo'<div class="postcontent_main">
										<p id="content">
											'.$content.'
										</p>
									</div>';
										}
																										
								echo'<p class="blog-post-meta">
										Category
										<a href="#">'.$category.'</a> &
											Page
										<a href="#">'.$page.'.</a>
									</p>
									<hr>
																					
								</li>';
										}
										echo '</ul>';
										
				}else {
				
					echo 'There are no post yet.';
				
				}
										
?>