<?php
$ficha = $GLOBALS['ficha'];
$nome_fantasia_upper = strtoupper($ficha['nome_fantasia']);
$endereco_bloco = str_replace(" - ", "<br>", $ficha['endereco']);

print <<<END
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>{$ficha['nome_fantasia']} - {$ficha['razao_social']}</title>
	<link rel="stylesheet" href="produtos/css/produtos.css">
	<link rel="stylesheet" href="css/main.css" type="text/css">
  </head>
  <body>
    <!-- Gerado pelo PTLKitWeb -->
    <a href="index.html">Voltar</a></br>
    <div class="printable_header">
      <a href="index.html">
      <b>{$nome_fantasia_upper}</b><br>
      {$ficha['endereco']}<br>
      {$ficha['telefone']}
      </a>
    </div>
    
END;

?>