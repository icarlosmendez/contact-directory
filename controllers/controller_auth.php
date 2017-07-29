<?php
// session_start();

// Includes for Controller:
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
	
	// *********** SIGN IN VERIFICATION *********************
    // After an existing user hits submit to login
    // username & password will be passed via POST to the verifyContact method
    // The POST values will be compared to what's stored in the database
    // A boolean of TRUE or FALSE, 1 or 0 will be returned:
    // If login is successful, they will be redirected to their profile page
    // Otherwise, they will be redirected to an error page
    if ($_GET["action"]=="signinAction"){
        $loggedIn = $users->verifyUser($_POST["username"], $_POST["password"]);

        if($loggedIn){
            // session_start();

            // if true set the following session variables
            $_SESSION['userid'] = $loggedIn[0]['userid'];
            $_SESSION['loggedin'] = true;

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = md5($_POST['password']);


            header("location:?action=directory");
        }

        else {
            // if false set the following session variables
            $_SESSION['userid']=0;
            $_SESSION['loggedin'] = false;

            // show the login error message
            $views->getViews("views/head.php");
            $views->getViews("views/header.php");
            $views->getViews("views/loginError.php");
            $views->getViews("views/footer.php");
        }

    }

}

?>