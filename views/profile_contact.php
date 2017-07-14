<!--
Filename:  profile_contact.php
Once a user has sucessfully created an account or logged in,
they can access the profile of any contact in the database 
from the directory page to update the contact record
directed from:  $_GET["action"]=="viewProfileContact" (#6 on controllers/Action_Controller.php)
-->
<?php
    foreach( $results as $contact ){
?>

<main>
    <div class="container">

        <div class="upper-spacer">
            <h2>Contact Profile</h2>
            <div class="card-panel">
                <p><span class="">First Name:</span>     <?=$contact["contFName"];?></p>
                <p>Last Name:      <?=$contact["contLName"];?></p>
                <p>Phone Number:   <?=$contact["contPhone"];?></p>
                <p>Email:          <?=$contact["contEmail"];?></p>
                <p>Title:          <?=$contact["contTitle"];?></p>
                <p>Co:             <?=$contact["contCo"];?></p>
                <p>Dept:           <?=$contact["contDept"];?></p></br>
                <p>Username:       <?=$contact["username"];?></p></br>

                <a class='' href='?action=update'>Update</a>&nbsp&nbsp
                <a class='' href='?action=delete'>Delete Account</a>
            </div>
        </div>


    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>