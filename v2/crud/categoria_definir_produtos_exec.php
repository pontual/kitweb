<?php

require_once("get_dbh.php");
require_once("lista_de_produtos_sql.php"); 

$idCategoria = $_POST["id"];
$listaString = $_POST["lista"];
$lista = explode("\n", trim($listaString));

$hasErrors = false;

deleteProdutos($dbh, $idCategoria);

foreach ($lista as $produto) {
  $produtoExists = insertProduto($dbh, $idCategoria, strtoupper(trim($produto)));
  if (!$produtoExists) {
    $hasErrors = true;
  }
}

if ($hasErrors) {
  require_once("html_head_navbar.php");
} else {
  header("Location: categoria_list.php");
}

?>
