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
    // pass in contFName, contLName, contCell, contLand, contEmail, username, password
    // addContact will salt & hash password and add user to database
    // addContact returns all info associated with account, stored into $data
    // The user will be redirected to the Success Sign Up page with $data
    else if($_GET["action"]=="addContactAction"){
        $contacts->addContact(
                    $_POST["contFName"],
                    $_POST["contLName"],
                    $_POST["contCell"],
                    $_POST["contLand"],
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
        $data1 = $users->getUser($_SESSION["userId"]);
        $data2 = $contacts->getContact($_SESSION["contId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/successAddContact.php",$data2);
        $views->getViews("views/footer.php");
    }

	// *********** VIEW PROFILE FOR CONTACT *********************
    // Contact profile is from the directory page
    // run the function getContact, pass in session var contId
    // pass $data into the view profile.php
    // $contId=$_GET["contId"];
    else if ($_GET["action"]=="viewProfileContact"){
        
        // print_r($contId);
        $data1 = $contacts->getUser($_SESSION["userId"]);
        $data2 = $contacts->getContact($_SESSION["contId"]);
        
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php", $data1);
        $views->getViews("views/profile_contact.php", $data2);
        $views->getViews("views/footer.php");
    }

    // *********** EDIT CONTACT ACTION *********************
    else if ($_GET["action"]=="editContactAction"){
        // editAction is from update_form.php
        // run function updateContact, pass in the contactName & contactId
        // redirect to the contactList
        $contacts->updateContact(
                    $_SESSION["userId"], 
                    $_POST["contFName"], 
                    $_POST["contLName"],
                    $_POST["contCell"],
                    $_POST["contLand"],
                    $_POST["contEmail"],
                    $_POST["contTitle"],
                    $_POST["contCo"],
                    $_POST["contDept"],
                    $_POST["username"]
                );
        header("location:?action=viewProfileContact");
    }

    // *********** DELETE CONTACT *********************
    else if ($_GET["action"]=="deleteContact"){
        // run the function deleteContact, pass in the contactId
        // terminate session
        // redirect to the splash page
        $data = $contacts->getContact($_SESSION["contId"]);
        // var_dump($data);
        $contacts->deleteContact($data);
        header("location:?directory");
    }

}

?>