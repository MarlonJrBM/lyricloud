<?php

class ArtistTest extends PHPUnit_Framework_TestCase {
	protected $songLyrics;
	protected $song;
	protected $artist;

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
	}

	public function testGetName() {
		// Correct name
		$this->assertEquals("John Mayer", $this->artist->getName());

		// False name
		$this->assertNotEquals("Pink Floyd", $this->artist->getName());
	}

	public function testSetName() {
		// Set a new name
		$this->artist->setName("William Halfond");

		// Make sure it equals the new name
		$this->assertEquals("William Halfond", $this->artist->getName());

		// Make sure it doesn't equal the old name
		$this->assertNotEquals("John Mayer", $this->artist->getName());
	}

	public function testAddSong() {
		// Add a song
		$this->artist->addSong($this->song);

		// See if it now exists
		$this->assertEquals(TRUE, $this->artist->hasSong("I don't trust myself with loving you"));
	}

	public function testHasSong() {
		// Test when no songs in artist
		$this->assertEquals(FALSE, $this->artist->hasSong("I don't trust myself with loving you"));

		// Add a song
		$this->artist->addSong($this->song);

		// See if added song now exists
		$this->assertEquals(TRUE, $this->artist->hasSong("I don't trust myself with loving you"));
	}

	public function testGetNumSongs() {
		// Test when no songs in artist
		$this->assertEquals(0, $this->artist->getNumSongs());

		// Add a song
		$this->artist->addSong($this->song);

		// See if number of songs was incremented
		$this->assertGreaterThan(0, $this->artist->getNumSongs());
	}

	public function testGetSong() {
		// Test when no songs in artist
		$this->assertEquals(NULL, $this->artist->getSong("I don't trust myself with loving you"));

		// Add a song
		$this->artist->addSong($this->song);

		// Test that a song that shouldn't exist doesn't
		$this->assertNotEquals($this->song->getTitle(), createSlug("This song shouldn't exist"));

		// Test that a song that should exist does
		$this->assertEquals($this->song->getTitle(), $this->artist->getSong(createSlug("I don't trust myself with loving you"))->getTitle());
	}
}