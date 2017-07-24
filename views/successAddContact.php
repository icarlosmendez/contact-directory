
<!--
// filename:  successAddContact.php
// After a succesful addition, the user will be redirected to a success page
// directed from: $_GET["action"]=="addContactAction" (on controllers/controller_main.php)
// $data is passed in: $data = $contacts->getContact($_SESSION["contId"]);
-->
<?php
    // var_dump($results);
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
            <p>Title:           <?=$contact["contTitle"];?></p>
            <p>Company:         <?=$contact["contCo"];?></p>
            <p>Department:      <?=$contact["contDept"];?></p>
            <br />
    
            <a class='' role='button' href='?action=directory'>Go to Directory</a>
        </div>

    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>