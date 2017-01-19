<?php

require_once("common.php");

if (isset($_GET['id'])) {
  
  $sql = 'select id, nome from v2_pasta where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);
  $result = $sth->fetch();

  $nome = trim($result['nome']);
?>
    <h3>Alterar nome:</h3>
    
    <?php
    
    print(generateEditForm("pasta_edit_exec.php", false, [
    "Nome" => [ "name" => "nome", "value" => $nome ] ],
    [ "id" => $result['id'],
    "nomeAntigo" => $nome ]));


    } else {
    print("Nenhum id solicitado.");
    }

    require_once("footer.php");
    
    ?>
