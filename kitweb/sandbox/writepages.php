<?php

$inventory = array();
$categorias = array();

function format_dimensoes($str) {
    $trimmed_dimensoes = array();
    $dimensoes = explode("x", $str);
    foreach ($dimensoes as $dimensao) {
        $trimmed_dimensoes[] = trim($dimensao);
    }
    return implode(" x ", $trimmed_dimensoes);
}

class Produto {
	public $_codigo;
	public $_descricao;
	public $_dimensoes;
	public $_preco;

    public function __construct($codigo, $descricao, $dimensoes, $preco) {
        $this->_codigo = strtoupper($codigo);
        $this->_descricao = $descricao;
        $this->_dimensoes = format_dimensoes($dimensoes);
        $this->_preco = $preco;
    }
}

require_once("db.php");

try {
    foreach($db->query("SELECT * FROM produto;") as $row) {
        $inventory[$row['codigo']] = new Produto($row['codigo'], $row['descricao'], $row['dimensoes'], $row['preco']);
    }

    foreach($db->query("SELECT * FROM categoria;") as $row) {
        echo $row['lista'];
        $categorias[$row['nome']] = preg_split('/\r\n|\r|\n/', $row['lista']);
    }
}
catch (PDOException $e) {
    print $e->getMessage();
}

// END DATABASE PULL
$db = null;

ob_start();
include '../static/basicheader.php';
$basicheader = ob_get_clean();

echo $basicheader;

foreach($categorias as $categoria => $lista) {
    echo $categoria;
    echo " normalized " . urlencode($categoria);
    foreach($lista as $codigo) {
        print_r($inventory[strtoupper($codigo)]);
    }
}

$output = fopen("../basicpdoout.html", "w");
fwrite($output, $basicheader);
foreach($inventory as $prod) {
    fwrite($output, print_r($prod, true));
}

fclose($output);

?>

