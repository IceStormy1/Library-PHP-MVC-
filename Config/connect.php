<?php

$serverName = "localhost";
$database = "digitaldatabase";
$username = "mysql";
$password = "";

$connection = mysqli_connect($serverName, $username, $password, $database);

if(!$connection){
    die("Connection failed.". mysqli_connect_error());
}

//echo "Connected succesfully";