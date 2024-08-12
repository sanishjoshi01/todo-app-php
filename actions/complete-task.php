<?php
require("../connection.php");

if (isset($_POST['id']) && isset($_POST['is_completed'])) {
    $id = $_POST['id'];
    $is_completed = $_POST['is_completed'];

    $query = "UPDATE items SET is_completed = $is_completed WHERE id = $id";
    mysqli_query($conn, $query);

    header('Location: ' . "/");
}