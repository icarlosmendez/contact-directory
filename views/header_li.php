<!-- Logged-in Header -->

<?php foreach($results as $employee) {?>

<header>
    <nav class="nav-wrapper blue">
        <div class="container">
            <div class="col s12 m6">
                <a href="?" class="left">
                    <img class="asc" src="../public/images/acme_logo.png" id="logo" />
                </a>
            </div>

            <div class="col s12 m4">
                <ul class="right">
                    <li class="col s12">
                        <a href='?action=logout'>Log Out</a>
                    </li>
                    <li class="col s12">
                        <a href='?action=directory'>Directory</a>
                    </li>
                    <li class="col s12">
                        <a href='?action=profile'>Welcome <?=$employee["empFName"];?>!</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php } ?><!-- closes foreach -->
