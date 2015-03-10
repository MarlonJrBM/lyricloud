<?php

class CloudTest extends PHPUnit_Framework_TestCase {
	protected $songLyrics;
	protected $song;
	protected $artist;
	protected $cloud;

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

		$this->artist = new Artist("John Mayer");
		$this->artist->addSong($this->song);

		$this->cloud = new Cloud();
	}

	public function testGetNumWords() {
		// Test when no artists in cloud
		$this->assertEquals(0, $this->cloud->getNumWords());

		// Add artist and see if number of words is updated
		$this->cloud->addArtist($this->artist);
		$this->assertGreaterThan(0, $this->cloud->getNumWords());
	}

	public function testGetNumArtists() {
		// Test when no artists in cloud
		$this->assertEquals(0, $this->cloud->getNumArtists());

		// Add artist and see if number of words is updated
		$this->cloud->addArtist($this->artist);
		$this->assertGreaterThan(0, $this->cloud->getNumArtists());
	}

	public function testGetNumSongs() {
		// Test when no artists in cloud
		$this->assertEquals(0, $this->cloud->getNumSongs());

		// Add artist and see if number of words is updated
		$this->cloud->addArtist($this->artist);
		$this->assertGreaterThan(0, $this->cloud->getNumSongs());
	}
}