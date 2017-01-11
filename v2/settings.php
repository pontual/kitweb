<?php

// Set to false in production and save DB credentials in
// "db_production.php"

// Must create database manually before trying to install tables

$DEBUG = true;

if ($DEBUG) {
  // In Development Mode
  include("kitweb_v2_db_local.php");
} else {
  // In production mode
  include("../../kitweb_v2_db_production.php");
}

function getConnection($dbHost, $dbUser, $dbPassword) {
  try {
    $dbh = new PDO($dbHost, $dbUser, $dbPassword, array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $dbh;
  } catch (PDOException $e) {
    print("Error " . $e->getMessage() . "<br>");
    die();
  }
}

?>
