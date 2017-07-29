<?php

    // DATABASE ACCESS ENVIRONMENTAL VARIABLES
    // These variables are used throught the application
    // These variable are exclusively for contacting the database 
    // They have nothing to do with records in the database
    $psalt  = getenv('DB_PSALT'); 
    $host   = getenv('DB_HOST');
    $name   = getenv('DB_NAME');
    $port   = getenv('DB_PORT');
    $char   = getenv('DB_CHAR');
    $uname  = getenv('DB_USER');
    $pword  = getenv('DB_PASS');

    $_CONTACT;

// Create "Contacts" Class (aka object)

class Contacts { 

    // ***************** ADD a New Contact *********************
    // called when ($_GET["action"]=="addContactAction") -- (#?)
    // pass in contFName, contLName, contCell, contLand, contEmail, contTitle, contCo, contDept, username and password
    // salt & hash password
    // nothing is returned; database is updated with new contact
    public function addContact($contFName, $contLName, $contCell, $contLand, $contEmail, $contTitle, $contCo, $contDept){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // insert the values into the database
        $st = $dbh->prepare("INSERT INTO contacts (contFName, contLName, contCell, contLand, contEmail, contTitle, contCo, contDept) VALUES (:cfn, :cln, :cc, :cl, :ce, :cti, :cco, :cde)");
        $st->execute(array(":cfn"=>$contFName, ":cln"=>$contLName, ":cc"=>$contCell, ":cl"=>$contLand, ":ce"=>$contEmail, ":cti"=>$contTitle, ":cco"=>$contCo, ":cde"=>$contDept));

        // Pull last value inserted into database & set as a session var
        // This will make it available across the application 
        // but primarily for output on the successAddContact page
        $st = $dbh->prepare("SELECT max(contId) FROM contacts;");
        $st->execute();
        $_SESSION["contId"] = $st->fetchColumn();
    }

    // **************** UPDATE CONTACT *********************
    // called when ($_GET["action"]=="editAction") -- (#?)
    // pass in contactId, first name, last name, phone, and email
    // nothing is returned; database is updated with current info
    public function updateContact($contId, $contFName, $contLName, $contCell, $contLand, $contEmail, $contTitle, $contCo, $contDept){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("UPDATE contacts SET contFName = :cfn, contLName = :cln, contCell = :cc, contLand = :cl, contEmail = :ce, contTitle = :cti, contCo = :cco, contDept = :cde  WHERE contId= :id");
        $st->execute(array(":id"=>$contId, ":cfn"=>$contFName, ":cln"=>$contLName, ":cc"=>$contCell, ":cl"=>$contLand, ":ce"=>$contEmail, ":cti"=>$contTitle, ":cco"=>$contCo, ":cde"=>$contDept));
    }

    // *************** DELETE CONTACT *********************
    // called when ($_GET["action"]=="deleteContact") -- (#?)
    // pass in contactId
    // nothing is returned; database is updated with deletion of contact record
    public function deleteContact($eid){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // delete user from database
        $st = $dbh->prepare("DELETE FROM contacts WHERE contId= :id");
        $st->execute(array(":id"=>$eid));

    }

    // **************** View profile (SINGLE) contact *********************
    // called when user clicks on contacts userId on directory page
    // pass in contactId
    // $result is an array from the database with contactId matching the one passed into it
    public function getContact($eid){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all users with matching userid's (should only be one!)
        // return result
        $st = $dbh->prepare("SELECT contFName, contLName, contCell, contLand, contEmail, contTitle, contCo, contDept FROM contacts WHERE contId = :id");
        $st->execute(array(":id"=>$eid));
        $result = $st->fetchAll();
        // var_dump($result);
        return $result;
    }

    // **************** GET (ALL) CONTACTS *********************
    // nothing is passed in
    // called when ($_GET["action"]=="directory") -- (#?)
    // $result is an array from the database of all contacts
    public function getContacts(){
       
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("SELECT contFName, contLName, contCell, contLand, contEmail, contTitle, contCo, contDept, contId FROM contacts");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

} // closes class Contacts


?>