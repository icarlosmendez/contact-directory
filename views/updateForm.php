
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
                foreach($results as $cont){
            ?>
        
                <form class="wideform" action="?action=editAction" method="POST" >
                    <input 
                        type            ="text" 
                        name            ="contFName" 
                        value           ="<?=$cont["contFName"];?>"
                        placeholder     ="First Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contLName" 
                        value           ="<?=$cont["contLName"];?>"
                        placeholder     ="Last Name"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contPhone" 
                        value           ="<?=$cont["contPhone"];?>"
                        placeholder     ="Phone"
                    /></br>
                    <input 
                        type            ="email" 
                        name            ="contEmail"
                        value           ="<?=$cont["contEmail"];?>"
                        placeholder     ="Email"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contTitle" 
                        value           ="<?=$cont["contTitle"];?>"
                        placeholder     ="Job Title"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contCo" 
                        value           ="<?=$cont["contCo"];?>"
                        placeholder     ="Company"
                    /></br>
                    <input 
                        type            ="text" 
                        name            ="contDept" 
                        value           ="<?=$cont["contDept"];?>"
                        placeholder     ="Department"
                    /></br>
                    <input 
                        type            ="hidden" 
                        name            ="contId" 
                        value           ="<?=$cont["contId"];?>"
                    />
                    <button class="btn waves-effect right" type="submit">Submit</button>
                </form>
        
            <?php
                } // closes foreach statement
            ?>
        </div>
    </div><!-- closes container -->
</main>