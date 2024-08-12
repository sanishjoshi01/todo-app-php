<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// var_dump($uri["path"]);

$routes = [
    "/" => "pages/main.php",
    "/login" => "pages/login.php",
    "/signup" => "pages/signup.php",
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);

    require "not-found.php";

    die();
}