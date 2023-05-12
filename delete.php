<?php

require_once "./database.php";

$queryPrepare = $connection->prepare("SELECT * FROM contacts WHERE id = :id");
$queryPrepare->bindParam(":id", $_GET["id"]);
$queryPrepare->execute();

if ($queryPrepare->rowCount() == 0) {
  echo "ERROR 404";
} else {
  $queryPrepare = $connection->prepare("DELETE FROM contacts WHERE id = :id");
  $queryPrepare->bindParam(":id", $_GET["id"]);
  $queryPrepare->execute();
  header("Location: home.php");
}



