<?php

require_once('app_controller.php');
require_once ('api-handler.php');

//Just for testing 
// $artistName = "U2";
// $isNewCloud = TRUE;

// $artistName = "U2";
// $isNewCloud = FALSE;


// if (!APIHandler::artist_exists($artistName)) {
// 	//gotta set header *?*
// 	echo "Artist doesn't exist on database!";
// } else {

// 	if ($isNewCloud) {
// 		AppController::generateCloud();
// 	} else {
// 		AppController::retrieveCloudFromSession();
// 	}

// 	AppController::addArtistToCloud(APIHandler::getArtistFromAPI($artistName));


// 	//if script made it this far then life is good

// 	AppController::setCloudInSession();

// }



?>

<html>
<head>

	<title>WORD CLOUD TEST</title>
	<link rel="stylesheet" href="../css/style.css"/>


</head>


<body>

	<br/><br/>
	<?php

	// $cloud = AppController::getCloud();

	// echo AppController::displayCloud();

	// echo '<br/><br/>';

	// echo '<h2>Number of Songs</h2>';

	// echo $cloud->getNumSongs();

	// echo '<br/><br/>';

	// echo '<h2>Number of Words</h2>';

	// echo $cloud->getNumWords();

	// echo '<br/><br/>';

	// echo '<h2>Number of Artists</h2>';

	// echo $cloud->getNumArtists();

	// echo '<br/><br/>';

	// echo lyrics("http://genius.com/Guns-n-roses-dead-horse-lyrics", FALSE);

	// echo '<br/><br/>';

	// $song = new Song("Dead Horse", "Guns N Roses", lyrics("http://genius.com/Guns-n-roses-dead-horse-lyrics", FALSE) );

	// print_r($song);

	$apikey = 'e611efac1fccb7c1c6d92c05955b8c29';

	$musix = new MusicXMatch($apikey);

	$result = '';
	try{
		$musix->add_param('q_artist', 'U2');
		$result = $musix->execute_request('artist.search');
	}
	catch (Exception $e)
	{
		printr($e);
	}

	try{
		$musix->reset_params();
		$musix->add_param('artist_id', '121');
		$result = $musix->execute_request('artist.albums.get');
	}
	catch (Exception $e)
	{
		printr($e);
	}

	try{
		$musix->reset_params();
		$musix->add_param('album_id', '14243476');
		$result = $musix->execute_request('album.tracks.get');
	}
	catch (Exception $e)
	{
		printr($e);
	}

	

	try{
		$musix->reset_params();
		$musix->add_param('track_id', '18154383');
		$result = $musix->execute_request('track.lyrics.get');
	}
	catch (Exception $e)
	{
		printr($e);
	}

	

	var_dump($result);
	printr($result);



	?>


</body>


</html>