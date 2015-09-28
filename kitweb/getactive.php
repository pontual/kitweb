<?php

require('../../ptldb.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');
require_once('util/text.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);
$produtos = getprodutos($db);

// fechar conexão ao DB
$db = null;

include 'cabecalho_admin.php';

foreach ($categorias as $lista) {
    foreach ($lista as $codigo) {
        if (strlen($codigo) > 5) {
            echo "$codigo\n";
        }
    }
}

?>
