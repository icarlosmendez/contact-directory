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
            <h2>Contact Profile</h2>
            <div class="card-panel">
                <p><span class="">First Name:</span>     <?=$user["contFName"];?></p>
                <p>Last Name:      <?=$user["contLName"];?></p>
                <p>Phone Number:   <?=$user["contPhone"];?></p>
                <p>Email:          <?=$user["contEmail"];?></p>
                <p>Title:          <?=$user["contTitle"];?></p>
                <p>Co:             <?=$user["contCo"];?></p>
                <p>Dept:           <?=$user["contDept"];?></p></br>
                <p>Username:       <?=$user["username"];?></p></br>

                <a class='' href='?action=update'>Update</a>&nbsp&nbsp
                <a class='' href='?action=delete'>Delete Account</a>
            </div>
        </div>


    </div><!-- closes contianer -->
</main>

<?php
    } // closes foreach
?>