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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, nome from v2_categoria order by nome';
    foreach ($dbh->query($sql) as $row) {
      printListRow("categoria", $row['id'], [
        $row['nome'],
        "<a href='categoria_definir_produtos.php?id={$row['id']}'>Definir lista de produtos</a>" ]);
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
