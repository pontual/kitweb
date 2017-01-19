<?php

function printCategoriaOptions($dbh) {
  // Retrieve all categorias
  
  $sql = "select id, nome from v2_categoria order by nome";
  $sth = $dbh->prepare($sql);
  $sth->execute();
  $categorias = $sth->fetchAll();

  foreach ($categorias as $categoria) {
    print("<option value='{$categoria['id']}'>{$categoria['nome']}</option>");
  }
}
