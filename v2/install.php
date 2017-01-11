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

    function createTable($dbh, $tableName, $columns) {
      if (!tableExistsP($dbh, $tableName)) {
        try {
          $dbh->exec("create table if not exists $tableName
        ($columns) engine=InnoDB");
          print("Table $tableName created");
        } catch (PDOException $e) {
          print("Error " . $e->getMessage() . "<br>");
        }
      } else {
        print("Table $tableName already exists");
      }
      print("<br>");
    }

    foreach ($TABLES as $tableName => $columns) {
      createTable($dbh, $tableName, $columns);
    }

    print("Completed installation");
    ?>
