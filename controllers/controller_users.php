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
	
	// *********** SIGN UP FORM *********************
    // If the user decides to signup (from links on splash bar or nav)
    // they will be redirected to the Signup Form.
    if($_GET["action"]=="signup"){
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/form_signup.php");
        $views->getViews("views/footer.php");
    }

    // *********** SIGN UP A NEW USER *********************
    // When the user hits "submit" from the Signup Form,
    // the addContact function is run.
    // pass in contFName, contLName, contCell, contLand, contEmail, username, password
    // addContact will salt & hash password and add user to database
    // addContact returns all info associated with account, stored into $data
    // The user will be redirected to the Success Sign Up page with $data
    else if($_GET["action"]=="newUserAction"){
        $users->addUser(
                    $_POST["userFName"],
                    $_POST["userLName"],
                    $_POST["userPhone"],
                    $_POST["userEmail"],
                    $_POST["userTitle"],
                    $_POST["username"],
                    $_POST["password"]
                );
        header("location:?action=successSignUp");
    }

    // *********** SIGN UP SUCCESS *********************
    // The user will be redirected to a success page after their account is added
    // The success page will confirm their registration details
    // getContact will run to pull the information from the database and store as $data
    // the information will then be passed into successSignUp.php
    else if ($_GET["action"]=="successSignUp"){
        $data = $users->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data);
        $views->getViews("views/successSignUp.php",$data);
        $views->getViews("views/footer.php");
    }

    // *********** SIGN IN *********************
    // If a user has a previously created account
    // They can choose to login and will be redirected to the signin Form
    else if ($_GET["action"]=="signin"){
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/form_signin.php");
        $views->getViews("views/footer.php");
    }

    // *********** VIEW PROFILE FOR USER (OWN)  *********************
    // User profile is accessed from the Nav Bar in header_session.php or from success page
    // run the function getUser, pass in session var contId
    // pass $data into the view profile.php
    else if ($_GET["action"]=="viewProfileUser"){
        $data = $users->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php", $data);
        $views->getViews("views/profile_user.php", $data);
        $views->getViews("views/footer.php");
    }

    // *********** UPDATE USER *********************
    else if ($_GET["action"]=="updateUser"){
        // run function getUser by using the userid, pass results into $data
        // pass $data into the view update_form.php
        $data = $users->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data);
        $views->getViews("views/form_update_user.php",$data);
        $views->getViews("views/footer.php");
    }

    // *********** EDIT USER ACTION *********************
    else if ($_GET["action"]=="editUserAction"){
        // editAction is from update_form.php
        // run function updateContact, pass in the contactName & contactId
        // redirect to the contactList
        $users->updateUser(
                    $_SESSION["userId"], 
                    $_POST["userFName"], 
                    $_POST["userLName"],
                    $_POST["userPhone"],
                    $_POST["userEmail"],
                    $_POST["userTitle"],
                    $_POST["username"]
                );
        header("location:?action=viewProfileUser");
    }
}

?>