<?php
session_start();

// Includes for Controllers:
require_once("controller_contacts.php");
require_once("controller_users.php");
require_once("controller_auth.php");

// Includes for Models:
require_once("models/contacts.php");
require_once("models/users.php");
require_once("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$users = new Users();
$contacts = new Contacts();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

	// *********** DIRECTORY *********************
    // Directory is from the Nav Bar in header_session.php or from profile
    // run the function getContacts, pass result into $data
    // pass $data into the view directory.php
    if ($_GET["action"]=="directory"){
        $data1 = $users->getUser($_SESSION["userId"]);
        $data2 = $contacts->getContacts();
        // var_dump($data2);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SIGNOUT *************
    else if ($_GET["action"]=="signout"){
        session_destroy();
        header("Location: index.php");
    }

    } else {

	// ************ DEFAULT VIEW is Splash page ********************
	$views->getViews("views/head.php");
	$views->getViews("views/header.php");
	$views->getViews("views/splash.php");
	$views->getViews("views/footer.php");

} // closes if(!empty($_GET['action']...

?>