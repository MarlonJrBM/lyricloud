<?php

require_once('app/php/app_controller.php');

if (!isset($_GET['word'])) {
	header("Location: /lyricloud");
}

AppController::retrieveCloudFromSession();

$songList = AppController::getSongList($_GET['word']);

$word = $_GET['word'];

// printr($songList);



?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Title -->
    <title>Lyricloud | Song List</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/libs/foundation/css/foundation.css"/>
	<link rel="stylesheet" href="assets/libs/font-awesome/css/font-awesome.min">
	<link rel="stylesheet" href="app/css/style.css">
	<!-- Scripts -->
    <script src="assets/libs/foundation/js/vendor/modernizr.js"></script>
</head>
<body>
	

	<!-- Page Header -->
	<h1 class="pageHeading">
	<?PHP
		echo ucfirst($_GET['word'])
	?>
	</h1>

	<!-- Table -->
	<div class = "row">
		<div class = "large-8 large-centered columns">
			<table>
			  <thead>
			    <tr>
			      <th width="600">Song Title</th>
			      <th width="50">Frequency</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach($songList as $songTitle => $freq) {
			  		$songSlug = createSlug($songTitle);
			  		echo "<tr><td><a href=\"lyrics.php?song={$songSlug}&word={$word}\">{$songTitle}<a></td><td>{$freq}</td></tr>";
			  	}

			  	?>

			  </tbody>
			</table>
		</div>
	</div>
	<!-- Back Button -->
	<div class="row">
    	<div class="large-2 large-centered columns">  
			<a href="index.php"><button class = "round">Back to Cloud</button></a>
		</div>
 	 </div>

	

	<!-- Scripts -->
	<script src="assets/libs/foundation/js/vendor/jquery.js"></script>
    <script src="assets/libs/foundation/js/foundation.min.js"></script>
    <script src="app/js/main.js"></script>
</body>
</html>