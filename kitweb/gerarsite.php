<?php
require('util/db.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');
require_once('util/text.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);
$produtos = getprodutos($db);

// fechar conexão ao DB
$db = null;

function get_id($nome) {
    return preg_replace('/[^a-z]/', "", strtolower(strip_accents($nome)));
}

function gerar_barra($categorias) {
    $barra = "      <div class=\"site_sidebar\">\n        <ul>\n";
    foreach ($categorias as $nome => $categoria) {
        $nome_id = get_id($nome);
        $barra .= "          <li><a href=\"pr_{$nome_id}.html\">$nome</a></li>\n";
    }
    $barra .= "        </ul>\n";
    $barra .= <<<END
		<div class="site_footer">
		  (C) 2014
                  Pontual Exportação e<br>
                  Importação Ltda.
		</div>
      </div>

END;

    return $barra;
}

include "cabecalho_admin.php";

function gerar_pagina($filename, $conteudo) {
    print "Gerando página $filename\n";
    ob_start();
    include 'cabecalho.php';
    
    print gerar_barra($GLOBALS['categorias']);
    print $conteudo;

    include 'rodape.php';
    file_put_contents($filename, ob_get_clean());
}

function gerar_pagina_impr($filename, $conteudo) {
    print "Gerando página para impressão $filename\n";
    ob_start();
    include 'cabecalho_impr.php';
    
    print $conteudo;

    include 'rodape_impr.php';
    file_put_contents($filename, ob_get_clean());    
}

function gerar_categoria($categoria) {
    $conteudo = "$categoria";
    $nome_id = get_id($categoria);

    foreach ($GLOBALS['categorias'][$categoria] as $codigo) {
        $conteudo .= $codigo;
    }
    
    gerar_pagina("../ger_{$nome_id}.html", $conteudo);
    gerar_pagina_impr("../ger_{$nome_id}_impr.html", $conteudo);
}

//   gerar_index();
//   gerar_mapa();
//   gerar_mapa_impr();
//   foreach ($categorias as $categoria => $lista) {
//      gerar_categoria($categoria);
//   }

gerar_categoria("Alicates");

/*
  $c = <<<END
		<div class="site_gallery">
        <span class="category_name">Chaveiros N. Sra. Aparecida</span>
		  <div class="container" id="gallery_container">
			<div id="links">
			  <ul class="products">
END;

foreach($categorias['X-Tudo'] as $codigo) {
    $c .= <<<END
        <li><a class="product_group" href="fotos/$codigo.jpg"><img src="fotos/thumb_$codigo.jpg">{$produtos[$codigo]->_descricao}<br><span class="box_codigo">$codigo</a></li>
END;
}

gerar_pagina("../gerado.html", $c);
*/

?>
