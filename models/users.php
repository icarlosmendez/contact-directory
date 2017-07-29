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

    $_USER;

// Create "Users" Class (aka object)

class Users { 

    // *********** LOGIN VERIFICATION *********************
    // called when ($_GET["action"]=="signinAction") -- (#?)
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
        $sth = $dbh->prepare('SELECT userId FROM users WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $usernameInput);
        $sth->bindParam(':password', $passwordInput);
        $sth->execute();
        $result = $sth->fetchAll();

        // var_dump($result[0]["userId"]);

        // If the result of the 1st array item contains a 'userId', let the user know they have successfully logged in
        if (isset($result[0]["userId"])) {
            $_SESSION["userId"] = $result[0]["userId"];
            // var_dump($_SESSION["userId"]);
            return TRUE;
        
        } else {
            return FALSE;
        }

    }

    // *********** View Profile (SINGLE) User *********************
    // called when user successfully creates account (success page)
    // pass in userId
    // $result is an array from the database with any user records containing a userId matching the one passed into it
    public function getUser($eid){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all users with matching userid's (should only be one!)
        // create the prepared statement
        $st = $dbh->prepare("SELECT userFName, userLName, userPhone, userEmail, userTitle, username FROM users WHERE userId = :id");
        $st->execute(array(":id"=>$eid));
        // fetch results from database
        $result = $st->fetchAll();

        // return result
        return $result;
    }

    // This method may or may not be useful. As of July 16, it's a bust but I'll leave it here a little longer to see if it comes into its own

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
        $st = $dbh->prepare("SELECT userId FROM users;");
        $st->execute();
        $_SESSION["userIds"] = $st->fetchAll();
        return $_SESSION["userIds"];
    }

    // *********** ADD a New User *********************
    // This is the part of the signup functionality that touches the database
    // called when ($_GET["action"]=="addUserAction") -- (#?)
    // pass in userFName, userLName, userPhone, userEmail, userTitle, userCo, userDept, username and password
    // salt & hash password
    // nothing is returned; database is updated with new useract
    public function addUser($userFName, $userLName, $userPhone, $userEmail, $userTitle, $username, $password){

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
        $st->execute(array(":efn"=>$userFName, ":eln"=>$userLName, ":ep"=>$userPhone, ":ee"=>$userEmail, ":ti"=>$userTitle, ":un"=>$username, ":pass"=>$password));

        // Pull last value created from database & set as a session var
        // This will make it available across the application
        $st = $dbh->prepare("SELECT max(userId) FROM users;");
        $st->execute();
        $_SESSION["userId"] = $st->fetchColumn();
    }

    // *********** UPDATE USER *********************
    // called when ($_GET["action"]=="editAction") -- (#?)
    // pass in whatever data is populated in the form
    // database is updated with current info
    // nothing is returned
    public function updateUser($userId, $userFName, $userLName, $userPhone, $userEmail, $userTitle, $username){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("UPDATE users SET userFName = :ef, userLName = :el, userPhone = :ep, userEmail = :ee, userTitle = :ti, username = :username  WHERE userId= :id");
        $st->execute(array(":id"=>$userId, ":ef"=>$userFName, ":el"=>$userLName, ":ep"=>$userPhone, ":ee"=>$userEmail, ":ti"=>$userTitle, ":username"=>$username));
    }

    // *********** DELETE USER *********************
    // called when ($_GET["action"]=="deleteUser") -- (#?)
    // pass in userId
    // database is updated with the removal of user record
    // nothing is returned
    public function deleteUser($eid){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // delete user from database
        $st = $dbh->prepare("DELETE FROM users WHERE userId= :id");
        $st->execute(array(":id"=>$eid));

        session_destroy();

    }

} // closes class Users

?>