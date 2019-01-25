<?php 

	include('admin/db_connect.php');

			include('header_start.php'); ?>
				<!-- ajax pagination -->
		<script type="text/javascript" src="admin/js/jquery-1.9.0.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#results").load("CorporateSocialResponsibility_fetch_pages.php", {'page':0}, function() {$("#1-page").addClass('active');});  //initial page number to load
			
			$(".paginate_click").click(function (e) {
				
				$("#results").prepend('<div class="loading-indication"><img src="images/ajax-loader.gif" /> Loading...</div>');
				
				var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
				var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 
				
				$('.paginate_click').removeClass('active'); //remove any active class
				
				//post page number and load returned data into result element
				//notice (page_num-1), subtract 1 to get actual starting point
				$("#results").load("CorporateSocialResponsibility_fetch_pages.php", {'page':(page_num-1)}, function(){

				});

				$(this).addClass('active'); //add active class to currently clicked element (style purpose)
				
				return false; //prevent going to herf link
			});	
		});
		</script>
					
		<?php	include('header_end.php');  ?>
				
				
				
						<?php
						
							//This is for pagination
							
									if(isset($_GET['ok'])) {
									
										$results = mysqli_query($con,"SELECT COUNT(*) FROM post");
										$get_total_rows = mysqli_fetch_array($results); //total records

										//break total records into pages
										$pages = ceil($get_total_rows[0]/$item_per_page);	

										//create pagination
										if($pages > 1)
										{
											$pagination	= '';
											$pagination	.= '<ul class="paginate">';
											for($i = 1; $i<$pages; $i++)
											{
												$pagination .= '<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
											}
											$pagination .= '</ul>';
										}
									
										
										
										
										
									}
									else {
										
										echo "Error for submitting";
									}
									?>
	<div class="row-fluid">
			<!-- block -->
		<div class="block">
			 <div class="navbar navbar-inner block-header">
					<div class="muted pull-left">
						<a href="index.php">Home</a>&nbsp;>>
						<a href="CorporateSocialResponsibility.php?ok">Corporate Social Responsibility</a>
					</div>
				</div>
				<div class="block-content collapse in">
					<div class="span12">
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
						<div class="post_area">
							<div class="post">
								<div class="container">
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-10">
											<div class="postview_main" id="results">
											</div>
												<?php if(isset($pagination)){ echo $pagination; }?>
										</div>
										<div class="col-md-1"></div>
									</div>
								</div>
							</div>
						</div>
						<hr>
			
					</div>
			</div>
		</div>
	</div>
									
				
				
						 
                                
                            
                            
									
							
										
											
										
									
							
		
				 
	<?php			
				include('footerwidget.php'); 

			include('footer.php'); 

?>