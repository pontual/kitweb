<?php

require_once("common.php");

?>
<h1>
    Categorias
</h1>

<p>
    + <a href="categoria_add_form.php">Adicionar categoria</a>
</p>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Nome</td>
        <td>Produtos</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, nome, lista from v2_categoria order by nome';
    foreach ($dbh->query($sql) as $row) {
      printListRow("categoria", $row['id'], [
        $row['nome'],
        substr($row['lista'], 0, 50) . "..."  ]);
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
