<?php
$localhost="localhost";
$username="root";
$password="";
$database="crud";
$connection=mysqli_connect($localhost, $username, $password, $database);
if ($connection) {
    echo("connection eastablished");
} else {
    echo("connection failed: " . mysqli_connect_error());
}
?>