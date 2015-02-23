<?php

require_once 'artist.php';

define('MAX_NUMBER_WORDS', 250);
//TODO - create logic to limit number of words to 250

class Cloud {
	private $artists; //array of artists
	private $globalFreqMap; //frequency map for all artists

	public function __construct() {
		//Review Constructor
		$this->artists = array();
		$this->globalFreqMap = array();
	}

	public function addArtist($newArtist) {
		// $this->artists[] = $newArtist; //PHP way to push value to an array
		array_push($this->artists, $newArtist);
		$this->updateGlobalFreqMap($newArtist->getArtistFreqMap());
	}

	public function getArtists() {
		return $this->artists;
	}

	public function getGlobalFreqMap() {
		return $this->globalFreqMap;
	}

	private function updateGlobalFreqMap($newFreqMap) {
		$this->globalFreqMap = mergeFrequencyLists($this->globalFreqMap, $newFreqMap);
	}
}

?>