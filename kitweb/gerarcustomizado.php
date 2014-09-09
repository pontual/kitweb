<?php
require('util/ptldb.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');

$db = getconnection();
$ficha = getficha($db);
$categorias = getcategorias($db);

ob_start();
include 'cabecalho.php';

print <<<END
		<div class="site_gallery">
		  <span class="category_name">Chaveiros N. Sra. Aparecida</span>
		  <div class="container" id="gallery_container">
			<div id="links">
			  <ul class="products">
END;

foreach($categorias['X-Tudo'] as $codigo) {
    print <<<END
<li><a class="product_group" href="fotos/$codigo.JPG" title="Chaveiro de metal - 143200A"><img src="fotos/thumb_$codigo.JPG"><br><span class="box_codigo">&nbsp;&nbsp;143200A&nbsp;&nbsp;</span><br>Chaveiro de metal</a></li>
END;
}

include 'rodape.php';

file_put_contents("../gerado.html", ob_get_clean());

?>
