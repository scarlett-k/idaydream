<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


//Start a session
session_start();


//If the user is already logged in
if (isset($_SESSION['username'])) {
    //Redirect to page 1
    header('location: adminHome.php');
}

//If the login form has been submitted
if (isset($_POST['submit'])) {

    //Include creds.php (eventually, passwords should be moved to a secure location
    //or stored in a database)
    include("creds.php");

    //Get the username and password from the POST array

    $username = $_POST['username'];
    $password = $_POST['password'];


    //If the username and password are correct
    if ($logins[$username] == $password) {
        //Store login name in a session variable
        $_SESSION['username'] = $username;

        //Redirect to page 1
        header('location: adminHome.php');

    } else { //Login credentials are incorrect
        header('location: login.php');
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Log In</title>
</head>
<body>

<div>
    <?php
    include "header.php";
    ?>
    <h1>Admin Login</h1>
    <form method="post" action="">
        <label>Username:
            <input type="text" name="username">
        </label><br>

        <label>Password:
            <input type="password" name="password">
        </label><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>
</html>
