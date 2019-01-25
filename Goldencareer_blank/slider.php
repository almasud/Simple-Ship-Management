<div class="slider_area">
			<div class="slider">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="slider_image">
								<!-- Start WOWSlider.com BODY section --> <!-- add to the of your page -->
								<div id="wowslider-container1">
									<div class="ws_images">
										<ul>
										<?php 
											$query = "SELECT * FROM slider ORDER BY sid DESC";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											while($row = mysqli_fetch_array($result)){
											
											$title = $row['title'];
											$subtitle = $row['subtitle'];
											$link = $row['link'];
											$photo = $row['photo'];
											$post_bid = $row['bid'];
											$datetime = $row['datetime'];
											
											echo '<li><a href="'.$link.'"><img src="admin/images/slider/data1/images/'.$photo.'" alt="Screenshot" title="'.$title.'" id="wows1_3"/></a>'.$subtitle.'</li>';
											
											}
										
										?>
										</ul>
									</div>
									<div class="ws_bullets">
										<div>
											<?php 
											$query = "SELECT * FROM slider";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											while($row = mysqli_fetch_array($result)){
											
											$title = $row['title'];
											$subtitle = $row['subtitle'];
											$link = $row['link'];
											$photo = $row['photo'];
											$post_bid = $row['bid'];
											$datetime = $row['datetime'];
											
											echo '<a href="" title="'.$title.'"></a>';
											
											}
										
										?>
											
										</div>
									</div>
									<span class="wsl"><a href="https://facebook.com/almasud.arm">slideshow</a> by Abdullah Almasud</span>
										<div class="ws_shadow"></div>
								</div>	
									<script type="text/javascript" src="admin/images/slider/engine1/wowslider.js"></script>
									<script type="text/javascript" src="admin/images/slider/engine1/script.js"></script>
									<!-- End WOWSlider.com BODY section -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>