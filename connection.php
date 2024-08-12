<?php
$host = 'localhost';
$username = 'root';
$database_name = 'todo-app';
$password = '';

$conn = mysqli_connect($host, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed, " . mysqli_connect_error());
}
// echo "Connected Successfully";

// echo "<pre><br>";
// var_dump($conn);
// echo "</pre>";