<?php

function getConnection($dbHost, $dbUser, $dbPassword) {
  try {
    $dbh = new PDO($dbHost, $dbUser, $dbPassword, array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $dbh;
  } catch (PDOException $e) {
    print("Error " . $e->getMessage() . "<br>");
    die();
  }
}

$dbh = getConnection($dbHost, $dbUser, $dbPassword);

?>
