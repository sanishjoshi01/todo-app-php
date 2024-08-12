<?php
require("../connection.php");

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        header("Location: " . "/signup?err=Email already in use!&name=" . $name . "&email=" . $email);
    } else {
        if (strlen($pass) >= 8) {
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";

            mysqli_query($conn, $query);

            header("Location: " . "/login?msg=Registered Successfully! Login to continue");
        } else {
            header("Location: " . "/signup?err=Password must be greater than 8 characters&name=" . $name . "&email=" . $email);
        }
    }
}
