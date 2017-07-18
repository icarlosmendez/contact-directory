
<!--
// filename:  successAddContact.php
// After a succesful addition, the user will be redirected to a success page
// directed from: $_GET["action"]=="addContactAction" (on controllers/controller_main.php)
// $data is passed in: $data = $contacts->getContact($_SESSION["contId"]);
-->
<?php
    foreach($results as $contact){
?>

<main>
    <div class="container">
        <div class="upper-spacer">
            <h2>You have successfully added <?=$contact["contFName"];?> to the Contacts list!</h2>
            <h3>Below are the details you entered:</h3>
    
            <p>First Name:      <?=$contact["contFName"];?></p>
            <p>Last Name:       <?=$contact["contLName"];?></p>
            <p>Phone Number:    <?=$contact["contPhone"];?></p>
            <p>Email:           <?=$contact["contEmail"];?></p>
            <p>Username:        <?=$contact["username"];?></p>
    
            <a class='' role='button' href='?action=directory'>Directory</a>
        </div>

    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>