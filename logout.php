<?php
//Start the session
session_start();

//destroy session
session_destroy();

//Redirect to login page
header("location: login.php" );