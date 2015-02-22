<?php

require_once 'song.php';

class Artist {

	private $name;
	private $songs;
	private $global_freq_map; //frequency map for all artist's songs

	public function __construct($name="") {
		//Review constructor
		$this->name = $name;
		$this->songs = array();
		$this->global_freq_map = array();
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name($name) {
		$this->name = $name;
	}

	public function get_songs() {
		return $this->songs;
	}

	public function set_songs($songs) {
		$this->songs = $songs;
		$this->global_freq_map = array();
		foreach($songs as $song) {
			$this->update_global_freq_map($song->get_freq_map());
		}
	}

	public function add_song($song) {
		$this->songs[] = $song; //PHP way to push value to an array
		$this->update_global_freq_map($song->get_freq_map());
	}

	public function get_global_freq_map() {
		return $this->global_freq_map;
	}

	private function update_global_freq_map($new_freq_map) {
		$this->global_freq_map = merge_frequency_lists($this->global_freq_map, $new_freq_map);

	}


}

//Below is test code, uncomment to "test" class


	// $mayer = new Artist('John Mayer');
	// $mayer->add_song($trust_myself);
	// $mayer->add_song($gravity);
	// $soundgarden = new Artist("SoundGarden");
	// $soundgarden->add_song($black_hole_sun);



?>


