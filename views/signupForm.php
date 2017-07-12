
<!--
Filename:  signupForm.php
Description:  This file takes user input and with addEmployeeAction from the controller
adds a new employee to the database
A user can access this from the nav bar (when not logged in)
-->

<main>
    <div class="container">

        <div class="upper-spacer">
            <form class="wideform" action="?action=addEmployeeAction" method="POST">
                <h2>Sign Up</h2>

                <div class='row'>
                    <div class="">
                        <!-- <label for="empFName">First Name</label> -->
                        <input type="text" class="" name="empFName" id="firstname" placeholder="First Name" autofocus /></br>
                    </div>
                    <div class="">
                        <!-- <label for="empLName">Last Name</label> -->
                        <input type="text" class="" name="empLName" id="lastname" placeholder="Last Name" /></br>
                    </div>
                    <div class="">
                        <!-- <label for="empPhone">Phone</label> -->
                        <input type="tel" class="" name="empPhone" id="" placeholder="Phone Number"/></br>
                    </div>
                    <div class="">
                        <!-- <label for="empEmail">Email</label> -->
                        <input type="email" class="" name="empEmail" id="" placeholder="Email"/></br>
                    </div>
                    <div class="">
                        <!-- <label for="uName">Username</label> -->
                        <input type="text" class="" name="uName" id="" placeholder="Username"/></br>
                    </div>
                    <div class="">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" class="" name="password" id="" placeholder="Password"/></br>
                    </div>

                    <button class="btn waves-effect right" type="submit">Submit</button>

                </div>

            </form>
        </div>

    </div><!-- closes container -->
</main>