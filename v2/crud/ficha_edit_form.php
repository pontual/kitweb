<?php

$pageTitle = "Editar campo de Ficha";

require_once("common.php");


if (isset($_GET['id'])) {
  
  $sql = 'select id, campo, valor from v2_ficha where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);
  $result = $sth->fetch();
  
  print(generateEditForm("ficha_edit_exec.php", [
    "id" => [ "name" => "id", "value" => $result['id'] ],
    "Campo" => [ "name" => "campo", "value" => $result['campo'] ],
    "Valor" => [ "name" => "valor", "value" => $result['valor'] ] ]));

} else {
  print("Nenhum id solicitado.");
}

  require_once("footer.php");
  
?>
