<?php

require("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])) {
    $task = $_POST["task"];
    $user_id = $_POST["user-id"];

    $query = "INSERT INTO items (task_name, user_id) VALUES ('$task', '$user_id')";
    mysqli_query($conn, $query);

    // echo "Inserted successfully";     
    header('Location: ' . "/");
}