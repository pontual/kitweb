<p>
    <?php

    require_once("settings.php");
    require_once("tables.php");

    $dbh = getConnection($dbHost, $dbUser, $dbPassword);

    function tableExistsP($dbh, $tableName) {
      $stmt = $dbh->prepare("show tables like '$tableName'");
      $stmt->execute();
      return $stmt->rowCount() !== 0;
    }

    function dropTable($dbh, $tableName, $columns) {
      if (tableExistsP($dbh, $tableName)) {
        try {
          $dbh->exec("drop table $tableName");
          print("Table $tableName dropped");
        } catch (PDOException $e) {
          print("Error " . $e->getMessage() . "<br>");
        }
      } else {
        print("Table $tableName does not exist");
      }
      print("<br>");
    }

    if ($DEBUG) {
      foreach ($TABLES as $tableName => $columns) {
        dropTable($dbh, $tableName, $columns);
      }
    } else {
      print("Enable debug mode to drop all tables.");
    }

    print("Completed dropping tables");
    ?>
