
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
                foreach($results as $contact){
            ?>
        
                <form class="wideform" action="?action=editAction" method="POST" >
                    <input 
                        type            ="text" 
                        name            ="contFName" 
                        value           ="<?=$contact["contFName"];?>"
                        placeholder     ="First Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contLName" 
                        value           ="<?=$contact["contLName"];?>"
                        placeholder     ="Last Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contCell" 
                        value           ="<?=$contact["contCell"];?>"
                        placeholder     ="Phone"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contLand" 
                        value           ="<?=$contact["contLand"];?>"
                        placeholder     ="Phone"
                    /></br>
                    <input 
                        type            ="email" 
                        name            ="contEmail"
                        value           ="<?=$contact["contEmail"];?>"
                        placeholder     ="Email"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contTitle" 
                        value           ="<?=$contact["contTitle"];?>"
                        placeholder     ="Job Title"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contCo" 
                        value           ="<?=$contact["contCo"];?>"
                        placeholder     ="Company"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contDept" 
                        value           ="<?=$contact["contDept"];?>"
                        placeholder     ="Department"
                    /></br>
                    <input 
                        type            ="hidden" 
                        name            ="contId" 
                        value           ="<?=$contact["contId"];?>"
                    />
                    <button class="btn right" type="submit">Submit</button>
                </form>
        
            <?php
                } // closes foreach statement
            ?>
        </div>
    </div><!-- closes container -->
</main>