<?php

function format_dimensoes($str) {
    $trimmed_dimensoes = array();
    $dimensoes = explode("x", $str);
    foreach ($dimensoes as $dimensao) {
        $trimmed_dimensoes[] = trim(str_replace(".", ",", $dimensao));
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

function getprodutos($db) {
    $inventory = array();
    try {
        foreach($db->query("SELECT * FROM produto;") as $row) {
            $inventory[$row['codigo']] = new Produto($row['codigo'], $row['descricao'], $row['dimensoes'], $row['preco']);
        }
        return $inventory;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
}

function getcategorias($db) {
    $categorias = array();
    try {
        foreach($db->query("SELECT * FROM categoria ORDER BY nome;") as $row) {
            $categorias[$row['nome']] = preg_split('/\r\n|\r|\n/', $row['lista']);
        }
        return $categorias;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
}

?>
