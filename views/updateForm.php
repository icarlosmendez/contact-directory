
<!--
// filename:  update_form.php
// directed from: ($_GET["action"]=="update") (#8 on controllers/Action_Controller.php)
// $data = $employees->getEmployee($_SESSION["empId"]);
// method="POST"
// action ="?action=editAction" with empId (#9 on controllers/Action_Controller.php)
-->

<main>
    <div class="container">
        <div class="upper-spacer">
            <h3>Update Profile Information</h3>
        
            <?php
                foreach($results as $emp){
            ?>
        
                <form action="?action=editAction" method="POST" >
                    <input type="text" name ="empFName" value="<?=$emp["empFName"];?>"/></br>
                    <input type="text" name ="empLName" value="<?=$emp["empLName"];?>"/></br>
                    <input type="text" name ="empPhone" value="<?=$emp["empPhone"];?>"/></br>
                    <input type="text" name ="empEmail" value="<?=$emp["empEmail"];?>"/></br>
                    <input type="hidden" name="empId" value="<?=$emp["empId"];?>"/>
                    <button class="btn waves-effect right" type="submit">Submit</button>
                </form>
        
            <?php
                } // closes foreach statement
            ?>
        </div>
    </div><!-- closes container -->
</main>