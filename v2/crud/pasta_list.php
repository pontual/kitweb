<?php

require_once("common.php");

?>
<h1>
    Menu
</h1>

<h3>
    + <a href="pasta_add_form.php">Adicionar pasta</a>
</h3>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Nome</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, nome from v2_pasta order by nome';
    foreach ($dbh->query($sql) as $row) {
      printListRow("pasta", $row['id'], [
        $row['nome'] ]);        
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
