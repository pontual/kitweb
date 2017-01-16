<?php

require_once("common.php");

// check if codigo already exists

$sth = $dbh->prepare("select count(*) as ct from v2_produto where codigo = :codigo");
$sth->execute([":codigo" => $_POST['codigo']]);
$result = $sth->fetch();

if ((int) $result['ct'] === 0) {

  $sth = $dbh->prepare("insert into v2_produto (codigo, descricao, peso, medidas, preco)
  values (:codigo, :descricao, :peso, :medidas, :preco)");

  $sth->execute([ ":codigo" => $_POST['codigo'],
                  ":descricao" => $_POST['descricao'],
                  ":peso" => $_POST['peso'],
                  ":medidas" => $_POST['medidas'],
                  ":preco" => $_POST['preco'] ]);

  print("Novo produto inserido.");

  // upload foto and create thumbnail

  $uploadfile = $fotos_folder . $_POST['codigo'] . ".jpg";
  $thumbfile = $fotos_folder . $_POST['codigo'] . "_thumb.jpg";

  $check = getimagesize($_FILES["arquivo_foto"]["tmp_name"]);
  if ($check !== false) {
    move_uploaded_file($_FILES["arquivo_foto"]["tmp_name"], $uploadfile);

    // create thumbnail
    smart_resize_image($uploadfile, null, 200, 150, true, $thumbfile, false, false, 100);
  }

  // header("Location: produto_list.php");
} else {
  print("Código já existe. <a href='javascript:history.back();'>Voltar</a>");
}

?>
