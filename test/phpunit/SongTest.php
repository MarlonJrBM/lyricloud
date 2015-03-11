<?php

class SongTest extends PHPUnit_Framework_TestCase {
	protected $songLyrics;
	protected $song;

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

		$this->song = new Song("I don't trust myself with loving you", "John Mayer", $this->songLyrics);
	}

	public function testGetTitle() {
		// Correct title
		$this->assertEquals("I don't trust myself with loving you", $this->song->getTitle());

		// Incorrect title
		$this->assertNotEquals("Wrecking Ball", $this->song->getTitle());
	}

	public function testSetTitle() {
		// Set a new title
		$this->song->setTitle("Test Title");

		// Make sure song now has that title
		$this->assertEquals("Test Title", $this->song->getTitle());

		// Make sure song doesn't have old title
		$this->assertNotEquals("I don't trust myself with loving you", $this->song->getTitle());
	}

	public function testGetArtist() {
		// Correct artist
		$this->assertEquals("John Mayer", $this->song->getArtist());

		// Incorrect artist
		$this->assertNotEquals("Pink Floyd", $this->song->getArtist());
	}

	public function testSetArtist() {
		// Set new artist
		$this->song->setArtist("Test Artist");

		// Make sure new artist is correct
		$this->assertEquals("Test Artist", $this->song->getArtist());

		// Make sure old artist is incorrect
		$this->assertNotEquals("John Mayer", $this->song->getArtist());
	}

	public function testGetLyrics() {
		// Correct lyrics
		$this->assertEquals($this->songLyrics, $this->song->getLyrics());

		// Incorrect lyrics
		$this->assertNotEquals("", $this->song->getLyrics());
	}

	public function testSetLyrics() {
		// Set new lyrics
		$this->song->setLyrics("Test Lyrics");

		// Make sure song's lyrics equal new lyrics
		$this->assertEquals("Test Lyrics", $this->song->getLyrics());

		// Make sure old lyrics is incorrect
		$this->assertNotEquals($this->songLyrics, $this->song->getLyrics());
	}

	public function testHasWord() {
		// Word that should appear
		$a = "hold";
		$this->assertEquals(true, $this->song->hasWord($a));

		// Word that shouldn't appear
		$b = "cucumber";
		$this->assertEquals(false, $this->song->hasWord($b));

		// Empty string
		$c = "";
		$this->assertEquals(false, $this->song->hasWord($c));

		// Stop word
		$d = "me";
		$this->assertEquals(false, $this->song->hasWord($d));
	}

	public function testGetWordFreq() {
		// Word that should appear
		$a = "hold";
		$this->assertGreaterThan(0, $this->song->getWordFreq($a));

		// Word that shouldn't appear
		$b = "cucumber";
		$this->assertEquals(0, $this->song->getWordFreq($b));

		// Empty string
		$c = "";
		$this->assertEquals(0, $this->song->getWordFreq($c));

		// Stop word
		$d = "me";
		$this->assertEquals(0, $this->song->getWordFreq($d));
	}
}