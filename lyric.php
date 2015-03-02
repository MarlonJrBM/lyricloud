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
	

	<!-- Page Header -->
	<div class = "row">
		<div class = "small-2 large-2 columns"></div>
			<h2 class="pageHeading"/>
			<?PHP
					if(isset($_GET['title']))
					echo $_GET['title'];
			?>
			
		</div>
	</h1>

	<!-- Lyric -->
	<div class="row" style="height:60%">
		<div class="panel" id="lyric"></div>
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