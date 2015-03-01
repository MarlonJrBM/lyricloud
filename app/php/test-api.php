<?php

require_once('app/php/api-handler.php');
require_once('app/php/app_controller.php');
// $albums = getAlbumsFromArtist('U2');
// $tracklist = getSongsFromAlbum($albums[0]);
// $lyrics = lyrics("http://genius.com/U2-even-better-than-the-real-thing-lyrics");


$artist = getArtistFromAPI("U2");
$cloud = new Cloud();
$app = new AppController();
$cloud->addArtist($artist);



// var_dump ($albums);

// echo '<br/><br/>';

// var_dump ($tracklist);

// echo '<br/><br/>';

// var_dump($lyrics);

?>

<html>
<head>

	<title>WORD CLOUD TEST</title>
	<link rel="stylesheet" href="app/css/style.css"/>


</head>


<body>

	<br/><br/>
	<?php

		echo $app->displayCloud($cloud);

	?>


</body>


</html>