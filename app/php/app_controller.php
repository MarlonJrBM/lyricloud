<?php

require_once ('cloud.php');


define ('MAX_FONT_SIZE', 140);
define ('MIN_FONT_SIZE', 15);
define ('SONG_NOT_FOUND_ERROR', '<p class="error">An error ocurred. The song you entered does not exist.</p>');

error_reporting(0); #comment this line if you want to debug


class AppController {

	private static $cloud;

	public static function initializeApp() {
		//TODO
		
	}

	/*
	* Adds artist to cloud
	*
	* @param Artist artist object
	* @return void
	*/
	public static function addArtistToCloud($artist) {
		
		static::$cloud->addArtist($artist);		
	}

	public static function generateCloud() {
		static::$cloud = new Cloud();
	}

	public static function setCloud($cloud) {
		static::$cloud = $cloud;
	}


	/*  WordCloud's HTML Code.
	Takes as parameter Cloud object */
	public static function displayCloud() {
		
		$cloudHTML = "<div id =\"cloudContent\" class=\"cloud\">";

		$cloud = static::$cloud; //Yes I'm very lazy

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
				$cloudHTML .= "<a href=\"song-list.php?word={$word}\"><span style=\"font-size: {$fontSize}px; color: $color;\">$word</span></a> ";
			}

		}

		$cloudHTML .= "</div>";

		return $cloudHTML;
	}

	public static function getCloud() {

		return self::$cloud;

	}


	/*  Given $word, will return a $songList dictionary which maps song_title to $word_frequency in that song  */

	public static function getSongList($word) {

		$songList = array(); //MAP: SONG_TITLE (STRING) => WORD_FREQUENCY (INT)



		//will iterate through every song of each artist looking for word. If it exists, will push to $songList array
		foreach (static::$cloud->getArtists() as $artist) {
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

	public static function getSongTitleBySlug($song_slug) {
		foreach (self::$cloud->getArtists() as $artist) {
			$song = $artist->getSong($song_slug);
			if ($song != NULL) {
				return $song->getTitle();			
			}

		}

		return $song_slug; //Something went wrong 
	}

	/* Given $song_title, will return the lyrics for that song    */

	public static function getLyrics($song_title) {
		
		//iterates through cloud's artists looking for song
		foreach (static::$cloud->getArtists() as $artist) {
			$song = $artist->getSong($song_title);
			if ($song != NULL) {
		    //if artist has that song, return its lyrics
				return $song->getLyrics();
			}
		}

		return SONG_NOT_FOUND_ERROR;

	}

	public static function isCloudSetInSession() {
		if (!isset($_SESSION)) {
			session_start();
		}
		return isset($_SESSION['cloud']);
	}

	public static function retrieveCloudFromSession() {
		if (!isset($_SESSION)) {
			session_start();
		}

		static::$cloud = $_SESSION['cloud'];
	}

	public static function setCloudInSession() {
		if (!isset($_SESSION)) {
			session_start();
		}
		$_SESSION['cloud'] = static::$cloud;

	}

}

?>