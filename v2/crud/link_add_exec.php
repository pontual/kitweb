<?php

require_once("get_dbh.php");

$idPasta = $_POST["id_pasta"];
$idCategoria = $_POST["id_categoria"];
$nome = $_POST["nome"];

// check if link already exists
$sth = $dbh->prepare("select count(*) as ct from v2_link where id_pasta = :id_pasta and id_categoria = :id_categoria");

$sth->execute([ ":id_pasta" => $idPasta,
                ":id_categoria" => $idCategoria ]);
$result = $sth->fetch();

if ((int) $result['ct'] === 0) {

  $sth = $dbh->prepare("insert into v2_link (id_pasta, id_categoria, nome)
  values (:id_pasta, :id_categoria, :nome)");

  $sth->execute([ ":id_pasta" => $idPasta,
                  ":id_categoria" => $idCategoria,
                  ":nome" => $nome ]);

  header("Location: pasta_edit_form.php?id=$idPasta");
} else {

  require_once("html_head_navbar.php");
  
  print("Link já existe. <a href='javascript:history.back();'>Voltar</a>");

  require_once("footer.php");
}
?>
