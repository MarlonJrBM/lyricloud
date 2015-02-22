<?php

class Artist {

	private $name;
	private $songs;

	public function __construct($name="",$songs=array()) {
		$this->name = $name;
		$this->songs = $songs;
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
	}


}


?>


