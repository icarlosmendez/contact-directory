
<!--
Filename:  profile.php
Once a user has sucessfully created an account or logged in,
they can access their profile page which will allow them
to update their info, see the full employee directory or log out
directed from:  $_GET["action"]=="directory" (#6 on controllers/Action_Controller.php)
-->
<?php
    foreach( $results as $employee ){
?>

<main>
    <div class="container">

        <div class="upper-spacer">
            <h2>Employee Profile</h2>

            <p>First Name:     <?=$employee["empFName"];?></p>
            <p>Last Name:      <?=$employee["empLName"];?></p>
            <p>Phone Number:   <?=$employee["empPhone"];?></p>
            <p>Email:          <?=$employee["empEmail"];?></p>
            <p>Username:       <?=$employee["username"];?></p>

            <a class='' href='?action=update'>Update</a>&nbsp&nbsp
            <a class='' href='?action=delete'>Delete Account</a>
        </div>


    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>