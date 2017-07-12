<?php

    // database access environmental variables
    // these variables are used throught the Employees class
    $psalt  = getenv('DB_PSALT'); 
    $host   = getenv('DB_HOST');
    $name   = getenv('DB_NAME');
    $port   = getenv('DB_PORT');
    $char   = getenv('DB_CHAR');
    $uname  = getenv('DB_USER');
    $pword  = getenv('DB_PASS');

    // var_dump($name);

// Create "Employees" Class (aka object)

class Employees{ 

    // *********** ADD a new employee *********************
    // called when ($_GET["action"]=="addEmployeeAction") -- (#1)
    // pass in empFName, empLName, empPhone, empEmail, username, password
    // salt & hash password
    // nothing is returned; database is updated with new employee
    public function addEmployee($empFName, $empLName, $empPhone, $empEmail, $uname, $password){

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
        $st = $dbh->prepare("insert into employees (empFName, empLName, empPhone, empEmail, username, password) values (:efn, :eln, :ep, :ee, :un, :pass)");
        $st->execute(array(":efn"=>$empFName,":eln"=>$empLName,":ep"=>$empPhone, ":ee"=>$empEmail, ":un"=>$uname, ":pass"=>$password));

        // pull last value created from database & save as a session var
        $st = $dbh->prepare("SELECT max(empId) FROM employees;");
        $st->execute();
        $_SESSION["empId"] = $st->fetchColumn();
    }

    // *********** GET (SINGLE) employee *********************
    // called when employee successfully creates account (success page)
    // or when they succesfully log in when
    // pass in employeeid
    // $result is an array from the database with employeeid matching the one passed into it
    public function getEmployee($eid){

        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all users which matching userid's (should be one!)
        // return result
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail, username from employees where empId = :id");
        $st->execute(array(":id"=>$eid));
        $result = $st->fetchAll();
        return $result;
    }

    // *********** LOGIN VERIFICATION *********************
    // called when ($_GET["action"]=="signinAction") -- (#5)
    // username & password posted will be compared to the database
    // if username & password match, TRUE will be returned
    // else, FALSE will be returned
    public function verifyEmployee($usernameInput, $passwordInput){

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
        $sth = $dbh->prepare('select empId from employees where username = :username and password = :password');
        $sth->bindParam(':username', $usernameInput);
        $sth->bindParam(':password', $passwordInput);
        $sth->execute();
        $result = $sth->fetchAll();

        // If the result of the 1st array item contains an 'employee id', let the user know they have successfully logged in
        if (isset($result[0]["empId"])) {
            $_SESSION["empId"] = $result[0]["empId"];
            return TRUE;
        }

        else {
            return FALSE;
        }

    }

	// *********** GET (ALL) EMPLOYEES *********************
    // nothing is passed in
    // called when ($_GET["action"]=="directory") -- (#7)
    // $result is an array from the database of all employees
    public function getEmployees(){
       
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY FIRST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortfnameasc") -- (#11)
    // $result is an array from the database of all employees
    public function getEmployeesfnameasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empFName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY FIRST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortfnamedesc" -- (#12)
    // $result is an array from the database of all employees
    public function getEmployeesfnamedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empFName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY LAST NAME ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortlnameasc") -- (#13)
    // $result is an array from the database of all employees
    public function getEmployeeslnameasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empLName ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY LAST NAME DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortlnamedesc" -- (#14)
    // $result is an array from the database of all employees
    public function getEmployeeslnamedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empLName DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY PHONE ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortphoneasc") -- (#15)
    // $result is an array from the database of all employees
    public function getEmployeesphoneasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empPhone ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY PHONE DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortphonedesc" -- (#16)
    // $result is an array from the database of all employees
    public function getEmployeesphonedesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empPhone DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY EMAIL ASC *****************
    // nothing is passed in
    // called when ($_GET["action"]=="sortemailasc") -- (#17)
    // $result is an array from the database of all employees
    public function getEmployeesemailasc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empEmail ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (ALL) EMPLOYEES *********************
    // *********** SORT BY EMAIL DESC *****************
    // nothing is passed in
    // called when $_GET["action"]=="sortemaildesc" -- (#17)
    // $result is an array from the database of all employees
    public function getEmployeesemaildesc(){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // grab all the employees from the database
        $st = $dbh->prepare("select empFName, empLName, empPhone, empEmail from employees ORDER BY empEmail DESC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** UPDATE EMPLOYEE *********************
    // called when ($_GET["action"]=="editAction") -- (#9)
    // pass in employee ID, first name, last name, phone, and email
    // nothing is returned; database is updated with current info
    public function updateEmployee($empId, $empFName, $empLName, $empPhone, $empEmail){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("update employees set empFName = :ef, empLName = :el, empPhone = :ep, empEmail = :ee  where empId= :id");
        $st->execute(array(":id"=>$empId, ":ef"=>$empFName, ":el"=>$empLName, ":ep"=>$empPhone, ":ee"=>$empEmail));
    }

    // *********** DELETE employee *********************
    // called when ($_GET["action"]=="deleteEmployee") -- (#10)
    // pass in employeeid
    // nothing is returned; database is updated with deletion of employee record
    public function deleteEmployee($eid){
        
        // call global variables for use in this method
        global $host, $name, $port, $char, $uname, $pword;

        // access the database
        $dsn    = "mysql:host=$host; dbname=$name; port=$port; char=$char";
        $user   = "$uname";
        $pass   = "$pword";
        $dbh    = new PDO($dsn, $user, $pass);

        // delete user from database
        $st = $dbh->prepare("delete from employees where empId= :id");
        $st->execute(array(":id"=>$eid));

        session_destroy();

    }



} // closes class Employees


?>