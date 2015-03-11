$(document).foundation();

// Initially hide word cloud div
$(document).ready(function() {

	
	$( "#artistInput" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url: "http://developer.echonest.com/api/v4/artist/suggest",
				dataType: "json",
				data: {
					api_key: "DG6T6KE6T6KSTR3S8",
					q: request.term
				},
				success: function( data ) {
					// console.log(data.response.artists);
					artistArr = [];
					for (ii=0;ii<data.response.artists.length;ii++) {
						artistArr.push(data.response.artists[ii].name);
					}
					// console.log(artistArr)
					response( artistArr );

				}
			});
		},
		minLength: 3
	});



	$('#addToCloudButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	// Get artist input
	var artistInput = $('#artistInput').val();
	console.log('add to cloud', artistInput);

	// Show word cloud

	if (artistInput.trim()) {
		$('#wordCloud').css('background-color', 'white').show();
		addToCloud();
	}
});

	$('#submitButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	// Get artist input
	var artistInput = $('#artistInput').val();
	console.log('submit', artistInput);

	// Show word cloud

	if (artistInput.trim()) {
		$('#wordCloud').show();
		genCloud();
		

	}

	
});

	$('#shareButton').click(function(event) {
	// Prevent form submission
	event.preventDefault();

	console.log('share to facebook');
});



});





//AJAX functions

function genCloud(){
	var xmlHTTP;
	xmlHTTP = new XMLHttpRequest(); 

	var inputBox = document.getElementById("artistInput");
	var artistName = inputBox.value;

	xmlHTTP.onreadystatechange=function(){
		if (xmlHTTP.readyState==4 && xmlHTTP.status==200){
			document.getElementById("wordCloud").innerHTML=xmlHTTP.responseText;
			document.getElementById("addToCloudButton").style.visibility = "visible";
			document.getElementById("shareButton").style.visibility = "visible";

		}
	}

	var postString = "artistName=";
	postString = postString.concat(artistName);

	xmlHTTP.open("POST","app/php/cloud-generator.php",true);
	xmlHTTP.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHTTP.send(postString);
	
	

	document.getElementById("wordCloud").innerHTML="<div id='waitPicDiv'><span class='picHelper'></span><img class='waitPic' src='http://i.stack.imgur.com/FhHRx.gif' alt='Waiting Gif' /></div>";
}

function addToCloud(){
	var xmlHTTP;
	xmlHTTP = new XMLHttpRequest(); 

	var inputBox = document.getElementById("artistInput");
	var artistName = inputBox.value;

	xmlHTTP.onreadystatechange=function(){
		if (xmlHTTP.readyState==4 && xmlHTTP.status==200){
			document.getElementById("wordCloud").innerHTML=xmlHTTP.responseText;
		}
	}

	var postString = "artistName=";
	postString = postString.concat(artistName);

	xmlHTTP.open("POST","app/php/update_cloud.php",true);
	xmlHTTP.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHTTP.send(postString);

	document.getElementById("wordCloud").innerHTML="<div id='waitPicDiv'><span class='picHelper'></span><img class='waitPic' src='http://i.stack.imgur.com/FhHRx.gif' alt='Waiting Gif' /></div>";
}
