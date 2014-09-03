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

function add_to_categorias($comma_sep_str) {
    $raw_categorias = explode(",", $comma_sep_str);
    foreach ($raw_categorias as $categoria_to_add) {
        $GLOBALS['categorias'][] = ucwords(trim($categoria_to_add));
    }
}

function cleanup_categorias() {
    $GLOBALS['categorias'] = array_unique($GLOBALS['categorias']);
    sort($GLOBALS['categorias']);
}

class Produto {
	public $_codigo;
	public $_descricao;
	public $_categorias_str;
	public $_dimensoes;
	public $_preco;
    public $_categorias = array();

    public function __construct($codigo, $descricao, $categorias_str, $dimensoes, $preco) {
        $this->_codigo = strtoupper($codigo);
        $this->_descricao = $descricao;
        $this->_categorias_str = $categorias_str;
        $this->_dimensoes = format_dimensoes($dimensoes);
        $this->_preco = $preco;
        add_to_categorias($categorias_str);
    }
}

try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=pontualimportb1;charset=utf8', "root", "", array(
                      PDO::ATTR_PERSISTENT => true
                      ));   
}

catch (PDOException $e) {
    print "Error " . $e->getMessage() . "<br/>";
    die();
}

try {
    foreach($db->query("SELECT * FROM produto ORDER BY codigo;") as $row) {
        $inventory[$row['codigo']] = new Produto($row['codigo'], $row['descricao'], $row['categorias'], $row['dimensoes'], $row['preco']);
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

cleanup_categorias();
echo $basicheader;

print_r($categorias);

$output = fopen("../basicpdoout.html", "w");
fwrite($output, $basicheader);
foreach($inventory as $prod) {
    fwrite($output, print_r($prod, true));
}

fclose($output);

?>

