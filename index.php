
<!doctype html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lyricloud | Welcome</title>
    <link rel="stylesheet" href="other/foundation/css/foundation.css" />
	<link rel="stylesheet" href="assets/css/style.css">
    <script src="other/foundation/js/vendor/modernizr.js"></script>
  </head>

<body>
<div id="fb-root"></div>
<!-- Facebook share, include Javascript SDK. For non-foundation share at least, havent gotten to work with foundation. -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
//Simple proof of concept function to toggle proper visibility
function myFunction() {
	var e = document.getElementById("lyricCloud");
	e.style.visibility = "visible";
    alert("The form was submitted");
}
</script>

<h1 class="pageHeading">Lyricloud</h1>

	<div class="row" style="height:60%">
		<div class="panel" style="height:100%; visibility:hidden" id="lyricCloud">
		</div>
	</div>
	<div class="row">
		<form action="" onSubmit="myFunction()">
			<div class="row">
				<div class="large-4 large-centered columns">
				    <label>Artist Name</label>
				    <input type="text" placeholder="Enter Artist Name" />
				</div>
				<div class="large-8 large-centered columns">
					<input class="small round button large-4 " type="submit" name="addToCloud" value="Add To Cloud" />
					<input class="small round button large-4 large-centered" type="submit" name="submit" value="Submit" />
					 <!--Facebook Share Button-->
					<input class="small round button large-3" type="submit" name="share" value="Share" /> 
	
				</div>
			</div> 
		</form>
	</div>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
<!--
<div class="pageContainer" style="margin-left:10%;margin-right:10%" >
	<div id="lyricCloud" >
			<?PHP
				//???
			?>
	</div>
	<div id="buttonContainer" style="width=50%" align="center">
		<form>
			<input style="width:35%;"  type="textfield" name="artistQuery" value="Input Artist Name"/>
			<table id="greyTable" border="0">
				<tr>
				<?PHP
					//????
				?>
					<td><input type="submit" name="addToCloud" value="Add To Cloud" class="applicationButton" /></td>
					<!-- Facebook share button
					<td><div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div></td> 
				
					<td><input type="submit" name="submit" value="Submit" class="applicationButton"/></td>
				</tr>
			</table>
		</form>
	</div>
</div>-->