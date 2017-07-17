
<!--
Filename:  signinForm.php
Description:  This file takes user input to verify username & password against database
A user can access this from the nav bar (when not logged in)
-->

<main>
    <div class="container">

        <div class="upper-spacer">
            <form class="wideform" action="?action=signinAction" method="POST">
                <h2>Sign In</h2>

                <div class="">
                    <!-- <label for="username">Username</label> -->
                    <input type="text" class="" name="uName" id="username" placeholder="Username" autofocus>
                </div>

                <div class="">
                    <!-- <label for="password">Password</label> -->
                    <input type="password" class="" name="password" id="password" placeholder="Password">
                </div>

                <button class="btn waves-effect right" type="submit">Submit</button>

            </form>
        </div>

    </div>
</main>


