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
          print("DROPPED table $tableName");
        } catch (PDOException $e) {
          print("Error " . $e->getMessage() . "<br>");
        }
      } else {
        print("DOES NOT EXIST: Table $tableName");
      }
      print("<br>");
    }

    if ($DEBUG) {
      foreach (array_reverse($TABLES) as $tableName => $columns) {
        dropTable($dbh, $tableName, $columns);
      }
      print("Completed dropping tables");
    } else {
      print("Switch to debug mode to drop all tables.");
      
    }

    ?>
