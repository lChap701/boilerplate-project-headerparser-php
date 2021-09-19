<?php

// Allows anyone to access this API
header("Access-Control-Origin: *");

if ($_SERVER["REQUEST_METHOD"] != "GET") return;
$part = explode("api/", $_SERVER["REQUEST_URI"]);

if ($_SERVER["REQUEST_URI"] == "/" || $_SERVER["REQUEST_URI"] == "") {
  require __DIR__ . "/views/index.html";
} else if ($_SERVER["REQUEST_URI"] == "/api/whoami" || $_SERVER["REQUEST_URI"] == "/api/whoami/") {
  echo json_encode((object)[
    "ipaddress" => $_SERVER["HTTP_X_FORWARDED_FOR"],
    "language" => $_SERVER["HTTP_ACCEPT_LANGUAGE"],
    "software" => $_SERVER["HTTP_USER_AGENT"]
  ]);
} else {
  echo "Cannot GET {$_SERVER["REQUEST_URI"]}";
}