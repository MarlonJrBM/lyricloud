<?php

require_once('app_controller.php');



$lyrics = <<< EOD
No I'm not the man I used to be lately
See you met me at an interesting time
If my past is any sign of your future
You should be warned before I let you inside

Hold on to whatever you find baby
Hold on to whatever will get you through
Hold on to whatever you find baby
I don't trust myself with loving you

I will beg my way into your garden
I will break my way out when it rains
Just to get back to the place where I started
So I can want you back all over again

Hold on to whatever you find baby
Hold on to whatever will get you through
Hold on to whatever you find baby
I don't trust myself with loving you

Who do you love?
Girl I see through, through your love
Who do you love me or the thought of me? me or the thought of me?

Hold on to whatever you find baby
Hold on to whatever will get you through
Hold on to whatever you find baby
I don't trust myself with loving you

Hold on to whatever you find baby
Hold on to whatever gets you through through
Hold on to whatever you find baby
I don't trust myself with loving you
I don't trust myself with loving you
I don't trust myself with loving you
I don't trust myself with loving you
EOD;


$lyrics2 = <<< EOD
Gravity is working against me
And gravity wants to bring me down
Oh, I'll never know what makes this man
With all the love that his heart can stand
Dream of ways to throw it all away

Oh, gravity is working against me
And gravity wants to bring me down
Oh, twice as much ain't twice as good
And can't sustain like a one half could
It's wanting more that's gonna send me to my knees

Oh, gravity stay the hell away from me
Oh, gravity has taken better men than me
How can that be?

Just keep me where the light is
Just keep me where the light is
Just keep me where the light is
C'mon, keep me where the light is
C'mon, keep me where the light is
C'mon, keep me where, keep me where the light is
EOD;

$lyrics3 = <<< EOD
In my eyes
Indisposed
In disguise
As no one knows
Hides the face
Lies the snake
In the sun
In my disgrace
Boiling heat
Summer stench
'Neath the black
The sky looks dead
Call my name
Through the dream
And I'll hear you
Scream again

Black hole sun
Won't you come
And wash away the rain
Black hole sun
Won't you come
Won't you come
Won't you come

Stuttering
Cold and damp
Steal the warm wind
Tired friend
Times are gone
For honest men
And sometimes far too long
For snakes
In my shoes
Walking sleep
And my youth
I pray to keep
Heaven send
Hell away
No one sings
Like you
Anymore

Black hole sun
Won't you come?
And wash away the rain
Black hole sun
Won't you come?
Won't you come?
Won't you come?

Black hole sun
Won't you come?
And wash away the rain
Black hole sun
Won't you come?
Won't you come?
Won't you come?
Won't you come (black hole sun, black hole sun) (x4)

Hang my head
Drown my fear
Till you all just
Disappear

Black hole sun
Won't you come?
And wash away the rain
Black hole sun
Won't you come?
Won't you come?
Won't you come?

Black hole sun
Won't you come?
And wash away the rain
Black hole sun
Won't you come?
Won't you come?
Won't you come?

Black hole sun
Won't you come?
And wash away the rain
Black hole sun
Won't you come?
Won't you come?
Won't you come? MAN!

Won't you come? (Black hole sun, black hole sun)
EOD;


?>





<html>
<head>
	<title>Please work...</title>
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body>

	<?php


// TESTING SONG CLASS
	echo "<h1>Testing Song Class</h1>";

	$trustMyself = new Song("I don't trust myself with loving you", "John Mayer", $lyrics);
	echo '<h3>Creating song: "I dont trust myself with loving you", by John Mayer</h3>';
	echo '<h4>Song Title:</h4>';
	printr($trustMyself->getTitle());
	echo '<h4>Song Artist:</h4>';
	printr($trustMyself->getArtist());
	echo '<h4>Song Frequency Map:</h4>';
	printr($trustMyself->getFreqMap());

	echo '<h3>Creating song: "Gravity", by John Mayer</h3>';
	$gravity = new Song("Gravity", "John Mayer", $lyrics2);
	echo '<h4>Song Title:</h4>';
	printr($gravity->getTitle());
	echo '<h4>Song Artist:</h4>';
	printr($gravity->getArtist());
	echo '<h4>Song Frequency Map:</h4>';
	printr($gravity->getFreqMap());

	echo '<h3>Creating song: "Black Hole Sun", by SoundGarden</h3>';
	$blackHoleSun = new Song("Black Hole Sun", "SoundGarden", $lyrics3);
	echo '<h4>Song Title:</h4>';
	printr($blackHoleSun->getTitle());
	echo '<h4>Song Artist:</h4>';
	printr($blackHoleSun->getArtist());
	echo '<h4>Song Frequency Map:</h4>';
	printr($blackHoleSun->getFreqMap());


// TESTING ARTIST CLASS
	echo "<h1>Testing Artist Class</h1>";

	echo '<h3>Creating artist: John Mayer</h3>';
	$mayer = new Artist('John Mayer');
	echo '<h3>Adding songs created above to artist</h3>';
	$mayer->addSong($trustMyself);
	$mayer->addSong($gravity);
	echo '<h4>Artist Name:</h4>';
	printr($mayer->getName());
	echo '<h4>Artist Frequency Map:</h4>';
	printr($mayer->getArtistFreqMap());

	echo '<h3>Creating artist: SoundGarden</h3>';
	$soundgarden = new Artist("SoundGarden");
	$soundgarden->addSong($blackHoleSun);
	echo '<h3>Adding songs created above to artist</h3>';
	echo '<h4>Artist Name:</h4>';
	printr($soundgarden->getName());
	echo '<h4>Artist Frequency Map:</h4>';
	printr($soundgarden->getArtistFreqMap());

// TESTING CLOUD CLASS
	echo '<h1>Testing Cloud Class</h1>';
	echo '<h3>Creating new Cloud and adding the two artists</h3>';
	$cloud = new Cloud();
	$cloud->addArtist($mayer);
	$cloud->addArtist($soundgarden);

	echo '<h4>Global Frequency Map:</h4>';
	printr($cloud->getGlobalFreqMap());





// TESTING CLOUD DISPLAY (from AppController class)

	echo '<h1>Testing Cloud Display (from AppController)</h1>';
	echo '<h3>Using AppController\'s displayWordCloud function</h3>';
	$appController = new AppController();
	$appController->setCloud($cloud);
	echo $appController->displayCloud($cloud);
	echo '<br/>';


// TESTING SONG LIST DISPLAY (from AppController class)
	echo '<h1>Testing SongList (from AppController)</h1>';
	echo '<h3>Using AppController\'s generateSongList function using "love" as parameter </h3>';
	printr($appController->generateSongList("love"));
	echo '<br/>';


//TESTING LYRICS DISPLAY (from AppController class)

	echo '<h1>Testing Lyrics Display (from AppController)</h1>';
	echo '<h3>Using AppController\'s displayLyrics function using "Black Hole Sun" as parameter </h3>';
	echo ($appController->displayLyrics("BlAcK HolE Sun"));
	echo '<br/>';

	?>

</body>
</html>