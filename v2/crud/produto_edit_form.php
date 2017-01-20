<?php

$pageTitle = "Editar Produto";

require_once("common.php");


if (isset($_GET['id'])) {
  $sql = 'select id, codigo, descricao, peso, medidas, preco, atualizado from v2_produto where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);
  $result = $sth->fetch();

  print("<h3>{$result['codigo']}</h3>");
  
  print("<img src='$fotos_folder{$result['codigo']}_{$result['atualizado']}_thumb.jpg' alt='foto miniatura'>");
  
  print(generateEditForm("produto_edit_exec.php", true, [
    "Código" => [ "name" => "codigo", "value" => $result['codigo'] ],
    "Descrição" => [ "name" => "descricao", "value" => $result['descricao'] ], 
    "Peso" => [ "name" => "peso", "value" => $result['peso'] ], 
    "Medidas" => [ "name" => "medidas", "value" => $result['medidas'] ], 
    "Preço" => [ "name" => "preco", "value" => $result['preco'] ],

    "fileLink" => [ "name" => "Atualizar foto", "value" => "arquivo_foto"] ],

                         [ "id" => $result['id'],
                           "codigoAntigo" => $result['codigo'] ]));
                         

} else {
  print("Nenhum id solicitado.");
}

  require_once("footer.php");
  
?>
