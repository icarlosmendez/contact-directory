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

    $_SORTING;

// Create "Sorting" Class (aka object)

class Sorting{ 

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY FIRST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortfnameasc") -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contFName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // ************ GET (ALL) CONTACTS *********************
    // *********** SORT BY FIRST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortfnamedesc" -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contFName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // ************ SORT BY LAST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortlnameasc") -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contLName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *********** SORT BY LAST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortlnamedesc" -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contLName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // **************** SORT BY PHONE ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortphoneasc") -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contPhone ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *************** SORT BY PHONE DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortphonedesc" -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contPhone DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // **************** SORT BY EMAIL ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortemailasc") -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contEmail ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) CONTACTS *********************
    // *************** SORT BY EMAIL DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortemaildesc" -- (#?)
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
        $st = $dbh->prepare("SELECT contFName, contLName, contPhone, contEmail FROM contacts ORDER BY contEmail DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

} // closes class Sorting

?>