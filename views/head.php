<?php
    // Set at 86,400 seconds, allows the user to browse your application for 24 hours before needing to re-authenticate their session.
    ini_set('session.gc_maxlifetime', 86400);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Database</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/dist/main.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--script type="text/javascript">
        // Initialize collapse button
        $(".button-collapse").sideNav({
          menuWidth: 300, // Default is 240
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
    </script-->

</head>
<body class="content">