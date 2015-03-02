<?php

require_once 'song.php';

class Artist {
	private $name;
	private $songs;
	private $artistFreqMap; //frequency map for all artist's songs

	public function __construct($name = "") {
		//Review constructor
		$this->name = $name;
		$this->songs = array();
		$this->artistFreqMap = array();
	}

	public function getName() {
		return $this->name;
	}

	public function setName($newName) {
		$this->name = $newName;
	}

	public function getSongs() {
		return $this->songs;
	}

	public function getSong($song_title) {
		foreach ($this->songs as $song) {
			if (createSlug(strtolower($song->getTitle())) == strtolower($song_title)) {
				//workaround to fix the fact that the song object has no ID
				return $song;
			}
		}

		return NULL; //song doesn't exist
	}

	public function getNumSongs() {
		return count($this->songs);
	}

	public function hasSong($song_title) {
		foreach ($this->songs as $song) {
			if (strtolower($song->getTitle()) == strtolower($song_title)) {
				return TRUE;
			}
		}

		return FALSE;		
	}

	public function setSongs($newSongs) {
		$this->songs = $newSongs;
		$this->artistFreqMap = array();
		foreach($newSongs as $newSong) {
			$this->updateArtistFreqMap($newSong->getFreqMap());
		}
	}

	public function addSong($newSong) {
		// $this->songs[] = $song; //PHP way to push value to an array
		array_push($this->songs, $newSong);
		$this->updateArtistFreqMap($newSong->getFreqMap());
	}


	public function getArtistFreqMap() {
		return $this->artistFreqMap;
	}

	private function updateArtistFreqMap($newFreqMap) {
		$this->artistFreqMap = mergeFrequencyLists($this->artistFreqMap, $newFreqMap);
	}
}

?>