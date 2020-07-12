<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "newdb";

$conn = mysqli_connect("localhost","labib","12345","newdb");
if (!$conn) {
    echo "Connection bad: " ;
}

?>