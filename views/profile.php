
<!--
Filename:  profile.php
Once a user has sucessfully created an account or logged in,
they can access their profile page which will allow them
to update their info, see the full contact directory or log out
directed from:  $_GET["action"]=="directory" (#6 on controllers/Action_Controller.php)
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