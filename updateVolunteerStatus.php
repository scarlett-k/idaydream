<?php
//var_dump($_POST);
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//Connect to db
require ('/home/teamgrey/connect_idaydream.php');
//get the id of user and value that the admin select
$id=$_POST['id'];
$status=$_POST['status'];
    //Define and execute the query
    $sql = "UPDATE `volunteers`
                SET `active` = $status
                WHERE `volunteer_id` = $id";
    echo $sql;
    $result = mysqli_query($cnxn, $sql);
//}