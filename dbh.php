<?php

//connect to database using mysqli
$db = mysqli_connect("localhost", "username", "password", "rojasg5_bobmusic_db");

if(!$db) 
{
    die("Connection failed: ".mysqli_connect_error());
}
?>
