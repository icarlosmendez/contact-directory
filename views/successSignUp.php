
<!--
// filename:  successSignUp.php
// After succesful registration, the user will be redirected to a success page
// directed from: $_GET["action"]=="addContactAction" (#2 on controllers/Action_Controller.php)
// $data is passed in:  $data = $contacts->getContact($_SESSION["contId"]);
// users can then go to their profile, go to the contact directory or log out
-->
<?php
    foreach($results as $user){
?>

<main>
    <div class="container">
        <div class="upper-spacer">
            <h2>You have successfully signed up!</h2>
            <h3>Below are your account details:</h3>
    
            <p>First Name:      <?=$user["userFName"];?></p>
            <p>Last Name:       <?=$user["userLName"];?></p>
            <p>Phone Number:    <?=$user["userPhone"];?></p>
            <p>Email:           <?=$user["userEmail"];?></p>
            <p>Username:        <?=$user["username"];?></p>
    
            <a class='' role='button' href='?action=profile'>Profile</a>
            <a class='' role='button' href='?action=directory'>Directory</a>
            <a class='' role='button' href='?action=signout'>Sign Out</a>
        </div>

    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>