<?php

require_once('app_controller.php');
require_once ('api-handler.php');

//Just for testing 
// $artistName = "U2";
// $isNewCloud = TRUE;

$artistName = "2 Chainz";
$isNewCloud = TRUE;


if (!APIHandler::artist_exists($artistName)) {
	//gotta set header *?*
	echo "Artist doesn't exist on database!";
} else {

	if ($isNewCloud) {
		AppController::generateCloud();
	} else {
		AppController::retrieveCloudFromSession();
	}

	AppController::addArtistToCloud(APIHandler::getArtistFromAPI($artistName));


	//if script made it this far then life is good

	AppController::setCloudInSession();
	
}



?>

<html>
<head>

	<title>WORD CLOUD TEST</title>
	<link rel="stylesheet" href="../css/style.css"/>


</head>


<body>

	<br/><br/>
	<?php

	$cloud = AppController::getCloud();

	echo AppController::displayCloud();

	echo '<br/><br/>';

	echo '<h2>Number of Songs</h2>';

	echo $cloud->getNumSongs();

	echo '<br/><br/>';

	echo '<h2>Number of Words</h2>';

	echo $cloud->getNumWords();

	echo '<br/><br/>';

	echo lyrics("http://genius.com/Guns-n-roses-dead-horse-lyrics", FALSE);

	echo '<br/><br/>';

	$song = new Song("Dead Horse", "Guns N Roses", lyrics("http://genius.com/Guns-n-roses-dead-horse-lyrics", FALSE) );

	print_r($song);





	?>


</body>


</html>