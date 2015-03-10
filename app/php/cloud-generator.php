<?php

require_once('app_controller.php');
require_once ('api-handler.php');


//Just for testing 
// $artistName = "U2";
// $isNewCloud = TRUE;

$artistName = $_POST['artistName'];



if (!APIHandler::artist_exists($artistName)) {
	//gotta set header *?*
	echo "<div data-alert class=\"alert-box alert round\">
  We could not find artist you were looking for. Sorry!
  <a href=\"#\" class=\"close\">&times;</a>
</div>";
} else {

	AppController::generateCloud();


	AppController::addArtistToCloud(APIHandler::getArtistFromAPI($artistName));



	//if script made it this far then life is good

	AppController::setCloudInSession();
	echo AppController::displayCloud();
}




?>