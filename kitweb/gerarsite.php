<?php

// use util/ptldb.php for production

require('util/ptldb.php');

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

function gerar_barra($prefixo, $categorias) {
	$barra = "		<div class=\"site_sidebar\">\n		  <ul>\n";
	foreach ($categorias as $nome => $categoria) {
		$nome_id = get_id($nome);
		$barra .= "			 <li><a href=\"{$prefixo}pr_{$nome_id}.html\">$nome</a></li>\n";
	}
	$barra .= "		   </ul>\n";
	$barra .= <<<END
		<div class="site_footer">
		  (C) 2014
				  Pontual Exportação e<br>
				  Importação Ltda.
		</div> <!-- end site_footer -->
	  </div> <!-- end site_sidebar -->

END;

	return $barra;
}

include "cabecalho_admin.php";

function gerar_pagina($prefixo, $name, $conteudo, $categorias) {
	print "Gerando página $name\n";
	ob_start();
	include 'cabecalho.php';

	print '	 <div class="site_body_container">' . "\n";
	print gerar_barra($prefixo, $categorias);
	print '<!--' . date('d/m/y H:i:s') . '-->';
	print '	   <div class="site_content">' . "\n";

	
	// gerar link para pagina para impressao
	if ($name != 'index') {
		$impr_link = <<<END
		<br>
		<div style="float:left; margin-left:10px; margin-right:10px;">
			 <i><a href="{$prefixo}{$name}_impr.html">Página para impressão</a></i>
        </div>
        <br>    
END;
		print $impr_link;
	}
	
	
	print $conteudo;

	print '	   </div> <!-- end site_content -->' . "\n";
	print '	 </div> <!-- end site_body_container -->' . "\n";

	include 'rodape.php';
	file_put_contents("../" . $prefixo . $name . ".html" , ob_get_clean());
}

function gerar_pagina_impr($prefixo, $name, $conteudo) {
	print "Gerando página para impressão $name\n";

	ob_start();
	include 'cabecalho_impr.php';

	print '<!--' . date('d/m/y H:i:s') . '-->';
	print '	   <div class="site_content">' . "\n";
	
	print $conteudo;

	print '	   </div> <!-- end site_content -->' . "\n";
	
	include 'rodape_impr.php';
	file_put_contents("../" . $prefixo . $name . "_impr.html", ob_get_clean());	 
}

function gerar_categoria($prefixo, $categoria, $categorias, $lista_produtos) {
	$nome_id = get_id($categoria);

    $conteudo = <<<END
        <div class="site_gallery">
          <span class="category_name">$categoria</span>
          <div class="container" id="gallery_container">
            <div id="links">
              <ul class="products">
END;
    
	foreach ($categorias[$categoria] as $codigo) {
		if (strlen($codigo) > 5) {		
			$conteudo .= <<<END
                <li>
				<a class="product_group" href="fotos/$codigo.JPG" title="$codigo<br>{$lista_produtos[$codigo]->_descricao} ({$lista_produtos[$codigo]->_dimensoes} cm)">
                <img src="fotos/thumb_$codigo.JPG" alt="$codigo"><br>
				<span class="box_codigo">&nbsp;&nbsp;$codigo&nbsp;&nbsp;</span><br>
                {$lista_produtos[$codigo]->_descricao}</a>

                <!--
                <br>
				{$lista_produtos[$codigo]->_dimensoes} cm
                -->
                
     		    </li>
END;
            
        }
	}

    $conteudo .= <<<END
              </ul>
            </div> <!-- links -->
          </div> <!-- gallery_container -->
        </div> <!-- site_gallery -->
END;
    
	gerar_pagina($prefixo, "pr_" . $nome_id, $conteudo, $categorias);
    gerar_pagina_impr($prefixo, "pr_" . $nome_id, $conteudo);
}

// GERAR PAGINAS
function gerar_tudo($prefixo, $categorias, $produtos) {
	gerar_pagina($prefixo, "index", file_get_contents('static/index_conteudo.html'), $categorias);
    
	gerar_pagina($prefixo, "mapa", file_get_contents('static/mapa_conteudo.html'), $categorias);
	gerar_pagina_impr($prefixo, "mapa", file_get_contents('static/mapa_conteudo.html'));

    foreach ($categorias as $categoria => $lista) {
    	gerar_categoria($prefixo, $categoria, $categorias, $produtos);
    }
}

if (isset($_GET['debug'])) {
    $PREFIXO = "debug_";
}
else {
    $PREFIXO = "";
}

echo "Usando prefixo $PREFIXO\n\n"; 
gerar_tudo($PREFIXO, $categorias, $produtos);

?>
