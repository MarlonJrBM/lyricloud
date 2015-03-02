<?php

require_once('app_controller.php');
require_once ('api-handler.php');


//Just for testing 
// $artistName = "U2";
// $isNewCloud = TRUE;

$artistName = $_POST['artistName'];



if (!APIHandler::artist_exists($artistName)) {
	//gotta set header *?*
	echo "Artist doesn't exist on database!";
} else {

	AppController::retrieveCloudFromSession();
	

	AppController::addArtistToCloud(APIHandler::getArtistFromAPI($artistName));



	//if script made it this far then life is good

	AppController::setCloudInSession();
	echo AppController::displayCloud();
}




?>