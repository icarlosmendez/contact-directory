
<!--
Filename:  signupForm.php
Description:  This file takes user input and with adduseractAction from the userroller
adds a new useract to the database
A user can access this from the nav bar (when not logged in)
-->


<main>
    <div class="container">
        <div class="upper-spacer">
            <form class="wideform" action="?action=newUserAction" method="POST">
                <h2>Sign Up</h2>

                <div class='row'>
                    <div class="">
                        <!-- <label for="userFName">First Name</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="userFName" 
                            id              ="firstname" 
                            placeholder     ="First Name" 
                            autofocus
                         /></br>
                    </div>
                    <div class="">
                        <!-- <label for="userLName">Last Name</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="userLName" 
                            id              ="lastname" 
                            placeholder     ="Last Name" 
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="userPhone">Phone</label> -->
                        <input 
                            type            ="tel" 
                            class           ="" 
                            name            ="userPhone" 
                            id              ="phone" 
                            placeholder     ="Phone Number"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="userEmail">Email</label> -->
                        <input 
                            type            ="email" 
                            class           ="" 
                            name            ="userEmail" 
                            id              ="email" 
                            placeholder     ="Email"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="userTitle">Job Title</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="userTitle" 
                            id              ="title" 
                            placeholder     ="Job Title"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="uName">Username</label> -->
                        <input 
                            type            ="text" 
                            class           ="" 
                            name            ="username" 
                            id              ="username" 
                            placeholder     ="Username"
                        /></br>
                    </div>
                    <div class="">
                        <!-- <label for="password">Password</label> -->
                        <input 
                            type            ="password" 
                            class           ="" 
                            name            ="password" 
                            id              ="password" 
                            placeholder     ="Password"
                        /></br>
                    </div>

                    <button class="btn right" type="submit">Submit</button>

                </div>

            </form>
        </div>

    </div><!-- closes userainer -->
</main>