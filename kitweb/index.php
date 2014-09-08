<?php
require('util/db.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');
require_once('util/text.php');
require_once('util/smart_resize_image.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);
$produtos = getprodutos($db);

// fechar conexão ao DB
$db = null;

$errors = false;

// imprimir informacoes
include 'cabecalho_admin.php';

foreach ($produtos as $produto) {
    if (!file_exists("../fotos/$produto->_codigo.jpg")) {
        print "Atenção: Foto para $produto->_codigo não encontrada\n";
        $errors = true;
    }
    else {
        if (!file_exists("../fotos/thumb_$produto->_codigo.jpg")) {
            print "Criando miniatura para $produto->_codigo\n";
            smart_resize_image("../fotos/$produto->_codigo.jpg",
                               null, 200, 150, true,
                               "../fotos/thumb_$produto->_codigo.jpg",
                               false, false, 100);
        }
    }
}

foreach ($categorias as $categoria => $lista) {
    foreach ($lista as $codigo) {
        if (strlen($codigo) > 5) {
            if (!array_key_exists($codigo, $produtos)) {
                print "Atenção: Código $codigo na categoria $categoria não está na tabela de produtos\n";
                $errors = true;
            }
        }
    }
}

?>

<?php
if (!$errors) {
?>

<a href="gerarsite.php">Clique aqui para gerar site</a>

<?php
}
?>