<?php

echo "using require";

require_once("definitions.php");
require_once("db.php");

try {
    foreach($db->query("SELECT * FROM produto;") as $row) {
        $inventory[$row['codigo']] = new Produto($row['codigo'], $row['descricao'], $row['dimensoes'], $row['preco']);
    }

    foreach($db->query("SELECT * FROM categoria ORDER BY nome;") as $row) {
        $categorias[$row['nome']] = preg_split('/\r\n|\r|\n/', $row['lista']);
    }
}
catch (PDOException $e) {
    print $e->getMessage();
}

// END DATABASE PULL
$db = null;

ob_start();
include 'static/basicheader.php';
$basicheader = ob_get_clean();

echo $basicheader;

foreach($categorias as $categoria => $lista) {
    echo $categoria;
    echo "\n\n";
    foreach($lista as $codigo) {
        // print_r($inventory[strtoupper($codigo)]);
        if (strlen($codigo) > 5) {
            echo $inventory[strtoupper($codigo)]->_descricao;
            echo "\n";
        }
    }
    echo "-----------------------------------------\n";
}

/*
$output = fopen("../basicpdoout.html", "w");
fwrite($output, $basicheader);
foreach($inventory as $prod) {
    fwrite($output, print_r($prod, true));
}
fclose($output);
*/

?>

