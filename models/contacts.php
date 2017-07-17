<?php

    // database access environmental variables
    // these variables are used throught the Contacts class
    $psalt  = getenv('DB_PSALT'); 
    $host   = getenv('DB_HOST');
    $name   = getenv('DB_NAME');
    $port   = getenv('DB_PORT');
    $char   = getenv('DB_CHAR');
    $uname  = getenv('DB_USER');
    $pword  = getenv('DB_PASS');

    $_CONTACT;
    // var_dump($name);

// Create "Contacts" Class (aka object)

class Contacts{ 

    // *********** LOGIN VERIFICATION *********************
    // called when ($_GET["action"]=="signinAction") -- (#5)
    // username & password posted will be compared to the database
    // if username & password match, TRUE will be returned
    // else, FALSE will be returned
    public function verifyUser($usernameInput, $passwordInput){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword, $psalt;
        
        // salt and hash user password
        $salt = $psalt;
        $passwordInput = md5($passwordInput . $salt);

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // find all instances where username & password match the usernameInput and passwordInput
        $sth = $dbh->prepare('SELECT contId FROM contacts WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $usernameInput);
        $sth->bindParam(':password', $passwordInput);
        $sth->execute();
        $result = $sth->fetchAll();

        // If the result of the 1st array item contains a 'contact id', let the user know they have successfully logged in
        if (isset($result[0]["contId"])) {
            $_SESSION["userId"] = $result[0]["contId"];
            return TRUE;
        }

        else {
            return FALSE;
        }

    }

    // *********** View profile (SINGLE) user *********************
    // called when contact successfully creates account (success page)
    // or when they succesfully log in when
    // pass in contactId
    // $result is an array from the database with contactId matching the one passed into it
    public function getUser($eid){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all users with matching userid's (should only be one!)
        // return result
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail, contTitle, contCo, contDept, username FROM contacts WHERE contId = :id");
        $st->execute(array(":id"=>$eid));
        $result = $st->fetchAll();
        return $result;
    }

    // *********** Get User Ids *********************
    // Called when user successfully logs in
    // The data is stored in a session variable $_SESSION["userIds"]
    // That variable is then expected to provide values to use for accessing
    // user account data to populate profile views access from the directory
    public function getUserIds(){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // pull userIds from database & save as a session var
        $st = $dbh->prepare("SELECT contId FROM contacts;");
        $st->execute();
        $_SESSION["userIds"] = $st->fetchAll();
        return $_SESSION["userIds"];
    }

    // *********** ADD a New User *********************
    // called when ($_GET["action"]=="addUserAction") -- (#?)
    // pass in contFName, contLName, contPhone, contEmail, contTitle, contCo, contDept, username and password
    // salt & hash password
    // nothing is returned; database is updated with new contact
    public function addUser($contFName, $contLName, $contPhone, $contEmail, $contTitle, $contCo, $contDept, $uname, $password){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword, $psalt;

        // salt & hash password
        $salt = $psalt;
        $password = md5($password.$salt);

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // insert the values into the database
        $st = $dbh->prepare("INSERT INTO users (userFName, userLName, userPhone, userEmail, userTitle, username, password) VALUES (:efn, :eln, :ep, :ee, :ti, :un, :pass)");
        $st->execute(array(":efn"=>$contFName, ":eln"=>$contLName, ":ep"=>$contPhone, ":ee"=>$contEmail, ":ti"=>$contTitle, ":un"=>$uname, ":pass"=>$password));
    }

    // *********** UPDATE CONTACT *********************
    // called when ($_GET["action"]=="editAction") -- (#9)
    // pass in contactId, first name, last name, phone, and email
    // nothing is returned; database is updated with current info
    public function updateUser($contId, $contFName, $contLName, $contPhone, $contEmail, $contTitle, $contCo, $contDept){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("UPDATE contacts SET contFName = :ef, contLName = :el, contPhone = :ep, contEmail = :ee, contTitle = :ti, contCo = :co, contDept = :de  WHERE contId= :id");
        $st->execute(array(":id"=>$contId, ":ef"=>$contFName, ":el"=>$contLName, ":ep"=>$contPhone, ":ee"=>$contEmail, ":ti"=>$contTitle, ":co"=>$contCo, ":de"=>$contDept));
    }

    // *********** DELETE CONTACT *********************
    // called when ($_GET["action"]=="deleteContact") -- (#10)
    // pass in contactId
    // nothing is returned; database is updated with deletion of contact record
    public function deleteUser($eid){
        
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

        // session_destroy();

    }

    // *********** ADD a New Contact *********************
    // called when ($_GET["action"]=="addContactAction") -- (#1)
    // pass in contFName, contLName, contPhone, contEmail, contTitle, contCo, contDept, username and password
    // salt & hash password
    // nothing is returned; database is updated with new contact
    public function addContact($contFName, $contLName, $contPhone, $contEmail, $contTitle, $contCo, $contDept){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword, $psalt;

        // salt & hash password
        $salt = $psalt;
        $password = md5($password.$salt);

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // insert the values into the database
        $st = $dbh->prepare("INSERT INTO contacts (contFName, contLName, contPhone, contEmail, contTitle, contCo, contDept) VALUES (:efn, :eln, :ep, :ee, :ti, :co, :de)");
        $st->execute(array(":efn"=>$contFName, ":eln"=>$contLName, ":ep"=>$contPhone, ":ee"=>$contEmail, ":ti"=>$contTitle, ":co"=>$contCo, ":de"=>$contDept));

    }

    // *********** View profile (SINGLE) contact *********************
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail, contTitle, contCo, contDept, username FROM contacts WHERE contId = :id");
        $st->execute(array(":id"=>$eid));
        $result = $st->fetchAll();
        return $result;
    }

	// *********** GET (ALL) CONTACTS *********************
    // nothing is passed in
    // called when ($_GET["action"]=="directory") -- (#7)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail, contId FROM contacts");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** UPDATE CONTACT *********************
    // called when ($_GET["action"]=="editAction") -- (#9)
    // pass in contactId, first name, last name, phone, and email
    // nothing is returned; database is updated with current info
    public function updateContact($contId, $contFName, $contLName, $contPhone, $contEmail, $contTitle, $contCo, $contDept){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("UPDATE contacts SET contFName = :ef, contLName = :el, contPhone = :ep, contEmail = :ee, contTitle = :ti, contCo = :co, contDept = :de  WHERE contId= :id");
        $st->execute(array(":id"=>$contId, ":ef"=>$contFName, ":el"=>$contLName, ":ep"=>$contPhone, ":ee"=>$contEmail, ":ti"=>$contTitle, ":co"=>$contCo, ":de"=>$contDept));
    }

    // *********** DELETE CONTACT *********************
    // called when ($_GET["action"]=="deleteContact") -- (#10)
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

        // session_destroy();

    }




    // ****************** SORTING METHODS ****************


    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY FIRST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortfnameasc") -- (#11)
    // $result is an array from the database of all contacts
    public function getContactsfnameasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contFName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY FIRST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortfnamedesc" -- (#12)
    // $result is an array from the database of all contacts
    public function getContactsfnamedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contFName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY LAST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortlnameasc") -- (#13)
    // $result is an array from the database of all contacts
    public function getContactslnameasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contLName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY LAST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortlnamedesc" -- (#14)
    // $result is an array from the database of all contacts
    public function getContactslnamedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contLName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY PHONE ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortphoneasc") -- (#15)
    // $result is an array from the database of all contacts
    public function getContactsphoneasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contPhone ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY PHONE DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortphonedesc" -- (#16)
    // $result is an array from the database of all contacts
    public function getContactsphonedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contPhone DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY EMAIL ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortemailasc") -- (#17)
    // $result is an array from the database of all contacts
    public function getContactsemailasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contEmail ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY EMAIL DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortemaildesc" -- (#17)
    // $result is an array from the database of all contacts
    public function getContactsemaildesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the contacts from the database
        $st = $dbh->prepare("select contFName, contLName, contPhone, contEmail from contacts ORDER BY contEmail DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

} // closes class Contacts


?>