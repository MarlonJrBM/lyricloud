<?php

require_once('functions.php');

class Song {

	private $title;
	private $artist;
	private $lyrics;
	private $freq_map; // MAP: "WORD" (STRING) => FREQUENCY (INT)


	public function __construct($title, $artist, $lyrics) {
		$this->title = $title;
		$this->artist = $artist;
		$this->lyrics = $lyrics;
		$this->set_freq_map();
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
		$this->set_freq_map();
	}

	public function get_freq_map() {
		return $this->get_freq_map;
	}

	private function set_freq_map() {
		$this->freq_map = generate_frequency_list($this->lyrics);
	}




}








?>