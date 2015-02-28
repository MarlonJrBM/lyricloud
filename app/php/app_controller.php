<?php

require_once ('cloud.php');

define ('MAX_FONT_SIZE', 100);
define ('MIN_FONT_SIZE', 10);
define ('SONG_NOT_FOUND_ERROR', '<p class="error">An error ocurred. The song you entered does not exist.</p>');


class AppController {

	private $cloud;

	function initializeApp() {
		//TODO
		session_start();
	}

	function addArtistToCloud($string) {
		//TODO
		
	}

	function generateCloud() {
		$cloud = new Cloud();
	}

	function setCloud($cloud) {
		$this->cloud = $cloud;
	}


	/* Returns WordCloud's HTML Code.
	Takes as parameter Cloud object */
	function displayCloud($cloud) {
		
		$cloudHTML = "<div class=\"cloud\">";		

		/* Initialize variables for normalization algorithm */
		$tMin = min($cloud->getGlobalFreqMap()); /*  lower-bound for word frequency */
		$tMax = max($cloud->getGlobalFreqMap()); /* upper-bound for word frequency */

		foreach ($cloud->getGlobalFreqMap() as $word => $freq) {
			if ($freq == $tMin) {

				$fontSize = 0;

			} else {

				$fontSize = floor(  ( MAX_FONT_SIZE * ($freq - $tMin) ) / ( $tMax - $tMin )  );

				/* Define a color index based on the frequency of the word */
				$r = $g = 0; $b = floor( 255 * ($freq / $tMax) );
				$color = '#' . sprintf('%02s', dechex($r)) . sprintf('%02s', dechex($g)) . sprintf('%02s', dechex($b));

			}


			if ($fontSize >= MIN_FONT_SIZE) {
				$cloudHTML .= "<a href=\"word-list.php?word={$word}\"><span style=\"font-size: {$fontSize}px; color: $color;\">$word</span></a> ";
			}

		}

		$cloudHTML .= "</div>";

		return $cloudHTML;
	}


	/*  Given $word, will return a $songList dictionary which maps song)title to $word_frequency in that song  */

	function generateSongList($word) {

		$songList = array(); //MAP: SONG_TITLE (STRING) => WORD_FREQUENCY (INT)


		//will iterate through every song of each artist looking for word. If it exists, will push to $songList array
		foreach ($this->cloud->getArtists() as $artist) {
			foreach ($artist->getSongs() as $song) {
				if ($song->hasWord($word)) {
					$songList[$song->getTitle()] = $song->getWordFreq($word);
				}
			}
		}

		// Sort by frequency
		uasort($songList, "compareFrequencies");

		return $songList;

	}

	/* Given $song_title, will return the lyrics for that song    */

	function displayLyrics($song_title) {
		
		//iterates through cloud's artists looking for song
		foreach ($this->cloud->getArtists() as $artist) {
			$song = $artist->getSong($song_title);
			if ($song != NULL) {
		    //if artist has that song, return its lyrics
				return $song->getLyrics();
			}
		}

		return SONG_NOT_FOUND_ERROR;

	}

	function isSessionSet() {
		return isset($_SESSION['cloud']);
	}

	function retrieveCloudFromSession() {
		$this->cloud = $_SESSION['cloud'];
	}

}

?>