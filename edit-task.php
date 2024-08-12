<?php

require("connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    var_dump($id);

    // header('Location: ' . "/");
}
