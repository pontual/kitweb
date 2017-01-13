<?php
$ficha = $GLOBALS['ficha'];
$nome_fantasia_upper = strtoupper($ficha['nome_fantasia']);
$endereco_bloco = str_replace(" - ", "<br>", $ficha['endereco']);
$PREFIXO = $GLOBALS['PREFIXO'];

date_default_timezone_set("America/Sao_Paulo");
$DATA_E_HORA = date('d/m/y H:i:s');

$categoria_ucfirst = ucfirst($title);

print <<<END
<!DOCTYPE html>
<html>
  <head>
    <!-- $DATA_E_HORA -->
    <meta charset="utf-8">
	<title>{$ficha['nome_fantasia']} - {$ficha['razao_social']} - $categoria_ucfirst</title>
	<link rel="stylesheet" href="produtos/css/produtos.css">
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/slick.css" type="text/css">
	<link rel="stylesheet" href="css/colorbox.css" type="text/css">
  </head>
  <body>
    <!-- Gerado pelo PTLKitWeb -->
	<div class="site_header">
      <a id="top">&nbsp;</a>
	  <a href="{$PREFIXO}index.html">
		<div class="site_logo">
		  <img src="img/logo_transp.png" style="vertical-align: top;" alt="Pontual">
		</div>
      </a>
	    <div class="site_banner">
          <a href="{$PREFIXO}index.html">
            <span class="banner_company_name">
              $nome_fantasia_upper
            </span><br>
            <i>{$ficha['slogan']}</i><br>
          </a>
          <span class="telefones">
            {$ficha['telefone']}<br>
          </span>

		</div> <!-- end site_banner -->
        
	  <div class="site_address">
        <a href="{$PREFIXO}mapa.html">
          $endereco_bloco
          <br>
          <u><b>Como chegar</b></u>
        </a>
	  </div> <!-- end site_address -->
	</div> <!-- end site_header -->

END;

?>
