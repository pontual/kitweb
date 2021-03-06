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
  include(dirname(__FILE__) . "/../../kitweb_v2_db_production.php");
}

$fotos_folder = "../../fotos/";
$fotos_filesystem= dirname(__FILE__) . "/../fotos/";
$thumbWidth = 200;
$thumbHeight = 150;

?>
