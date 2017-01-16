<?php

require_once("common.php");

// check if campo already exists

$sth = $dbh->prepare("select count(*) as ct from v2_ficha where campo = :campo");
$sth->execute([":campo" => $_POST["campo"]]);
$result = $sth->fetch();

if ((int) $result['ct'] === 0) {

  $sth = $dbh->prepare("insert into v2_ficha (campo, valor)
  values (:campo, :valor)");

  $sth->execute([ ":campo" => $_POST['campo'],
                  ":valor" => $_POST['valor'] ]);

  print("Novo campo inserido.");

  header("Location: ficha_list.php");
} else {
  print("Campo já existe. Para usar mais de um valor, separe-os com barras (/) ou outros símbolos.<br><br><a href='javascript:history.back();'>Voltar</a>");
}
?>
