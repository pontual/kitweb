<?php

require_once("common.php");

$sth = $dbh->prepare("insert into v2_ficha (campo, valor)
  values (:campo, :valor)");

$sth->execute([ ":campo" => $_POST['campo'],
                ":valor" => $_POST['valor'] ]);

print("Novo campo inserido.");

header("Location: ficha_list.php");
?>
