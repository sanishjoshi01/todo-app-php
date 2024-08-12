<?php
require("../connection.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count === 1) {
        session_start();

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            header("Location: " . "/");
        }
    } else {
        header("Location: " . "/login?err=User not recognised!!!");
    }
}
