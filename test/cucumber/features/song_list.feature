Feature: Accessing Song List Page


	Scenario: Viewing List of Songs 

		Given that I have generated a Word Cloud
		When I click on a word
		Then I should be on the Song List Page
		And I should see the word I clicked on
		And I should see a list of songs and frequencies 
		And I should see the "Back to Cloud" button


	Scenario: Returning to Cloud Page 

		Given that I am on the Song List Page
		When I hit the "Back to Cloud" button
		Then I should be on the Word Cloud Page
		And I should see a Word Cloud



