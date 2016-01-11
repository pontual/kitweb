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

function get_id($nome) {
	return preg_replace('/[^a-z]/', "", strtolower(strip_accents($nome)));
}

function gerar_barra($prefixo, $categorias) {
	$barra = "		<div class=\"site_sidebar\">\n		  <ul>\n <li><a href=\"busca.html\"><b><i>Busca por código</i></b></a></li>\n";
	foreach ($categorias as $nome => $categoria) {
		$nome_id = get_id($nome);
		$barra .= "			 <li><a href=\"{$prefixo}pr_{$nome_id}.html\">$nome</a></li>\n";
	}
	$barra .= "		   </ul>\n";
	$barra .= <<<END
		<div class="site_footer">
		  (C) 2016
				  Pontual Exportação e<br>
				  Importação Ltda.
		</div> <!-- end site_footer -->
	  </div> <!-- end site_sidebar -->

END;

	return $barra;
}

include "cabecalho_admin.php";

function gerar_pagina($prefixo, $name, $conteudo, $categorias, $title) {
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
    chmod("../" . $prefixo . $name . ".html", 0644);
}

function gerar_pagina_impr($prefixo, $name, $conteudo, $title) {
	print "Gerando página para impressão $name\n";

	ob_start();
	include 'cabecalho_impr.php';

	print '<!--' . date('d/m/y H:i:s') . '-->';
	print '	   <div class="site_content">' . "\n";
	
	print $conteudo;

	print '	   </div> <!-- end site_content -->' . "\n";
	
	include 'rodape_impr.php';
	file_put_contents("../" . $prefixo . $name . "_impr.html", ob_get_clean());
    chmod("../" . $prefixo . $name . "_impr.html", 0644);
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
    
	gerar_pagina($prefixo, "pr_" . $nome_id, $conteudo, $categorias, $categoria);
    gerar_pagina_impr($prefixo, "pr_" . $nome_id, $conteudo, $categoria);
}

function gerar_busca_js($produtos) {
    ob_start();

    $conteudo = <<<'END'
angular.module('BuscaProdutoApp', [])
  .controller('BuscaProdutoController', function($scope) {
    $scope.produtos = [
END;

foreach ($produtos as $codigo => $produto) {
    $conteudo .= "{ codigo: '$codigo', caption: '{$produtos[$codigo]->_descricao}', captionSemAcentos: '" . strip_accents($produtos[$codigo]->_descricao) . "', dimensions: '({$produtos[$codigo]->_dimensoes} cm)' },\n";
}

$conteudo .= <<<'END'
    ];
    
    $scope.enteredKonamiCode = false;
    $scope.checkKonamiCode = function(codigo) {
        if (codigo === 'konami') {
            $scope.enteredKonamiCode = true;
            $scope.buscaCodigoTexto = '';
        }
    };
    
    $scope.produtoCorresponde = function(codigoProduto, descricaoProduto, descricaoProdutoSemAcentos, buscaCodigoProduto, buscaDescricaoProduto) {
        buscaCodigoProduto = buscaCodigoProduto || "";
        buscaDescricaoProduto = buscaDescricaoProduto || "";
        
        produtoCorresponde = codigoProduto.indexOf(buscaCodigoProduto.toUpperCase()) > -1;
        descricaoCorresponde = (descricaoProduto.toLowerCase().indexOf(buscaDescricaoProduto.toLowerCase()) > -1 || descricaoProdutoSemAcentos.toLowerCase().indexOf(buscaDescricaoProduto.toLowerCase()) > -1);

      if (buscaCodigoProduto === '') {
        produtoCorresponde = true;
      }
      if (buscaDescricaoProduto === '') {
        descricaoCorresponde = true;
      }

        return produtoCorresponde && descricaoCorresponde;
    };
  });
END;
print $conteudo;

    file_put_contents("../js/buscaprodutoapp.js", ob_get_clean());
    chmod("../js/buscaprodutoapp.js", 0644);
}

// GERAR PAGINAS
function gerar_tudo($prefixo, $categorias, $produtos) {
	gerar_pagina($prefixo, "index", file_get_contents('static/index_conteudo.html'), $categorias, "Home");
    
	gerar_pagina($prefixo, "mapa", file_get_contents('static/mapa_conteudo.html'), $categorias, "Como Chegar");
	gerar_pagina_impr($prefixo, "mapa", file_get_contents('static/mapa_conteudo.html'), "Como Chegar");

    gerar_pagina($prefixo, "busca", file_get_contents('static/busca_conteudo.html'), $categorias, "Busca por código");
    gerar_pagina_impr($prefixo, "busca", file_get_contents('static/busca_conteudo.html'), "Busca por código");
    

    foreach ($categorias as $categoria => $lista) {
    	gerar_categoria($prefixo, $categoria, $categorias, $produtos);
    }

    // ATUALIZAR DADOS NO SCRIPT DA BUSCA
    gerar_busca_js($produtos);
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
