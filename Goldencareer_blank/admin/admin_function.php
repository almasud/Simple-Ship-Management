<?php 
	// This function is use for all Post.All perameter is required...
	function post ($con,$table,$limit,$order_col,$order,$visible_page){
		
		if(isset($_GET['page'])){
			
			$page_name = $_GET['page'];
			
			$count_sql = "SELECT * FROM $table WHERE page = '$page_name' ";  
			$sql_result = mysqli_query($con,$count_sql);  
			$count = mysqli_num_rows($sql_result);  

			$toatal_post = $count;
			$limit = 5; 
			$total_page = ceil($toatal_post / $limit);
			$visible_page = 5;
		  
			if (isset($_GET["pst_page"])) { $page  = $_GET["pst_page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit;  
			  
			//Limit our results within a specified range. 
			
			$results = mysqli_query($con,"SELECT * FROM $table WHERE page = '$page_name' ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");  
			
		} else if(isset($_GET['category'])){
			
			$category = $_GET['category'];
			
			$count_sql = "SELECT * FROM $table WHERE category = '$category' ";  
			$sql_result = mysqli_query($con,$count_sql);  
			$count = mysqli_num_rows($sql_result);  

			$toatal_post = $count;
			$limit = 5; 
			$total_page = ceil($toatal_post / $limit);
			$visible_page = 5;
		  
			if (isset($_GET["pst_page"])) { $page  = $_GET["pst_page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit;  
			  
			//Limit our results within a specified range. 
			
			$results = mysqli_query($con,"SELECT * FROM $table WHERE category = '$category' ORDER BY $order_col $order LIMIT $start_from, $limit");
		}
		else{
			
			$count_sql = "SELECT * FROM $table";  
			$sql_result = mysqli_query($con,$count_sql);  
			$count = mysqli_num_rows($sql_result);  

			$toatal_post = $count;
			$limit = 5; 
			$total_page = ceil($toatal_post / $limit);
			$visible_page = 5;
		  
			if (isset($_GET["pst_page"])) { $page  = $_GET["pst_page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit;  
			  
			//Limit our results within a specified range. 
			
			$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");  
			
		}
		 
		if($count !=0){

		//output results from database
		
		while($row = mysqli_fetch_array($results))
		{	$title = $row['title'];
			$content = $row['content'];
			$category = $row['category'];
			$page = $row['page'];
			$photo = $row['photo'];
			$post_bid = $row['bid'];
			$datetime = $row['datetime'];
			$pid = $row['pid'];
			// This is for Bloger information							
				$table = "userform";
				$sql = "SELECT * FROM $table WHERE bid = $post_bid";
				$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
				$data = mysqli_fetch_array($output);
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
				$role = $data['role'];
			//This is for post comment information	
				$csql = "SELECT * FROM comment WHERE pid = $pid";
				$coutput=mysqli_query($con,$csql) or die ('Database not connect'.mysqli_error($con));
				$ccount = mysqli_num_rows ($coutput);
				$arr = mysqli_fetch_array($coutput);
				
				$cpid = $arr['pid'];
				
		echo'
			<div class="blog-post">
				<a href="post_details.php?pid='.$row["pid"].'"><h2 class="blog-post-title">'.$title.'</h2></a>
				<p class="blog-post-meta">
					'.$datetime.' by &nbsp;';
					if($role == 'admin')
					{
						echo '<a href="#">Admin</a>';
					}else
					{
						echo '<a href="#">'.$first_name.' '.$last_name.'</a>';
					}
			echo'</p>';
					 if($photo !=null || $photo !=""){ 
				echo '<div class="postimage">
						<img src="images/upload/'.$photo.'" alt="Post Image" class="img-thumbnail">
					</div>'; }
					if(strlen($content)>500){
				echo'	<div class="postdetails">
						<p id="content">
							'.substr($content,0,480) . '...<br/>
							<a class="btn btn-primary" role="button" href="post_details.php?pid='.$row["pid"].'">View details</a>
						</p>
					</div>';}
					else{
					
						echo'	<div class="postdetails">
						<p id="content">
							'.$content.'
						</p>
					</div>';
						}
																						
				echo'<p class="blog-post-meta">
						Category
						<a href="'.$_SERVER["PHP_SELF"].'?category='.$category.'">'.$category.'</a> &
							Page
						<a href="'.$_SERVER["PHP_SELF"].'?page='.$page.'">'.$page.'.</a>&nbsp;';
						if($ccount == 0){echo'No comment.';}else{
						echo '<a href="post_details.php?pid='.$row["pid"].'">';
						if($ccount == 1){echo $ccount.'&nbsp;Comment.</a>';}else {echo $ccount.'&nbsp;Comments.</a>';}
						}
				echo'</p>
					<hr>
					</div>
				<div class="col-md-1"></div>';
		}
			
	?>	
		<ul id="pagination-post" class="pagination-md"></ul>
		
<!--Pgination -->
	<script>
	$('#pagination-post').twbsPagination({
        totalPages:<?php echo $total_page; ?>,
        visiblePages:<?php echo $visible_page; ?>,
         href: '?pst_page={{number}}'
    });
   </script>
			 
	<?php
	
		}								
		
		else {
				echo 'There are no post yet.';
					
			}
	}
	
	// This function is used for post details.
	function post_details ($con){
		 
		if(isset($_GET['pid'])){
		
			$pid = $_GET['pid'];
		
			$query = "SELECT * FROM post WHERE pid = $pid";
			$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			
			$row = mysqli_fetch_array($result);
			
			$title = $row['title'];
			$content = $row['content'];
			$category = $row['category'];
			$page = $row['page'];
			$photo = $row['photo'];
			$post_bid = $row['bid'];
			$datetime = $row['datetime'];
			//This is for blogger information							
				$table = "userform";
				$sql = "SELECT * FROM $table WHERE bid = $post_bid";
				$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
				$data = mysqli_fetch_array($output);
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
				$role = $data['role'];
				
			//This is for post comment information	
				$csql = "SELECT * FROM comment WHERE pid = $pid";
				$coutput=mysqli_query($con,$csql) or die ('Database not connect'.mysqli_error($con));
				$ccount = mysqli_num_rows ($coutput);
				$arr = mysqli_fetch_array($coutput);
										
				echo'<div class="blog-post">
						<a href=""><h2 class="blog-post-title">'.$title.'</h2></a>
						<p class="blog-post-meta">
							<a href="edit_post.php?pid='.$pid.'">Edit</a>&nbsp;
							<a href="delete_post_confirm.php?pid='.$pid.'">Delete</a>
						</p>
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
							<img src="images/upload/'.$photo.'" alt="Post Image" class="img-thumbnail">
						</div>'; }
					echo'	<div class="postcontent_main">
							<p id="content">
								'.$content.'
							</p>
						</div>
																							
						<p class="blog-post-meta">
						Category
						<a href="view_all_post.php?category='.$category.'">'.$category.'</a> &
							Page
						<a href="view_all_post.php?page='.$page.'">'.$page.'.</a>&nbsp;';
						if($ccount == 0){echo'No comment.';}else{
						echo '<a href="post_details.php?pid='.$row["pid"].'">';
						if($ccount == 1){echo $ccount.'&nbsp;Comment.</a>';}else {echo $ccount.'&nbsp;Comments.</a>';}
						}
						echo'&nbsp;<a href="comment.php?pid='.$pid.'">Add comment.</a>
						</p></div><hr>';
						
						//This is for post comment information	
						$csql = "SELECT * FROM comment WHERE pid = $pid ORDER BY cid DESC LIMIT 10 OFFSET 0";
						$coutput=mysqli_query($con,$csql) or die ('Database not connect'.mysqli_error($con));
				
						//This is for post comment count information	
						$ccountsql = "SELECT * FROM comment WHERE pid = $pid";
						$ccountoutput=mysqli_query($con,$ccountsql) or die ('Database not connect'.mysqli_error($con));
						$ccount = mysqli_num_rows ($ccountoutput);
						
						while($arr = mysqli_fetch_array($coutput)){
						
							$cid = $arr['cid'];
							$cname = $arr['name'];
							$cemail = $arr['email'];
							$ccontent = $arr['content'];
							$cpid = $arr['pid'];
							$cdatetime = $arr['datetime'];
							$cpost_bid = $arr['post_bid'];
							//Check admin in comment...
							$check_admin_sql = "SELECT role FROM userform WHERE email = '$cemail' ";
							$check_admin_result = mysqli_query ($con,$check_admin_sql) or die ("Database nont connect".mysqli_error($con));
							$check_admin_row = mysqli_fetch_array ($check_admin_result);
							$check_admin_role = $check_admin_row ['role'];
							echo'<p class="blog-post-meta">';
							if($check_admin_role == 'admin'){
										echo '<a href="#">Admin</a>';
									}else
									{
										echo '<a href="#">'.$cname.'</a>';
									}
							echo'&nbsp;
							On '.$cdatetime.'<br/>
								'.$ccontent.'
								</p>';}
								if ($ccount>10){
							echo'<a href="older_comment.php?pid='.$pid.'"><--View older comment</a>';
							}
				echo'</div>';

	}
						

					
	}
	
	// This is for older comment...
	function older_comment ($con){
		
		if(isset($_GET['pid'])){
							
		$pid = $_GET['pid'];
									
		  echo '<div class="blog-post">';
					
					//This is for post comment count information	
					$ccountsql = "SELECT * FROM comment WHERE pid = $pid";
					$ccountoutput=mysqli_query($con,$ccountsql) or die ('Database not connect'.mysqli_error($con));
					$ccount = mysqli_num_rows ($ccountoutput);
					
					//This is for post comment information	
					$csql = "SELECT * FROM comment WHERE pid = $pid ORDER BY cid DESC LIMIT 10,$ccount";
					$coutput=mysqli_query($con,$csql) or die ('Database not connect'.mysqli_error($con));

					while($arr = mysqli_fetch_array($coutput)){
					
						$cid = $arr['cid'];
						$cname = $arr['name'];
						$cemail = $arr['email'];
						$ccontent = $arr['content'];
						$cpid = $arr['pid'];
						$cdatetime = $arr['datetime'];
						$cpost_bid = $arr['post_bid'];
						//Check admin in comment...
						$check_admin_sql = "SELECT role FROM userform WHERE email = '$cemail' ";
						$check_admin_result = mysqli_query ($con,$check_admin_sql) or die ("Database nont connect".mysqli_error($con));
						$check_admin_row = mysqli_fetch_array ($check_admin_result);
						$check_admin_role = $check_admin_row ['role'];
						echo'<p class="blog-post-meta">';
						if($check_admin_role == 'admin'){
									echo '<a href="#">Admin</a>';
								}else
								{
									echo '<a href="#">'.$cname.'</a>';
								}
						echo'&nbsp;
						On '.$cdatetime.'<br/>
							'.$ccontent.'
							</p>';}
							if ($ccount>10){
						echo'<a href="post_details.php?pid='.$pid.'"><--View newer comment</a>';
						}
			echo'</div>';

		}
	}
	
	// This function is used for message.All perameter is required...
	
	function message ($con,$table,$limit,$order_col,$order,$visible_page) {

		$count_sql = "SELECT * FROM $table";  
		$sql_result = mysqli_query($con,$count_sql);  
		$count = mysqli_num_rows($sql_result);  

		$toatal_post = $count;
		$limit = 5; 
		$total_page = ceil($toatal_post / $limit);
		$visible_page = 5;
	  
		if (isset($_GET["msg_page"])) { $page  = $_GET["msg_page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
		  
		//Limit our results within a specified range. 
		
		$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet."); 
		
		if($count !=0){

		echo'<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th> Name </th>
				<th>Email</th>
				<th>Message</th>
			</tr>
		</thead>
		<tbody>';
		//output results from database
			while($row = mysqli_fetch_array($results))
			{	$subject = $row['subject'];
				$details = $row['details'];
				$sender_name = $row['name'];
				$sender_email = $row['email'];
				$datetime = $row['datetime'];
				$mid = $row['mid'];
											
											
				  echo '
							<tr>
								<td>'.$row["mid"].'</td>
								<td>'.$sender_name.'</td>
								<td>'.$sender_email.'</td>
								<td><a href="message_details.php?mid='.$mid.'">'.substr($subject,0,15) . '...</a></td>
							</tr>';
							?>
					 
			<?php							
					}
				}else {
						echo 'There are no Message yet.';
					}
		echo'	</tbody>
			</table>';
			 ?> 
				
				<ul id="pagination-message" class="pagination-md"></ul>
		
		<!--Pgination -->
			<script>
			$('#pagination-message').twbsPagination({
				totalPages:<?php echo $total_page; ?>,
				visiblePages:<?php echo $visible_page; ?>,
				 href: '?msg_page={{number}}'
			});
		   </script>
			
			<?php 
			
	}
	// This function is used for comments.All perameter is required...
	
	function comment ($con,$table,$limit,$order_col,$order,$visible_page) {

		$count_sql = "SELECT * FROM $table";  
		$sql_result = mysqli_query($con,$count_sql);  
		$count = mysqli_num_rows($sql_result);  

		$toatal_post = $count;
		$limit = 5; 
		$total_page = ceil($toatal_post / $limit);
		$visible_page = 5;
	  
		if (isset($_GET["cmt_page"])) { $page  = $_GET["cmt_page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
										
		//Limit our results within a specified range. 
		
		$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");
		
		if($count !=0){

		echo'<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th> Name </th>
				<th>Email</th>
				<th>Message</th>
			</tr>
		</thead>
		<tbody>';
		//output results from database
			while($row = mysqli_fetch_array($results))
			{	$comment_pid = $row['pid'];
				$comment = $row['content'];
				$sender_name = $row['name'];
				$sender_email = $row['email'];
				$datetime = $row['datetime'];
				$cid = $row['cid'];
											
																			
					  echo '
								<tr>
									<td>'.$row["cid"].'</td>
									<td>'.$sender_name.'</td>
									<td>'.$sender_email.'</td>
									<td><a href="comment_details.php?cid='.$cid.'">'.substr($comment,0,15) . '...</a></td>
									<td><a href="post_details.php?pid='.$comment_pid.'">View on post</a></td>
								</tr>';
							?>
					 
			<?php							
					}
				}else {
						echo 'There are no comment yet.';
					}
		echo'	</tbody>
			</table>';
			 ?> 
				
				<ul id="pagination-comment" class="pagination-md"></ul>
		
		<!--Pgination -->
			<script>
			$('#pagination-comment').twbsPagination({
				totalPages:<?php echo $total_page; ?>,
				visiblePages:<?php echo $visible_page; ?>,
				 href: '?cmt_page={{number}}'
			});
		   </script>
			
			<?php 
			
	}
	// This function is used for gallery image.All perameter is required...
	
	function gallery ($con,$table,$limit,$order_col,$order,$visible_page) {

		$count_sql = "SELECT * FROM $table";  
		$sql_result = mysqli_query($con,$count_sql);  
		$count = mysqli_num_rows($sql_result);  

		$toatal_post = $count;
		$limit = 5; 
		$total_page = ceil($toatal_post / $limit);
		$visible_page = 5;
	  
		if (isset($_GET["glr_page"])) { $page  = $_GET["glr_page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
										
		//Limit our results within a specified range. 
		
		$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");
		
		if($count !=0){
			
			echo '<div class="block-content collapse in">
				<div class="row-fluid padd-bottom">';

		//output results from database
		while($row = mysqli_fetch_array($results))
		{	$title = $row['title'];
			$name = $row['name'];
			$type = $row['type'];
			$size = $row['size'];
			$photoid = $row['photoid'];
			$post_bid = $row['bid'];
			$datetime = $row['datetime'];
										
				$table = "userform";
				$sql = "SELECT first_name,last_name FROM $table WHERE bid = $post_bid";
				$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
				$data = mysqli_fetch_array($output);
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
				
		echo'
			<div class="view_photo" >	
			  <div class="span3">
				  <a href="photo_details.php?photoid='.$photoid.'" class="thumbnail">
					<img src="images/albums/Photogallery/'.$name.'" alt="260x180" style="width: 260px; height: 180px;">
				  </a>
			  </div>
			</div>';
			}
			echo '</div>
			</div>';
			
		}else {
		
			echo 'There are no photo yet.';
		
		}
			 ?> 
				
				<ul id="pagination-gallery" class="pagination-md"></ul>
		
		<!--Pgination -->
			<script>
			$('#pagination-gallery').twbsPagination({
				totalPages:<?php echo $total_page; ?>,
				visiblePages:<?php echo $visible_page; ?>,
				 href: '?glr_page={{number}}'
			});
		   </script>
			
			<?php 
			
	}
	// This function is used for slider image.All perameter is required...
	
	function slider ($con,$table,$limit,$order_col,$order,$visible_page) {

		$count_sql = "SELECT * FROM $table";  
		$sql_result = mysqli_query($con,$count_sql);  
		$count = mysqli_num_rows($sql_result);  

		$toatal_post = $count;
		$limit = 5; 
		$total_page = ceil($toatal_post / $limit);
		$visible_page = 5;
	  
		if (isset($_GET["sldr_page"])) { $page  = $_GET["sldr_page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
										
		//Limit our results within a specified range. 
		
		$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");
		
		if($count !=0){
			
			echo '<div class="block-content collapse in">
				<div class="row-fluid padd-bottom">';

		//output results from database
		
		while($row = mysqli_fetch_array($results))
		{	$title = $row['title'];
			$subtitle = $row['subtitle'];
			$photo_link = $row['link'];
			$photo_name = $row['photo'];
			$sliderid = $row['sid'];
			$photo_bid = $row['bid'];
			$datetime = $row['datetime'];
										
				$table = "userform";
				$sql = "SELECT first_name,last_name FROM $table WHERE bid = $photo_bid";
				$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
				$data = mysqli_fetch_array($output);
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
										
			  echo '<div class="view_photo" >	
					  <div class="span3">
						  <a href="slider_details.php?sliderid='.$sliderid.'" class="thumbnail">
							<img src="images/slider/data1/images/'.$photo_name.'" alt="260x180" style="width: 260px; height: 180px;">
						  </a>
					  </div>
					</div>';
			}
			echo '</div>
			</div>';
			
		}else {
				
					echo 'There are no photo yet.';
				
				}				
						 ?> 
				
				<ul id="pagination-slider" class="pagination-md"></ul>
		
		<!--Pgination -->
			<script>
			$('#pagination-slider').twbsPagination({
				totalPages:<?php echo $total_page; ?>,
				visiblePages:<?php echo $visible_page; ?>,
				 href: '?sldr_page={{number}}'
			});
		   </script>
			
			<?php 
			
	}
	// This function is used for CV.All perameter is required...
	
	function cv ($con,$table,$limit,$order_col,$order,$visible_page) {

		$count_sql = "SELECT * FROM $table";  
		$sql_result = mysqli_query($con,$count_sql);  
		$count = mysqli_num_rows($sql_result);  

		$toatal_post = $count;
		$limit = 5; 
		$total_page = ceil($toatal_post / $limit);
		$visible_page = 5;
	  
		if (isset($_GET["cv_page"])) { $page  = $_GET["cv_page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
										
		//Limit our results within a specified range. 
		
		$results = mysqli_query($con,"SELECT * FROM $table ORDER BY $order_col $order LIMIT $start_from, $limit") or die ("Database not connet.");
		
		if($count !=0){

		//output results from database
		
		echo '<ul class="page_result">';
					while($row = mysqli_fetch_array($results))
					{	$content = $row['content'];
						$document = $row['document'];
						$cv_bid = $row['bid'];
						$cv_id = $row['id'];
						$datetime = $row['datetime'];
													
							$table = "userform";
							$sql = "SELECT * FROM $table WHERE bid = $cv_bid";
							$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
							$data = mysqli_fetch_array($output);
							$first_name = $data['first_name'];
							$last_name = $data['last_name'];
							$role = $data['role'];
													
						  echo '<li id="item_'.$row["id"].'">
									
									<div class="blog-post">		
													
										<p class="blog-post-meta">
											'.$datetime.' by &nbsp;';
											if($role == 'admin'){
												echo '<a href="#">Admin</a>';
											}else
											{
												echo '<a href="#">'.$first_name.' '.$last_name.'</a>';
											}
								echo'	</p>
										<p class="blog-post-meta">
											
											<a href="delete_cv_confirm.php?cv_id='.$cv_id.'">Delete</a>
										</p>
										<hr>
										<div class="postdetails">
											<p id="content">
												'.$content.'
											</p>
										</div>
										<style type="text/css" media="all">.origin-widget.origin-widget-button-simple-pink a{display:inline-block;padding:10px 45px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;color:#8E1238;font-size:0.875em;font-family:inherit;font-weight:500;text-decoration:none;text-shadow:0 1px 0 #FFAEC1;text-align:center;-webkit-box-shadow:inset 0 1px 0 #FF92A6,0 1px 2px rgba(0,0,0,0.1);-moz-box-shadow:inset 0 1px 0 #FF92A6,0 1px 2px rgba(0,0,0,0.1);box-shadow:inset 0 1px 0 #FF92A6,0 1px 2px rgba(0,0,0,0.1);background:#f6778c;background:-webkit-gradient(linear,left bottom,left top,color-stop(0,#EB6E83),color-stop(1,#FF8195));background:-ms-linear-gradient(bottom,#EB6E83,#FF8195);background:-moz-linear-gradient(center bottom,#EB6E83 0%,#FF8195 100%);background:-o-linear-gradient(#FF8195,#EB6E83);border-top:solid 1px #CC5169;border-left:solid 1px #C0465F;border-right:solid 1px #C0465F;border-bottom:solid 1px #B43B55}.origin-widget.origin-widget-button-simple-pink a:hover{background:#FB7C91;background:-webkit-gradient(linear,left bottom,left top,color-stop(0,#F07388),color-stop(1,#FF869A));background:-ms-linear-gradient(bottom,#F07388,#FF869A);background:-moz-linear-gradient(center bottom,#F07388 0%,#FF869A 100%);background:-o-linear-gradient(#FF869A,#F07388);border-top:solid 1px #D1566E;border-left:solid 1px #C54B64;border-right:solid 1px #C54B64;border-bottom:solid 1px #B9405A}.origin-widget.origin-widget-button-simple-pink a:active{background:#F17287;background:-webkit-gradient(linear,left bottom,left top,color-stop(0,#F7778C),color-stop(1,#EB6D82));background:-ms-linear-gradient(bottom,#F7778C,#EB6D82);background:-moz-linear-gradient(center bottom,#F7778C 0%,#EB6D82 100%);background:-o-linear-gradient(#EB6D82,#F7778C);border-top:solid 1px #C74C64;border-left:solid 1px #BB415A;border-right:solid 1px #BB415A;border-bottom:solid 1px #AF3651;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;padding-top:11px;padding-bottom:9px}.origin-widget.origin-widget-button-simple-pink.align-left{text-align:left}.origin-widget.origin-widget-button-simple-pink.align-right{text-align:right}.origin-widget.origin-widget-button-simple-pink.align-center{text-align:center}.origin-widget.origin-widget-button-simple-pink.align-justify a{display:block}</style>
												
										<div class="origin-widget origin-widget-button origin-widget-button-simple-pink align-center">
											<a href="images/cv_file/'.$document.'" target="_blank">Download Your CV From Here</a>
										</div>
									</div>
																					
								</li>';
										}
										echo '</ul>';
				}else{
				
					echo 'There are no post yet.';
				
				}											
						 ?> 
				
				<ul id="pagination-cv" class="pagination-md"></ul>
		
		<!--Pgination -->
			<script>
			$('#pagination-cv').twbsPagination({
				totalPages:<?php echo $total_page; ?>,
				visiblePages:<?php echo $visible_page; ?>,
				 href: '?cv_page={{number}}'
			});
		   </script>
			
			<?php 
			
	}

?>

