
<!--
// filename:  successSignUp.php
// After succesful registration, the user will be redirected to a success page
// directed from: $_GET["action"]=="addContactAction" (#2 on controllers/Action_Controller.php)
// $data is passed in:  $data = $contacts->getContact($_SESSION["contId"]);
// users can then go to their profile, go to the contact directory or log out
-->
<?php
    foreach($results as $contact){
?>

<main>
    <div class="container">
        <div class="upper-spacer">
            <h2>You have successfully signed up!</h2>
            <h3>Below are your account details:</h3>
    
            <p>First Name:      <?=$contact["contFName"];?></p>
            <p>Last Name:       <?=$contact["contLName"];?></p>
            <p>Phone Number:    <?=$contact["contPhone"];?></p>
            <p>Email:           <?=$contact["contEmail"];?></p>
            <p>Username:        <?=$contact["username"];?></p>
    
            <a class='' role='button' href='?action=profile'>Profile</a>
            <a class='' role='button' href='?action=directory'>Directory</a>
            <a class='' role='button' href='?action=logout'>Log Out</a>
        </div>

    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>