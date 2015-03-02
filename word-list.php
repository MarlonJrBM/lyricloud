<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Title -->
    <title>Lyricloud | Welcome</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/libs/foundation/css/foundation.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="app/css/style.css">
	<!-- Scripts -->
    <script src="assets/libs/foundation/js/vendor/modernizr.js"></script>
</head>
<body>
	<!-- Facebook share, include Javascript SDK. For non-foundation share at least, havent gotten to work with foundation. -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<!-- Page Header -->
	<h1 class="pageHeading">
	<?PHP
		if(isset($_GET['word']))
			echo $_GET['word'];
	?>
	</h1>

	<!-- Table -->
	<div class = "row">
		<div class = "large-8 large-centered columns">
			<table>
			  <thead>
			    <tr>
			      <th width="600">Song Title</th>
			      <th width="50">Frequncy</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Baby - Justin Bieber</td>
			      <td>30</td>

			    </tr>
			    <tr>
			      <td>Content Goes Here</td>
			      <td>Content Goes Here</td>
			    </tr>
			    <tr>
			      <td>Content Goes Here</td>
			      <td>Content Goes Here</td>
			    </tr>
			  </tbody>
			</table>
		</div>
	</div>
	<!-- Back Button -->
	<div class="row">
    	<div class="large-2 push-5 columns">  
			<button class = "round">Back</button>
		</div>
 	 </div>

	

	<!-- Scripts -->
	<script src="assets/libs/foundation/js/vendor/jquery.js"></script>
    <script src="assets/libs/foundation/js/foundation.min.js"></script>
    <script src="app/js/main.js"></script>
</body>
</html>