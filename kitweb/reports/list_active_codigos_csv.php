<?php

require('../../../ptldb.php');

require_once('../util/carregarprodutos.php');

$db = getconnection();
$categorias = getcategorias($db);
$produtos = getprodutos($db);

$db = null;

$active_codigos = [];

foreach ($categorias as $categoria => $lista) {
    foreach ($lista as $codigo) {
        if (!in_array($codigo, $active_codigos) && strlen($codigo) >= 6) {
            $active_codigos[] = $codigo;
        }
    }
}

array_multisort($active_codigos);

foreach ($active_codigos as $codigo) {
    print("$codigo,{$produtos[$codigo]->_descricao}\n");
}
?>
