<?php
require('util/db.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);
$produtos = getprodutos($db);

// fechar conexão ao DB
$db = null;

function gerar_barra() {

}

function gerar_pagina($filename, $conteudo) {
    ob_start();
    include 'cabecalho.php';
    
    print $conteudo;

    include 'rodape.php';
    file_put_contents($filename, ob_get_clean());
}

function gerar_pagina_impr($filename, $conteudo) {
    // ob_start();
    
}

// if (fotos_existem() && codigos_das_listas_existem()) {
//   foreach ($produtos as $codigo) {
//     if (!foto_mini_existe()) {
//        resize_foto();
//     }
//   }
//   gerar_index();
//   gerar_mapa();
//   gerar_mapa_impr();
//   foreach ($categorias as $categoria => $lista) {
//      gerar_categoria($categoria);
//      gerar_categoria_impr($categoria);
//   }
// }

$c = <<<END
		<div class="site_gallery">
        <span class="category_name">Chaveiros N. Sra. Aparecida</span>
		  <div class="container" id="gallery_container">
			<div id="links">
			  <ul class="products">
END;

foreach($categorias['X-Tudo'] as $codigo) {
    $c .= <<<END
        <li><a class="product_group" href="fotos/$codigo.jpg" title="Chaveiro de metal - 143200A"><img src="fotos/thumb_$codigo.jpg"><br><span class="box_codigo">$codigo (XTUDO)</a></li>
END;
}

gerar_pagina("../gerado_de_fn.html", $c);


?>
