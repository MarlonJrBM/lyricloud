Feature: Accessing WordCloud's Page

	Scenario: Accessing Page for the first time

		Given that I have not accessed LyriCloud before
		When I visit LyriCloud's homepage
		Then I should see the "LyriCloud" title
		And I should see the "Submit" button
		And I should see the "Artist Name" button
		And I should not see the "Add Artist" button
		And I should not see the "Share" button


	Scenario: Generating Word Cloud

		Given that I'm in the homepage
		When I type "Bruno Mars" in the artist search bar
		And I hit the "Submit" button
		Then I should see a Word Cloud
		And I should see the "Add To Cloud" button 
		And I should see the "Share" button
		
	@facebook
	Scenario: Sharing Cloud on Facebook 

		Given that I have generated a Word Cloud
		When I hit the "Share" button
		Then I should see the Facebook Sharing Dialog

	@newartist
	Scenario: Adding Artist to Cloud

		Given that I have generated a Word Cloud
		When I type "The Strokes" in the artist search bar
		And I hit the "Add To Cloud" button
		Then I should see a Word Cloud of two artists



  
