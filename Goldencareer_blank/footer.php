<div class="footer_area">
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p> &copy; Copyrirgt By CompanyName,All right reserved.</p>
							<p> The site is developed by  <a style="color:red;" href="https://www.facebook.com/almasud.arm" target="_blank">Abdullah Almasud</a>.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- This is for menu -->		
	<script>$('#menu').slicknav({ label: '', duration: 1000, easingOpen: "easeOutBounce", //available with jQuery UI prependTo:'#demo2' })</script>
<!-- This is for toltip -->	
	<script>
	$(function() {
  $('a[href*=#home]:not([href=#about])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
  </script>
		

		<script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;">
			<i class="fa fa-angle-up"></i>
		</a>
	
	<!-- from admin deroctory -->
	
		<!--/.fluid-container-->
        <script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
		
    </body>
</html>
