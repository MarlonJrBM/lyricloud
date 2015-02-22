<?php

require_once('functions.php');

class Song {

	private $title;
	private $artist;
	private $lyrics;
	private $freq_map; // MAP: "WORD" (STRING) => FREQUENCY (INT)


	public function __construct($title, $artist, $lyrics) {
		//Review Constructor
		$this->title = $title;
		$this->artist = $artist;
		$this->lyrics = $lyrics;
		$this->update_freq_map();
	}



	public function get_title() {
		return $this->title;
	}

	public function set_title($title) {
		$this->title = $title;
	}

	public function get_artist() {
		return $this->artist;
	}

	public function set_artist($artist) {
		$this->artist = $artist;
	}

	public function get_lyrics() {
		return $this->lyrics;
	}

	public function set_lyrics() {
		$this->lyrics = $lyrics;
		$this->update_freq_map();
	}

	public function get_freq_map() {
		return $this->freq_map;
	}

	private function update_freq_map() {
		if (!empty($this->lyrics)) {
			$wordArr = str_word_count($this->lyrics, 1);
			$this->freq_map = generate_frequency_list($wordArr, TRUE);
		}
	}



}



//Below is test code, uncomment to "test" class

// 	$lyrics = <<< EOD
// 	No I'm not the man I used to be lately
// 	See you met me at an interesting time
// 	If my past is any sign of your future
// 	You should be warned before I let you inside

// 	Hold on to whatever you find baby
// 	Hold on to whatever will get you through
// 	Hold on to whatever you find baby
// 	I don't trust myself with loving you

// 	I will beg my way into your garden
// 	I will break my way out when it rains
// 	Just to get back to the place where I started
// 	So I can want you back all over again

// 	Hold on to whatever you find baby
// 	Hold on to whatever will get you through
// 	Hold on to whatever you find baby
// 	I don't trust myself with loving you

// 	Who do you love?
// 	Girl I see through, through your love
// 	Who do you love me or the thought of me? me or the thought of me?

// 	Hold on to whatever you find baby
// 	Hold on to whatever will get you through
// 	Hold on to whatever you find baby
// 	I don't trust myself with loving you

// 	Hold on to whatever you find baby
// 	Hold on to whatever gets you through through
// 	Hold on to whatever you find baby
// 	I don't trust myself with loving you
// 	I don't trust myself with loving you
// 	I don't trust myself with loving you
// 	I don't trust myself with loving you
// EOD;


// 	$lyrics2 = <<< EOD
// 	Gravity is working against me
// 	And gravity wants to bring me down
// 	Oh, I'll never know what makes this man
// 	With all the love that his heart can stand
// 	Dream of ways to throw it all away

// 	Oh, gravity is working against me
// 	And gravity wants to bring me down
// 	Oh, twice as much ain't twice as good
// 	And can't sustain like a one half could
// 	It's wanting more that's gonna send me to my knees

// 	Oh, gravity stay the hell away from me
// 	Oh, gravity has taken better men than me
// 	How can that be?

// 	Just keep me where the light is
// 	Just keep me where the light is
// 	Just keep me where the light is
// 	C'mon, keep me where the light is
// 	C'mon, keep me where the light is
// 	C'mon, keep me where, keep me where the light is

// EOD;

// 	$lyrics3 = <<< EOD
// 	In my eyes
// Indisposed
// In disguise
// As no one knows
// Hides the face
// Lies the snake
// In the sun
// In my disgrace
// Boiling heat
// Summer stench
// 'Neath the black
// The sky looks dead
// Call my name
// Through the dream
// And I'll hear you
// Scream again

// Black hole sun
// Won't you come
// And wash away the rain
// Black hole sun
// Won't you come
// Won't you come
// Won't you come

// Stuttering
// Cold and damp
// Steal the warm wind
// Tired friend
// Times are gone
// For honest men
// And sometimes far too long
// For snakes
// In my shoes
// Walking sleep
// And my youth
// I pray to keep
// Heaven send
// Hell away
// No one sings
// Like you
// Anymore

// Black hole sun
// Won't you come?
// And wash away the rain
// Black hole sun
// Won't you come?
// Won't you come?
// Won't you come?

// Black hole sun
// Won't you come?
// And wash away the rain
// Black hole sun
// Won't you come?
// Won't you come?
// Won't you come?
// Won't you come (black hole sun, black hole sun) (x4)

// Hang my head
// Drown my fear
// Till you all just
// Disappear

// Black hole sun
// Won't you come?
// And wash away the rain
// Black hole sun
// Won't you come?
// Won't you come?
// Won't you come?

// Black hole sun
// Won't you come?
// And wash away the rain
// Black hole sun
// Won't you come?
// Won't you come?
// Won't you come?

// Black hole sun
// Won't you come?
// And wash away the rain
// Black hole sun
// Won't you come?
// Won't you come?
// Won't you come? MAN!

// Won't you come? (Black hole sun, black hole sun)


// EOD;

// 	$trust_myself = new Song("I don't trust myself with loving you", "John Mayer", $lyrics);
// 	$gravity = new Song("Gravity", "John Mayer", $lyrics2);
// 	$black_hole_sun = new Song("Black Hole Sun", "SoundGarden", $lyrics3);







?>