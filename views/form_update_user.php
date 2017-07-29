
<!--
// filename:  update_form.php
// directed from: ($_GET["action"]=="update") (#8 on controllers/Action_Controller.php)
// $data = $contacts->getContact($_SESSION["contId"]);
// method="POST"
// action ="?action=editAction" with contId (#9 on controllers/Action_Controller.php)
-->

<main>
    <div class="container">
        <div class="upper-spacer">
            <h3>Update Profile Information</h3>
        
            <?php
                foreach($results as $user){
            ?>
        
                <form class="wideform" action="?action=editUserAction" method="POST" >
                    <input 
                        type            ="text" 
                        name            ="userFName" 
                        value           ="<?=$user["userFName"];?>"
                        placeholder     ="First Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="userLName" 
                        value           ="<?=$user["userLName"];?>"
                        placeholder     ="Last Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="userPhone" 
                        value           ="<?=$user["userPhone"];?>"
                        placeholder     ="Phone"
                    /></br>
                    <input 
                        type            ="email" 
                        name            ="userEmail"
                        value           ="<?=$user["userEmail"];?>"
                        placeholder     ="Email"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="userTitle" 
                        value           ="<?=$user["userTitle"];?>"
                        placeholder     ="Job Title"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="username" 
                        value           ="<?=$user["username"];?>"
                        placeholder     ="Username"
                    /></br>
                    <input 
                        type            ="hidden" 
                        name            ="userId" 
                        value           ="<?=$user["userId"];?>"
                    />
                    <button class="btn right" type="submit">Submit</button>
                </form>
        
            <?php
                } // closes foreach statement
            ?>
        </div>
    </div><!-- closes container -->
</main>