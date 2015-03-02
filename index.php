<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8" />
	<meta property="og:url" content="." /> 
	<meta property="og:title" content="LyriCloud" />
	<meta property="og:description" content="Generate your favorite artist's word cloud today!" /> 
	<meta id="fb-image" property="og:image" content="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-prn1/851565_496755187057665_544240989_n.jpg" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Title -->
	<title>Lyricloud | Welcome</title>
	<!-- CSS -->
	<link rel="stylesheet" href="assets/libs/foundation/css/foundation.css"/>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="app/css/style.css">
	<!-- Scripts -->
	<script src="assets/libs/foundation/js/vendor/jquery.js"></script>
	<script src="assets/libs/html2canvas/html2canvas.js"></script>
	<script src="assets/libs/foundation/js/foundation.min.js"></script>
	<script src="app/js/main.js"></script>

	<script>


	function generateCanvas() {
		var decodeImg;
		html2canvas(document.getElementById("wordCloud"), {
			onrendered: function(canvas) {
				canvasData = canvas.toDataURL();
				$("#fb-image").attr("content", canvas.toDataURL());
				encodeImg = canvasData.substring(canvasData.indexOf(',') +1, canvasData.length);

				$.ajax({
					url: 'https://api.imgur.com/3/image',
					headers: {
						'Authorization' : 'Client-ID 9c14998efb8f28e'
					},
					type: 'POST',
					data: {
						'image' : encodeImg,
						'type': 'base64'
					},
					success: function(response) {
						decodeImg = response.data.link;
						console.log(decodeImg);
					}, error: function() {
						alert("Error");
					}
				});


				FB.ui({
					method: 'feed',
					name: 'LyriCloud',
					picture: decodeImg,
					caption: "Come and Build your Word Cloud for your favorite artists!"
				});
			}
		});



	}


	</script>

	<script src="assets/libs/foundation/js/vendor/modernizr.js"></script>

	<script>
	
	</script>



	<?PHP
	include_once "app/php/app_controller.php";
	?>
</head>
<body>
	<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '56daa0b10aa238c',
			xfbml      : true,
			version    : 'v2.1'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>


	<!-- Page Header -->
	<h1 class="pageHeading">LyriCloud</h1>

	<!-- Word Cloud -->
	<div class="row">
		<div class="panel" id="wordCloud"
		<?PHP if(AppController::isCloudSetInSession()){ 
			echo 'style="visibility:visible"'; 
			?>  >
			
			<?PHP 
			AppController::retrieveCloudFromSession();
			echo AppController::displayCloud(); 
		}		
		?>  
	</div>
</div>

<!-- User interaction area -->
<div class="row">
	<!-- Artist Search Input -->
	<div class="large-4 large-centered columns">
		<form action="" id="artistForm">
			<label>Artist Name</label>
			<input type="text" id="artistInput" placeholder="Enter Artist Name"/>
		</form>
	</div>
	<!-- Buttons -->
	<div class="large-8 large-centered columns">
		<div class="row">
			<!-- Add to Cloud Button -->
			<?PHP if(AppController::isCloudSetInSession()){ 
				echo '<button class="small round large-4 columns"  id="addToCloudButton">Add To Cloud</button>'; }
				?> 
				<!-- Submit Button -->
				<!--<input class="small round button large-4 columns" type="button" id="submitButton" value="Submit"/-->
				<button class="small round large-4 columns"  id="submitButton">Submit</button>
				<!--Facebook Share Button-->
				<button onClick="generateCanvas()" class="small round large-4 columns" id="shareButton">Share <i class="fa fa-facebook-square"></i></button>
			</div>
		</div>
	</div>

	<!-- Scripts -->

</body>
</html>