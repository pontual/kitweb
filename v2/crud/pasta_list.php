<?php

require_once("common.php");

?>
<h1>
    Menu
</h1>

<h3>
    + <a href="pasta_add_form.php">Criar nova pasta</a>
</h3>

<p>
    Uma pasta precisa de pelo menos um Link para aparecer no Menu.
</p>

<p>
    Se a pasta contém apenas um Link, a pasta é convertida num Link.
</p>

<p>
    Clique em "Editar" para adicionar Links.
</p>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Nome da pasta</td>
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
