<?php

class FunctionsTest extends PHPUnit_Framework_TestCase {
	protected $songLyrics;

	protected function setUp() {
		$this->songLyrics =
			"No I'm not the man I used to be lately
			See you met me at an interesting time
			If my past is any sign of your future
			You should be warned before I let you inside

			Hold on to whatever you find baby
			Hold on to whatever will get you through
			Hold on to whatever you find baby
			I don't trust myself with loving you

			I will beg my way into your garden
			I will break my way out when it rains
			Just to get back to the place where I started
			So I can want you back all over again

			Hold on to whatever you find baby
			Hold on to whatever will get you through
			Hold on to whatever you find baby
			I don't trust myself with loving you

			Who do you love?
			Girl I see through, through your love
			Who do you love me or the thought of me? me or the thought of me?

			Hold on to whatever you find baby
			Hold on to whatever will get you through
			Hold on to whatever you find baby
			I don't trust myself with loving you

			Hold on to whatever you find baby
			Hold on to whatever gets you through through
			Hold on to whatever you find baby
			I don't trust myself with loving you
			I don't trust myself with loving you
			I don't trust myself with loving you
			I don't trust myself with loving you";
	}

	public function testfilterStopwords() {
		// Get all words
		$lyricsWordArr = array_values(str_word_count(strtolower($this->songLyrics), 1));

		// Make sure there is a stop word
		$stopword = "you";
		$this->assertEquals(true, in_array($stopword, $lyricsWordArr));

		// Filter out stop words
		$lyricsWordArr = array_filter($lyricsWordArr, "filterStopwords");

		// Make sure stop word was removed
		$this->assertEquals(false, in_array($stopword, $lyricsWordArr));
	}

	public function testCreateSlug() {
		// Test string
		$testString = "Guns N' Roses";

		// Create the slug
		$testStringSlug = createSlug($testString);

		// Make sure the slug was created correctly
		$this->assertEquals("guns-n-roses", $testStringSlug);

		// Make sure slug doesn't equal the inputted string
		$this->assertNotEquals($testString, $testStringSlug);
	}

	public function testCompareFrequencies() {
		$freq0 = 0;
		$freq1 = 10;
		$freq2 = 20;

		// Case when frequencies are same
		$this->assertEquals(0, compareFrequencies($freq1, $freq1));
		$this->assertNotEquals(1, compareFrequencies($freq1, $freq1));
		$this->assertNotEquals(-1, compareFrequencies($freq1, $freq1));

		// Case with 0 and positive frequency
		$this->assertEquals(1, compareFrequencies($freq0, $freq1));
		$this->assertEquals(-1, compareFrequencies($freq1, $freq0));
		$this->assertNotEquals(0, compareFrequencies($freq0, $freq1));
		$this->assertNotEquals(0, compareFrequencies($freq1, $freq0));

		// Case with two positive frequencies
		$this->assertEquals(1, compareFrequencies($freq1, $freq2));
		$this->assertEquals(-1, compareFrequencies($freq2, $freq1));
		$this->assertNotEquals(0, compareFrequencies($freq1, $freq2));
		$this->assertNotEquals(0, compareFrequencies($freq2, $freq1));
	}
}