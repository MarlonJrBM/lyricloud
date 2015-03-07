Given(/^that I have not accessed LyriCloud before$/) do
   # express the regexp above with the code you wish you had
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
