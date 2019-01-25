<?php
	include('db_connect.php');
		
	?>
				
<div class="row-fluid">
	<!-- block -->
<div class="block">
	 <div class="navbar navbar-inner block-header">
		<?php 
			$results = mysqli_query($con,"SELECT * FROM slider");
			$count = mysqli_num_rows ($results);
		?>
			<div class="muted pull-left">Slider&nbsp;&nbsp;<?php if($count > $item_per_page) { if(isset($_GET['old'])){echo'<a href="view_all_slider.php">View from Newer</a>';}else{echo'<a href="view_all_slider.php?old">View from older</a>';}}?></div>
			<div class="pull-right">
			
			<span class="badge badge-info"><?php echo $count; ?></span>

			</div>
		</div>
				
		<?php if(isset($_GET['old'])){
			
			$table = "slider";
			$limit = 5;
			$order_col = "sid";
			$order = "ASC";
			$visible_page = 5;
			
			slider ($con,$table,$limit,$order_col,$order,$visible_page);
		
		}else{ 
		
			$table = "slider";
			$limit = 5;
			$order_col = "sid";
			$order = "DESC";
			$visible_page = 5;
			
			slider ($con,$table,$limit,$order_col,$order,$visible_page);
		 
		 }?>
					
</div>
<!-- /block -->
</div>
