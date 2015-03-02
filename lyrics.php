<?php

require_once('app/php/app_controller.php');

if (!isset($_GET['song'], $_GET['word'])) {
	header("Location: /lyricloud");
}

AppController::retrieveCloudFromSession();

$lyrics = AppController::getLyrics($_GET['song']);

// $Gotta modularize the next two lines into separate concern
$pattern = "/(" . $_GET['word'] .")([\s,.!?:;])/i";

$lyrics = preg_replace($pattern, '<span class="highlight">${1}</span>${2}', $lyrics);

// printr($songList);


?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Title -->
    <title>Lyricloud | Display Lyrics</title>
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
					if(isset($_GET['song']))
					echo AppController::getSongTitleBySlug($_GET['song']);
			?>
			
		</div>
	</h1>

	<!-- Lyric -->
	<div class="row" style="height:60%">
		<div class="panel" id="lyric"><?php echo $lyrics ?></div>
	</div>
	<!-- Back Button -->
	<div class="row">
    	<div class="large-2 columns">  
			<a href="song-list.php?word=<?php echo $_GET['word'] ?>"><button class = "round">Back to Song List</button></a>
		</div>
		<div class="large-2 columns">  
			<a href="index.php"><button class = "round">Back to Cloud</button></a>
		</div>
 	 </div>

	

	<!-- Scripts -->
	<script src="assets/libs/foundation/js/vendor/jquery.js"></script>
    <script src="assets/libs/foundation/js/foundation.min.js"></script>
    <script src="app/js/main.js"></script>
</body>
</html>