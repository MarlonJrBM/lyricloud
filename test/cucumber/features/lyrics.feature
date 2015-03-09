Feature: Accessing Lyrics Page

	Scenario: Viewing Lyrics of a Song

		Given that I am on the Song List Page
		When I click on a song
		Then I should be on the Lyrics Page
		And I should see the song title
		And I should see the song lyrics
		And I should see the selected word highlighted
		And I should see the "Back to Song List" button
		And I should see the "Back to Cloud" button


	Scenario: Returning to Song List Page

		Given that I am on the Lyrics Page
		When I hit the "Back to Song List" button
		Then I should be on the Song List Page
		And I should see a list of songs and frequencies


	Scenario: Returning to Cloud Page 

		Given that I am on the Lyrics Page
		When I hit the "Back to Cloud" button
		Then I should be on the Word Cloud Page
		And I should see a Word Cloud

