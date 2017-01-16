<?php

require_once("common.php");

if (isset($_GET['id'])) {
  $sql = 'select codigo, descricao, peso, medidas, preco from v2_produto where id = :id';
  $sth = $dbh->prepare($sql); 
  $sth->execute([ ":id" => $_GET['id']]);
  $result = $sth->fetch();
?>

    <h1>
        Produto <?= $result['codigo'] ?>
    </h1>

    <?= $result['descricao'] ?><br>
    Peso:    <?= $result['peso'] ?><br>
    Medidas: <?= $result['medidas'] ?><br>
    Preço:   <?= $result['preco'] ?><br>

<?php

    } else {
      print("Nenhum id solicitado.");
    }
    
    ?>

<?php require_once("footer.php"); ?>
