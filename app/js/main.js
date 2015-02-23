$(document).foundation();

// Initially hide word cloud div
$(document).ready(function() {
	$('#wordCloud').hide();
});

$('#artistForm').submit(function(event) {
	// Prevent form submission
	event.preventDefault();

	// Get artist input
	var artistInput = $('#artistInput').val();
	console.log('form submitted', artistInput);
});

$('#addToCloudButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	// Get artist input
	var artistInput = $('#artistInput').val();
	console.log('add to cloud', artistInput);

	// Show word cloud
	$('#wordCloud').css('background-color', 'white').show();
});

$('#submitButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	// Get artist input
	var artistInput = $('#artistInput').val();
	console.log('submit', artistInput);

	// Show word cloud
	$('#wordCloud').css('background-color', 'white').show();
});

$('#shareButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	console.log('share to facebook');
});