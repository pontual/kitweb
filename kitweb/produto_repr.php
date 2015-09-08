<?php
require('util/ptldb.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');
require_once('util/text.php');
require_once('util/smart_resize_image.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);
$produtos = getprodutos($db);

$errors = false;

// imprimir informacoes
include 'cabecalho_admin.php';

echo "Produtos que nao estao representados em nenhuma categoria\n\n";

foreach ($produtos as $produto) {    
    try {
        $query = $db->prepare("select count(*) as ct from categoria where lista like ?");
        $query->bindValue(1, "%$produto->_codigo%", PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        $ct = $result['ct'];
        if ($ct == 0) {
            echo "$produto->_codigo : $ct\n";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }   
}

