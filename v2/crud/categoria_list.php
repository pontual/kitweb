<?php

require_once("common.php");

?>
<h1>
    Categorias
</h1>

<h3>
    + <a href="categoria_add_form.php">Adicionar categoria</a>
</h3>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Identificação</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, nome from v2_categoria order by nome';
    foreach ($dbh->query($sql) as $row) {
      printListRowCategoria("categoria", "Editar / adicionar produtos", $row['id'], [
        $row['nome'] ]);
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
