<?php

require('../util/ptldb.php');

require_once('../util/carregarprodutos.php');

$db = getconnection();
$categorias = getcategorias($db);
$produtos = getprodutos($db);

$db = null;

$active_codigos = [];

foreach ($categorias as $categoria => $lista) {
    foreach ($lista as $codigo) {
        if (!in_array($codigo, $active_codigos) && strlen($codigo) >= 6) {
            $active_codigos[] = $codigo;
        }
    }
}

array_multisort($active_codigos);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<pre>
<?php
foreach ($active_codigos as $codigo) {
    print("$codigo\n");
}
?>
</pre>
</body>
</html>
