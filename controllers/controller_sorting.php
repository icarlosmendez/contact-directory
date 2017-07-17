 <?php
// session_start();

// Includes for Controller:
include("models/contacts.php");
include("models/users.php");
include("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$users = new Users();
$contacts = new Contacts();

    // *********** TABLE SORTING FUNCTIONS: *********************
    // *********** SORT BY FIRST NAME ASCENDING *************
    else if ($_GET["action"]=="sortfnameasc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactsfnameasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY FIRST NAME DESCENDING *************
    else if ($_GET["action"]=="sortfnamedesc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactsfnamedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY LAST NAME ASCENDING *************
    else if ($_GET["action"]=="sortlnameasc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactslnameasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY LAST NAME DESCENDING *************
    else if ($_GET["action"]=="sortlnamedesc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactslnamedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY PHONE ASCENDING *************
    else if ($_GET["action"]=="sortphoneasc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactsphoneasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY PHONE DESCENDING *************
    else if ($_GET["action"]=="sortphonedesc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactsphonedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY EMAIL ASCENDING *************
    else if ($_GET["action"]=="sortemailasc"){
        $data1 = $contacts->getContact($_SESSION["contId"]);
        $data2 = $contacts->getContactsemailasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** SORT BY EMAIL DESCENDING *************
    else if ($_GET["action"]=="sortemaildesc"){
        $data1 = $contacts->getContact($_SESSION["contactsId"]);
        $data2 = $contacts->getContactsemaildesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_session.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

?>