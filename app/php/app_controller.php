<?php

require_once ('cloud.php');

define ('MAX_FONT_SIZE', 100);
define ('MIN_FONT_SIZE', 10);


class AppController {

	function initializeApp() {
		//TODO
	}

	function addArtistToCloud($string) {
		
	}


	/* Returns WordCloud's HTML Code.
	Takes as parameter Cloud object */
	function generateWordCloud($cloud) {
		
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

	function generateSongList() {
		//TODO
	}

	function generateLyrics() {
		//TODO
	}

}

?>