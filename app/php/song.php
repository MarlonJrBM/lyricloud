<?php

require_once('functions.php');

class Song {
	private $title;
	private $artist;
	private $lyrics;
	private $freqMap; // MAP: "WORD" (STRING) => FREQUENCY (INT)

	public function __construct($title, $artist, $lyrics) {
		//Review Constructor
		$this->title = $title;
		$this->artist = $artist;
		$this->lyrics = $lyrics;
		$this->updateFreqMap();
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	public function getArtist() {
		return $this->artist;
	}

	public function setArtist($newArtist) {
		$this->artist = $newArtist;
	}

	public function getLyrics() {
		return $this->lyrics;
	}

	public function setLyrics($newLyrics) {
		$this->lyrics = $newLyrics;
		$this->updateFreqMap();
	}

	public function getFreqMap() {
		return $this->freqMap;
	}

	public function getWordFreq($word) {
		return ($this->freqMap[$word]);
	}

	public function hasWord($word) {
		return (array_key_exists($word, $this->freqMap));
	}

	private function updateFreqMap() {
		if(!empty($this->lyrics)) {
			// Get all words
			$lyricsWordArr = array_values(str_word_count(strtolower($this->lyrics), 1));
			// Filter out stop words
			$lyricsWordArr = array_filter($lyricsWordArr, "filterStopwords");
			// Get word counts and update frequency map
			$this->freqMap = array_count_values($lyricsWordArr);
			// Sort by frequency
			uasort($this->freqMap, "compareFrequencies");
		}
	}
}

?>