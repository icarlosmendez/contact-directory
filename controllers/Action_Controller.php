<?php
session_start();

// Includes for Controller:
include("models/employees.php");
include("models/views.php");

// Instantiate and make new copies of your Classes above
// Store in variables
$views = new Views();
$employees = new Employees();

// Controller routes the users based on the form "action" from Views;
// If the action is not empty -- keep processing...
if(!empty($_GET['action'])){

    // *********** 1. SIGN UP FORM *********************
    // If the user decides to signup (from links on splash bar or nav)
    // they will be redirected to the Signup Form.
    if($_GET["action"]=="signup"){
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/signupForm.php");
        $views->getViews("views/footer.php");
    }

    // *********** 2. SIGN UP A NEW EMPLOYEE *********************
    // When the user hits "submit" from the Signup Form,
    // the addEmployee function is run.
    // pass in empFName, empLName, empPhone, empEmail, username, password
    // addEmployee will salt & hash password and add user to database
    // addEmployee returns all info associated with account, stored into $data
    // The user will be redirected to the Success Sign Up page with $data
    else if($_GET["action"]=="addEmployeeAction"){
        $employees->addEmployee($_POST["empFName"],$_POST["empLName"],$_POST["empPhone"],$_POST["empEmail"],$_POST["uName"],$_POST["password"]);
        header("location:?action=successSignUp");
    }

    // *********** 3. SIGN UP SUCCESS *********************
    // The user will be redirected to a success page after their account is added
    // The success page will confirm their registration details
    // getEmployee will run to pull the information from the database and store as $data
    // the information will then be passed into successSignUp.php
    else if ($_GET["action"]=="successSignUp"){
        $data = $employees->getEmployee($_SESSION["empId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data);
        $views->getViews("views/successSignUp.php",$data);
        $views->getViews("views/footer.php");
    }

    // *********** 4. LOGIN *********************
    // If a user has a previously created account
    // They can choose to login and will be redirected to the signin Form
    else if ($_GET["action"]=="signin"){
        $views->getViews("views/head.php");
        $views->getViews("views/header.php");
        $views->getViews("views/signinForm.php");
        $views->getViews("views/footer.php");
    }

    // *********** 5. LOGIN VERIFICATION *********************
    // After an existing user hits submit to login
    // username & password will be posted to verifyEmployee
    // Their username & password submitted will be compared to what's stored in the database
    // A boolean will be returned:
    // If login is successful, they will be redirected to their profile page
    // Otherwise, they will be redirected to an error page
    else if ($_GET["action"]=="signinAction"){
        $loggedIn = $employees->verifyEmployee($_POST["uName"],$_POST["password"]);

        if($loggedIn){
            $data = $employees->getEmployee($_SESSION["empId"]);
            $views->getViews("views/head.php");
            $views->getViews("views/header_li.php",$data);
            $views->getViews("views/profile.php", $data);
            $views->getViews("views/footer.php");
        }

        else {
            $views->getViews("views/head.php");
            $views->getViews("views/header.php");
            $views->getViews("views/loginError.php");
            $views->getViews("views/footer.php");
        }

    }

    // *********** 6. PROFILE *********************
    // Profile is from the Nav Bar in header_li.php or from success page
    // run the function getEmployee, pass in session var empId
    // pass $data into the view profile.php
    else if ($_GET["action"]=="profile"){
        $data = $employees->getEmployee($_SESSION["empId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data);
        $views->getViews("views/profile.php", $data);
        $views->getViews("views/footer.php");
    }

	// *********** 7. DIRECTORY *********************
    // Directory is from the Nav Bar in header_li.php or from profile
    // run the function getEmployees, pass result into $data
    // pass $data into the view directory.php
    else if ($_GET["action"]=="directory"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployees();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 8. UPDATE EMPLOYEE *********************
    else if ($_GET["action"]=="update"){
        // run function getUser by using the userid, pass results into $data
        // pass $data into the view update_form.php
        $data = $employees->getEmployee($_SESSION["empId"]);
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data);
        $views->getViews("views/updateForm.php",$data);
        $views->getViews("views/footer.php");
    }

    // *********** 9. EDIT ACTION *********************
    else if ($_GET["action"]=="editAction"){
        // editAction is from update_form.php
        // run function updateEmployee, pass in the employeename & employeeid
        // redirect to the employeeList
        $employees->updateEmployee($_SESSION["empId"], $_POST["empFName"], $_POST["empLName"],$_POST["empPhone"],$_POST["empEmail"]);
        header("location:?action=profile");
    }
    // *********** 10. DELETE employee *********************
    else if ($_GET["action"]=="delete"){
        // run the function deleteEmployee, pass in the employeeId
        // terminate session
        // redirect to the splash page
        $employees->deleteEmployee($_SESSION["empId"]);
        header("location:?splash");
    }

    // *********** TABLE SORTING FUNCTIONS: *********************
    // *********** 11. SORT BY FIRST NAME ASCENDING *************
    else if ($_GET["action"]=="sortfnameasc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesfnameasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 12. SORT BY FIRST NAME DESCENDING *************
    else if ($_GET["action"]=="sortfnamedesc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesfnamedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 13. SORT BY LAST NAME ASCENDING *************
    else if ($_GET["action"]=="sortlnameasc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeeslnameasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 14. SORT BY LAST NAME DESCENDING *************
    else if ($_GET["action"]=="sortlnamedesc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeeslnamedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 15. SORT BY PHONE ASCENDING *************
    else if ($_GET["action"]=="sortphoneasc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesphoneasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 16. SORT BY PHONE DESCENDING *************
    else if ($_GET["action"]=="sortphonedesc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesphonedesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 17. SORT BY EMAIL ASCENDING *************
    else if ($_GET["action"]=="sortemailasc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesemailasc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 18. SORT BY EMAIL DESCENDING *************
    else if ($_GET["action"]=="sortemaildesc"){
        $data1 = $employees->getEmployee($_SESSION["empId"]);
        $data2 = $employees->getEmployeesemaildesc();
        $views->getViews("views/head.php");
        $views->getViews("views/header_li.php",$data1);
        $views->getViews("views/directory.php",$data2);
        $views->getViews("views/footer.php");
    }

    // *********** 19. LOGOUT *************
    else if ($_GET["action"]=="logout"){
        session_destroy();
        header("Location: index.php");
    }

} else {

	// ************ 6. DEFAULT VIEW is Splash page ********************
	$views->getViews("views/head.php");
	$views->getViews("views/header.php");
	$views->getViews("views/splash.php");
	$views->getViews("views/footer.php");

} // closes if(!empty($_GET['action']...

?>








