#Main Page

Given(/^that I have not accessed LyriCloud before$/) do
  
end

When(/^I visit LyriCloud's homepage$/) do
visit ui_url('') 
end

Then(/^I should see "(.*?)"$/) do |item|
	expect(page).to have_content(item) 
end

Then(/^I should not see "(.*?)"$/) do |item|
	expect(page).to_not have_content(item) 
end

When /^I type "(.*?)"$/ do |typed_term|
	fill_in('filter', :with => typed_term)
end

When /^click on "(.*?)"$/ do |link|
	click_link link
end

Then(/^I should see the "(.*?)" title$/) do |arg1|
	expect(page).to have_content(arg1) 
end

Then(/^I should see the "(.*?)" button$/) do |arg1|
	expect(page).to have_content(arg1) 
end

Then(/^I should not see the "(.*?)" button$/) do |arg1|
	expect(page).to_not have_content(arg1)
end 

Given(/^that I'm in the homepage$/) do
visit ui_url('')
end

When(/^I hit the "(.*?)" button$/) do |arg1|
	find_button(arg1).click 
end

Then(/^I should see a Word Cloud$/) do
	sleep(45)
	expect(page).to have_selector("#cloudContent")
end

Then(/^I should not see a Word Cloud$/) do
	sleep(10)
	expect(page).to_not have_selector("#cloudContent")
end

When(/^I type "(.*?)" in the artist search bar$/) do |arg1|
	fill_in('artistInput', :with => arg1)
end


Given(/^that I have generated a Word Cloud$/) do
	steps %Q{
		Given that I'm in the homepage
		When I type "Bruno Mars" in the artist search bar
		And I hit the "Submit" button
	}
	sleep(45)
end

Then(/^I should see the Facebook Sharing Dialog$/) do
	expect(page.driver.browser.window_handles.size).to be(2)
end

Then(/^I should see a Word Cloud of two artists$/) do
	sleep(76)
	expect(page).to have_content("falling")
	expect(page).to have_content("girl")
end

Then(/^I should see an error message$/) do
  expect(page).to have_content("We could not find artist you were looking for. Sorry!")
end



# SONG LIST STEPS


When(/^I click on a word$/) do
  find(:xpath, "//*[@id=\"cloudContent\"]/a[1]").click
end

Then(/^I should be on the Song List Page$/) do
  expect(current_path).to eq('/lyricloud/song-list.php')
end

Then(/^I should see the word I clicked on$/) do
  expect(page).to have_content("Baby")
end

Then(/^I should see a list of songs and frequencies$/) do
  expect(page).to have_content("Marry You")
  expect(page).to have_content("11")
end

Given(/^that I am on the Song List Page$/) do
  steps %{
  	Given that I have generated a Word Cloud
  	And I click on a word
  }
end

Then(/^I should be on the Word Cloud Page$/) do
  expect(current_path).to eq('/lyricloud/index.php')
end



# LYRICS FEATURE

When(/^I click on a song$/) do
	click_link("Marry You")
end

Then(/^I should be on the Lyrics Page$/) do
  expect(current_path).to eq('/lyricloud/lyrics.php')
end

Then(/^I should see the song title$/) do
  expect(page).to have_content("Marry You")
end

Then(/^I should see the song lyrics$/) do
  expect(page).to have_content("It's a beautiful night We're looking for something dumb to do")
end

Then(/^I should see the selected word highlighted$/) do
  expect(page).to have_selector(".highlight")
end

Given(/^that I am on the Lyrics Page$/) do
    steps %{
  	Given that I have generated a Word Cloud
  	And I click on a word
  	And I click on a song
  }
end

