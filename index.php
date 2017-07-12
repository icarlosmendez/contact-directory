<?php

/*** ERROR REPORTING ***/
// set error reporting for development environment
// comment out once development/troubleshooting is complete
error_reporting(-1);
ini_set('display_errors', 1);


/*** AUTOLOAD ***/
// autoload any project dependencies
require __DIR__ . '/vendor/autoload.php';


/*** ENVIRONMENT VARIABLES ***/
// set the dotenv variable to the .env file path
$dotenv = new Dotenv\Dotenv(__DIR__);
// tell dotenv to load the .env file
$dotenv->load();
// // ensure that the required variables are available
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_PORT', 'DB_CHAR', 'DB_USER', 'DB_PASS']); 


/*** CONTROLLER ONBOARDING ***/
// Call on Action_Controller for routing users
include ("controllers/Action_Controller.php");

?>