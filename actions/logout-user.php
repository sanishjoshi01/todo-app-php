<?php
session_start();

if (isset($_SESSION['name'])) {
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);

    session_destroy();

    header('Location: ' . "/login");
}