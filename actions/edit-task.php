<?php
require("../connection.php");

if (isset($_POST['id']) && isset($_POST['task_name'])) {
    $id = $_POST['id'];
    $task_name = trim($_POST['task_name']);

    $query = "UPDATE items SET task_name = '$task_name' WHERE id = $id";
    mysqli_query($conn, $query);

    header('Location: ' . "/");
}