<?php

require_once("common.php");

?>
<h1>
    Pastas (do Menu)
</h1>

<p>
    + <a href="pasta_add_form.php">Adicionar pasta</a>
</p>

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
