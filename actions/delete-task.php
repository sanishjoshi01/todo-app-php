<?php
require("../connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM items WHERE id = $id";
    mysqli_query($conn, $query);

    // var_dump($id);

    header('Location: ' . "/");
}