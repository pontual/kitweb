<?php
require('util/db.php');

require_once('util/carregarficha.php');
require_once('util/carregarprodutos.php');

$db = getconnection();
$ficha = getficha($db);

include 'static/cabecalho.php';
include 'static/customizado.php';

?>