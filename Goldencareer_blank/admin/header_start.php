
	<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<!-- Custom -->
		<link href="style.css" rel="stylesheet"
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- Pagination -->
        <link rel="stylesheet" href="pagination/css/bootstrap_pagination.min.css">
        
		<script src="pagination/js/jquery-1.10.2.min.js"></script>
        <script src="pagination/js/jquery.twbsPagination.min.js"></script>
		
		<!--Category and page js in head -->
		<script type="text/javascript">//<![CDATA[ 

			// Category
			var country_arr = new Array("AboutUs", "Service", "OurQuality", "OurStory","Vacancies");

			// pages
			var s_a = new Array();
			s_a[0] = "";
			s_a[1] = "AboutGoldenCarier|WhoWeAre|WhatsOurJob|OurHistory|CorporateSocialResponsibility|OurFamily";
			s_a[2] = "ShipManagement|Experience|OurTraining|VasellInManagement|FleetDetails";
			s_a[3] = "OurQuality|QualityStandard|Security|Health&Safety|Accreditation";
			s_a[4] = "OurStory|LattestNews|AddUrPosition";
			s_a[5] = "Vacancies";


			function populateStates(countryElementId, stateElementId) {

				var selectedCountryIndex = document.getElementById(countryElementId).selectedIndex;

				var stateElement = document.getElementById(stateElementId);

				stateElement.length = 0; // Fixed by Julian Woods
				stateElement.options[0] = new Option('Select Page', '');
				stateElement.selectedIndex = 0;

				var state_arr = s_a[selectedCountryIndex].split("|");

				for (var i = 0; i < state_arr.length; i++) {
					stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
				}
			}

			function populateCountries(countryElementId, stateElementId) {
				// given the id of the <select> tag as function argument, it inserts <option> tags
				var countryElement = document.getElementById(countryElementId);
				countryElement.length = 0;
				countryElement.options[0] = new Option('Select Category', '-1');
				countryElement.selectedIndex = 0;
				for (var i = 0; i < country_arr.length; i++) {
					countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
				}

				// Assigned all countries. Now assign event listener for the states.

				if (stateElementId) {
					countryElement.onchange = function () {
						populateStates(countryElementId, stateElementId);
					};
				}
			}
			//]]>  

		</script>
		
		
   