<?php
$host = 'localhost';
$username = 'root';
$database_name = 'todo-app';
$password = '';

$conn = new mysqli($host, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed, " . mysqli_connect_error());
}
// echo "Connected Successfully";