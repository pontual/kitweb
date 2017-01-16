<?php

require_once("common.php");

?>
<h1>
    Ficha
</h1>

<p>
    + <a href="ficha_add_form.php">Adicionar campo</a>
</p>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Campo</td>
        <td>Valor</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, campo, valor from v2_ficha order by campo';
    foreach ($dbh->query($sql) as $row) {
      printListItem("ficha", $row['id'], $row['campo'], $row['valor']);
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
