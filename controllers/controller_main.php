<?php
session_start();

// Includes for Controller:
include("models/contacts.php");
include("models/users.php");
include("models/views.php");

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
    // pass in contFName, contLName, contPhone, contEmail, username, password
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

    // *********** SIGN IN VERIFICATION *********************
    // After an existing user hits submit to login
    // username & password will be passed via POST to the verifyContact method
    // The POST values will be compared to what's stored in the database
    // A boolean of TRUE or FALSE, 1 or 0 will be returned:
    // If login is successful, they will be redirected to their profile page
    // Otherwise, they will be redirected to an error page
    else if ($_GET["action"]=="signinAction"){
        $loggedIn = $users->verifyUser(
                                $_POST["username"],
                                $_POST["password"]
                            );

        if($loggedIn){
            header("location:?action=directory");
        }

        else {
            $views->getViews("views/head.php");
            $views->getViews("views/header.php");
            $views->getViews("views/loginError.php");
            $views->getViews("views/footer.php");
        }

    }

    // *********** VIEW PROFILE FOR USER (OWN)  *********************
    // User profile is accessed from the Nav Bar in header_session.php or from success page
    // run the function getUser, pass in session var contId
    // pass $data into the view profile.php
    else if ($_GET["action"]=="viewProfileUser"){
        $data = $contacts->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php", $data);
        $views->getViews("views/profile_user.php", $data);
        $views->getViews("views/footer.php");
    }

    // *********** VIEW PROFILE FOR CONTACT *********************
    // Contact profile is from the directory page
    // run the function getContact, pass in session var contId
    // pass $data into the view profile.php
    else if ($_GET["action"]=="viewProfileContact"){
        var_dump($_SESSION["contId"]);
        $data1 = $contacts->getUser($_SESSION["userId"]);
        $data2 = $contacts->getContact($_SESSION["contId"]);
        
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php", $data1);
        $views->getViews("views/profile_contact.php", $data2);
        $views->getViews("views/footer.php");
    }

	// *********** DIRECTORY *********************
    // Directory is from the Nav Bar in header_session.php or from profile
    // run the function getContacts, pass result into $data
    // pass $data into the view directory.php
    else if ($_GET["action"]=="directory"){
        $data1 = $users->getUser($_SESSION["userId"]);
        $data2 = $contacts->getContacts();
        // var_dump($data2);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** UPDATE USER *********************
    else if ($_GET["action"]=="updateUser"){
        // run function getUser by using the userid, pass results into $data
        // pass $data into the view update_form.php
        $data = $contacts->getContact($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data);
        $views->getViews("views/form_update.php",$data);
        $views->getViews("views/footer.php");
    }

    // *********** EDIT ACTION *********************
    else if ($_GET["action"]=="editAction"){
        // editAction is from update_form.php
        // run function updateContact, pass in the contactName & contactId
        // redirect to the contactList
        $contacts->updateContact(
                    $_SESSION["userId"], 
                    $_POST["contFName"], 
                    $_POST["contLName"],
                    $_POST["contPhone"],
                    $_POST["contEmail"],
                    $_POST["contTitle"],
                    $_POST["contCo"],
                    $_POST["contDept"]
                );
        header("location:?action=viewProfileUser");
    }

    // *********** DELETE CONTACT *********************
    else if ($_GET["action"]=="deleteContact"){
        // run the function deleteContact, pass in the contactId
        // terminate session
        // redirect to the splash page
        $data = $contacts->getContact($_SESSION["contId"]);
        var_dump($data);
        $contacts->deleteContact($data);
        header("location:?directory");
    }

    // *********** ADD CONTACT FORM VIEW *********************
    // If the user decides to signup (from links on splash bar or nav)
    // they will be redirected to the Signup Form.
    if($_GET["action"]=="addContact"){
        $data = $users->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php", $data);
        $views->getViews("views/form_addContact.php");
        $views->getViews("views/footer.php");
    }

    // *********** ADD CONTACT ACTION *********************
    // When the user hits "submit" from the Signup Form,
    // the addContact function is run.
    // pass in contFName, contLName, contPhone, contEmail, username, password
    // addContact will salt & hash password and add user to database
    // addContact returns all info associated with account, stored into $data
    // The user will be redirected to the Success Sign Up page with $data
    else if($_GET["action"]=="addContactAction"){
        $contacts->addContact(
                    $_POST["contFName"],
                    $_POST["contLName"],
                    $_POST["contPhone"],
                    $_POST["contEmail"],
                    $_POST["contTitle"],
                    $_POST["contCo"],
                    $_POST["contDept"]
                );
        header("location:?action=successAddContact");
    }

    // *********** ADD CONTACT SUCCESS *********************
    // The user will be redirected to a success page after they add a new contact
    // The success page will confirm the new contacts details
    // getUser will run to pull the information from the database and store as $data
    // the information will then be passed into successSignUp.php
    else if ($_GET["action"]=="successAddContact"){
        $data = $users->getUser($_SESSION["userId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data);
        $views->getViews("views/successAddContact.php",$data);
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








