<?php

$host = "localhost";
$database = "contacts_app";
$user = "root";
$password = "";

try {
  $connection = new PDO("mysql:host=$host;dbname=$database",$user,$password);
} catch (Throwable $th) {
  die("Tiro error" . $th->getMessage());
}

