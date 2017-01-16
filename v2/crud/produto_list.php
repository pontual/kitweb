<?php

require_once("common.php");

?>
<h1>
    Produtos
</h1>

<p>
    + <a href="produto_add_form.php">Adicionar produto</a>
</p>

<table>
    <tr>
        <td>&nbsp;</td>
        <td>Código</td>
        <td>Descrição</td>
        <td>Peso</td>
        <td>Medidas</td>
        <td>Cód. preço</td>
        <td>Foto</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $sql = 'select id, codigo, descricao, peso, medidas, preco from v2_produto order by codigo';
    foreach ($dbh->query($sql) as $row) {
      ?>

        <tr>
            <td><a href="produto_edit_form.php?id=<?= $row['id'] ?>"></a></td>
            <td><?= $row['codigo'] ?></td>
            <td><?= $row['descricao'] ?></td>
            <td><?= $row['peso'] ?></td>
            <td><?= $row['medidas'] ?></td>
            <td><?= $row['preco'] ?></td>
            <td>
                <a href="<?= $fotos_folder ?><?= $row['codigo'] ?>.jpg">
                    <img src="<?= $fotos_folder ?><?= $row['codigo'] ?>_thumb.jpg" alt="<?= $row['codigo'] ?>">
                </a>
            </td>
            <td><a href="produto_delete_confirm.php?id=<?= $row['id'] ?>"></td>
        </tr>
      <?php
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
