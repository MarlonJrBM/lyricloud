<?php

require_once 'artist.php';

define ('MAX_NUMBER_WORDS', 250);
//TODO - create logic to limit number of words to 250

class Cloud {

	private $artists; //array of artists
	private $global_freq_map; //frequency map for all artists

	public function __construct() {
		//Review Constructor
		$artists = array();
		$global_freq_map = array();

	}

	public function add_artist($artist) {
		$this->artists[] = $artist; //PHP way to push value to an array
		$this->update_global_freq_map($artist->get_global_freq_map());

	}

	public function get_artists() {
		return $this->artists;
	}

	public function get_global_freq_map() {
		return $this->global_freq_map;
	}

	private function update_global_freq_map($new_freq_map) {
		$this->global_freq_map = merge_frequency_lists($this->global_freq_map, $new_freq_map);

	}

}


//Below is test code, uncomment to "test" class


// $cloud = new Cloud();
// $cloud->add_artist($mayer);
// $cloud->add_artist($soundgarden);
// var_dump($cloud);





?>