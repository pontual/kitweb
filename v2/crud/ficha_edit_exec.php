<?php

require_once("common.php");

$sth = $dbh->prepare("update v2_ficha set campo = :campo, valor = :valor where id = :id");

$sth->execute([ ":campo" => $_POST['campo'],
                ":valor" => $_POST['valor'],
                ":id" => $_POST['id']]);

print("Novo campo atualizado.");

header("Location: ficha_list.php");
?>
