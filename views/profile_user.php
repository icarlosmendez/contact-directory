<!--
Filename:  profile_user.php
Once a user has sucessfully created an account or logged in,
they can access their profile page which will allow them
to update their info, see the full contact directory or log out
// TODO: the line below is wrong. Correct once the app is working
directed from:  $_GET["action"]=="directory" (#6 on controllers/Action_Controller.php)
-->
<?php
    foreach( $results as $user ){
?>

<main>
    <div class="container">

        <div class="upper-spacer">
            <h2>User Profile</h2>
            <div class="card-panel">
                <p>First Name:      <?=$user["userFName"];?></p>
                <p>Last Name:       <?=$user["userLName"];?></p>
                <p>Phone Number:    <?=$user["userPhone"];?></p>
                <p>Email:           <?=$user["userEmail"];?></p>
                <p>Title:           <?=$user["userTitle"];?></p>
                <p>Username:        <?=$user["username"];?></p>

                <a class='' href='?action=updateUser'>Update</a>&nbsp&nbsp
                <a class='' href='?action=delete'>Delete Account</a>
            </div>
        </div>


    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>