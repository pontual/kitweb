<?php
$ficha = $GLOBALS['ficha'];
$nome_fantasia_upper = strtoupper($ficha['nome_fantasia']);
$endereco_bloco = str_replace(" - ", "<br>", $ficha['endereco']);

$TIMESTAMP = date('d/m/y H:i:s');

print <<<END
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>{$ficha['nome_fantasia']} - {$ficha['razao_social']}</title>
	<link rel="stylesheet" href="produtos/css/produtos.css">
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/slick.css" type="text/css">
	<link rel="stylesheet" href="css/colorbox.css" type="text/css">
  </head>
  <body>
    <!-- Gerado pelo PTLKitWeb -->
	<div class="site_header">
      <a name="top">&nbsp;</a>
	  <a href="index.html">
		<div class="site_logo">
		  <img src="img/logo_transp.png" style="vertical-align: top;" alt="Pontual">
		</div>
      </a>
	    <div class="site_banner">
          <a href="index.html">
            <span class="banner_company_name">
              $nome_fantasia_upper
            </span><br>
            <i>{$ficha['slogan']}</i><br>

<br><br>
            $TIMESTAMP<br><br>
            
          </a>
          <span class="telefones">
            {$ficha['telefone']}<br>
          </span>
          <br>
		</div> <!-- end site_banner -->
        
	  <div class="site_address">
        <a href="mapa.html">
          $endereco_bloco
          <br>
          <u><b>Como chegar</b></u>
        </a>
	  </div> <!-- end site_address -->
	</div> <!-- end site_header -->

END;

?>