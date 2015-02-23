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
	<h1 class="pageHeading">LyriCloud</h1>

	<!-- Word Cloud -->
	<div class="row" style="height:60%">
		<div class="panel" id="wordCloud"></div>
	</div>

	<!-- User interaction area -->
	<div class="row">
		<!-- Artist Search Input -->
		<div class="large-4 large-centered columns">
			<form action="" id="artistForm">
			    <label>Artist Name</label>
			    <input type="text" id="artistInput" placeholder="Enter Artist Name"/>
			</form>
		</div>
		<!-- Buttons -->
		<div class="large-8 large-centered columns">
			<div class="row">
				<!-- Add to Cloud Button -->
				<input class="small round button large-4 columns" type="button" id="addToCloudButton" value="Add To Cloud"/>
				<!-- Submit Button -->
				<input class="small round button large-4 columns" type="button" id="submitButton" value="Submit"/>
				<!--Facebook Share Button-->
				<button class="small round large-4 columns" id="shareButton">Share <i class="fa fa-facebook-square"></i></button>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="assets/libs/foundation/js/vendor/jquery.js"></script>
    <script src="assets/libs/foundation/js/foundation.min.js"></script>
    <script src="app/js/main.js"></script>
</body>
</html>