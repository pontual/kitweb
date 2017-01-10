<?php
$DEBUG = true;

if ($DEBUG) {
  // echo "Using Development Mode";
  include("db_local.php");
} else {
  // echo "In production mode";
  include("db_production.php");
}

echo $DB_MODE;
?>
