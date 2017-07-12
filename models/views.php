<?php

// Create "Views" Class (aka object)

class Views{

	// Create a public method call "getViews"
	// Function / Method Parameters:
	// Pass the file name and data recieved from Controller
	public function getViews($filename="", $results=array()){

		// include the filename being requested by Controller
		include $filename;

		// $results is the name PUBLICLY to access the array passed into getViews
		//var_dump($results);

	}

}

?>