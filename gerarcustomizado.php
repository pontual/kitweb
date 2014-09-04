<?php
require('kitweb/util/db.php');

require_once('kitweb/util/carregarficha.php');
require_once('kitweb/util/carregarprodutos.php');

$db = getconnection();
$ficha = getficha($db);

ob_start();
include 'kitweb/static/cabecalho.php';
include 'kitweb/static/customizado.php';
file_put_contents("customizadooutput.html", ob_get_clean());

?>