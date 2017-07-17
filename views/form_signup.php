
<!--
Filename:  signupForm.php
Description:  This file takes user input and with addContactAction from the controller
adds a new contact to the database
A user can access this from the nav bar (when not logged in)
-->


<main>
    <div class="container">
        <div class="upper-spacer">
            <form class="wideform" action="?action=addContactAction" method="POST">
                <h2>Sign Up</h2>

                <div class='row'>
                    <div class="">
                        <!-- <label for="contFName">First Name</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="contFName" 
                            id              ="firstname" 
                            placeholder     ="First Name" 
                            autofocus
                         /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contLName">Last Name</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="contLName" 
                            id              ="lastname" 
                            placeholder     ="Last Name" 
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contPhone">Phone</label> -->
                        <input 
                            type            ="tel" 
                            class           ="" 
                            name            ="contPhone" 
                            id              ="" 
                            placeholder     ="Phone Number"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contEmail">Email</label> -->
                        <input 
                            type            ="email" 
                            class           ="" 
                            name            ="contEmail" 
                            id              ="" 
                            placeholder     ="Email"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contTitle">Job Title</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="contTitle" 
                            id              ="" 
                            placeholder     ="Job Title"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contCo">Company</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="contCo" 
                            id              ="" 
                            placeholder     ="Company"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="contDept">Department</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="contDept" 
                            id              ="" 
                            placeholder     ="Department"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="uName">Username</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="uName" 
                            id              ="" 
                            placeholder     ="Username"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="password">Password</label> -->
                        <input 
                            type            ="password" 
                            class           ="" 
                            name            ="password" 
                            id              ="" 
                            placeholder     ="Password"
                        /></br>
                    </div>

                    <button class="btn waves-effect right" type="submit">Submit</button>

                </div>

            </form>
        </div>

    </div><!-- closes container -->
</main>