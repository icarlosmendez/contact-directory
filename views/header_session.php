<!-- Logged-in Header -->

<?php foreach($results as $user) {?>

<header>
    <nav class="nav-wrapper blue">
        <div class="container">
            <div class="col s12 m6">
                <a href="?" class="left">
                    <img class="asc" src="../public/images/247_logo.svg" id="logo" />
                </a>
            </div>

            <div class="col s12 m4">
                <ul class="right">
                    <li class="col s12">
                        <a href='?action=signout'>Sign Out</a>
                    </li>
                    <li class="col s12">
                        <a href='?action=directory'>Directory</a>
                    </li>
                    <li class="col s12">
                        <a href='?action=viewProfileUser'>Welcome <?=$user["userFName"];?>!</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php } ?><!-- closes foreach -->
