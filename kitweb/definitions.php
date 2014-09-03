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
?>