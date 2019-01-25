<div class="rpost_area">
			<div class="rpost">
				<div class="container">
					<div class="row">
						<div class="col-md-12 rpostp">
							<?php 
								$results = mysqli_query($con,"SELECT * FROM post ORDER BY pid DESC LIMIT 1 OFFSET 0") or die ('Database not connect'.mysqli_error());
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
								
							echo '<p style="text-align:center">'.$title.'</p>
							<p style="text-align:center">Posted In:&nbsp;<a href="view_all_post.php?category='.$category.'">'.$category.'</a> | Posted On: | '.$datetime.'';
							//This is for post comment information	
							$csql = "SELECT * FROM comment WHERE pid = $pid";
							$coutput=mysqli_query($con,$csql) or die ('Database not connect'.mysqli_error($con));
							$ccount = mysqli_num_rows ($coutput);
							$arr = mysqli_fetch_array($coutput);
							
							$cpid = $arr['pid'];
							
							if($ccount == 0){echo'&nbsp;No comment.';}
							else{
								echo '<a href="post_details.php?pid='.$row["pid"].'">&nbsp;';if($ccount == 1){echo $ccount.'&nbsp;Comment.</a>';}else {echo $ccount.'&nbsp;Comments.</a>';}
								}
							echo '</p>
							<hr>';
							if(strlen($content)>450){
							echo'<p>'.substr($content,0,445) . '...</p>
							<a href="post_details.php?pid='.$row['pid'].'" >Read More</a>';
							}else{ echo '<p>'.$content.'</p>'; }
					echo'	<div class="nav-previous">
								<a href="view_all_post.php?ok">
								<span class="meta-nav"><--</span>
								Older posts
								</a>
							</div>';
						}else{echo'There are no post yet.';}
									?>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<hr>