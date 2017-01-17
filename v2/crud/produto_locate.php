<?php

require_once("get_dbh.php");

$sql = 'select id from v2_produto where codigo = :codigo';
$sth = $dbh->prepare($sql);
$sth->execute([ ":codigo" => strtoupper($_POST['codigo'])]);
$result = $sth->fetch();

header("Location: produto_edit_form.php?id={$result['id']}");
