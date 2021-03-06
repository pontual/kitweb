<?php
require('../../ptldb.php');

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
    if (!file_exists("../fotos/$produto->_codigo.JPG")) {
        if (file_exists("../fotos/$produto->_codigo.jpg")) {
            copy("../fotos/$produto->_codigo.jpg", "../fotos/$produto->_codigo.JPG");
            chmod("../fotos/$produto->_codigo.JPG", 0644);
        }
        elseif (file_exists("../fotos/$produto->_codigo.Jpg")) {
            copy("../fotos/$produto->_codigo.Jpg", "../fotos/$produto->_codigo.JPG");
            chmod("../fotos/$produto->_codigo.JPG", 0644);
        }
        else {
            print "Atenção: Foto para $produto->_codigo não encontrada\n";
            $errors = true;
        }
    }

    if (file_exists("../fotos/$produto->_codigo.JPG") && !file_exists("../fotos/thumb_$produto->_codigo.JPG")) {
        print "Criando miniatura para $produto->_codigo\n";
        flush();
        ob_flush();
        smart_resize_image("../fotos/$produto->_codigo.JPG",
                           null, 200, 150, true,
                           "../fotos/thumb_$produto->_codigo.JPG",
                           false, false, 100);
        chmod("../fotos/thumb_$produto->_codigo.JPG", 0644);
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

function comparar_categorias($categorias, $nome_a, $nome_b) {
    print("Comparando $nome_a com $nome_b\n");
    $diferenca = strcmp(join(",", $categorias[$nome_a]), join(",", $categorias[$nome_b]));
    if ($diferenca != 0) {
        print("Atencao: Listas de $nome_a e $nome_b nao correspondem\n");
    }
    return $diferenca;
}

if (comparar_categorias($categorias, 'Squeezes', 'Cantis') != 0) {
    $errors = true;
}

if (comparar_categorias($categorias, 'Squeezes', 'Garrafas') != 0) {
    $errors = true;
}

if (comparar_categorias($categorias, 'Ferramentas', 'Kits Ferramenta') != 0) {
    $errors = true;
}

if (comparar_categorias($categorias, 'Kits Pinceis', 'Pinceis para Maquiagem') != 0) {
    $errors = true;
}
?>

<?php
if (!$errors) {
?>

<a href="produto_repr.php">Verificar que cada produto esteja em pelo menos uma categoria</a>
    
<a href="https://phpmyadmin.locaweb.com.br/" target="_blank">Acessar banco de dados</a>

Atenção: Recarregue esta página depois de alterar o banco de dados para fazer a verificação.

As páginas podem demorar alguns minutos para serem atualizadas devido ao cache.

<a href="gerarsite.php?debug=1">Clique aqui para criar paginas para verificação "debug_index.html"</a>

<a href="gerarsite.php">Clique aqui para gerar site</a>

<?php
}
?>
