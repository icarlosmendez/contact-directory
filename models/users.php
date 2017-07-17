<?php

    // database access environmental variables
    // these variables are used throught the Contacts class
    $psalt  = getenv('DB_PSALT'); 
    $host   = getenv('DB_HOST');
    $name   = getenv('DB_NAME');
    $port   = getenv('DB_PORT');
    $char   = getenv('DB_CHAR');
    $uname  = getenv('DB_USER');
    $pword  = getenv('DB_PASS');

    $_USER;
    // var_dump($name);

// Create "Users" Class (aka object)

class Users{ 


} // closes class Users

?>