<?php

require_once("common.php");

?>
<h1>
    Produtos
</h1>

<p>
    + <a href="produto_add_form.php">Adicionar produto</a>
</p>


<?php

// count total produtos for pagination
$sql = "select count(*) as ct from v2_produto";
$sth = $dbh->prepare($sql);
$sth->execute();
$result = $sth->fetch();
$totalRows = $result['ct'];

$rowsPerPage = 10;
$totalPages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
  $currentPage = (int) $_GET['pg'];
} else {
  $currentPage = 1;
}

if ($currentPage > $totalPages) {
  $currentPage = $totalPages;
}

if ($currentPage < 1) {
  $currentPage = 1;
}

$offset = ($currentPage - 1) * $rowsPerPage;

$previousPage = $currentPage - 1;
$nextPage = $currentPage + 1;


// Pagination links 
$numPageLinks = 5;

// current page (not a link)
print("Página $currentPage<br>");

if ($currentPage > 1) {
  print("<a href='produto_list.php?pg=1'>Início</a>&nbsp;");
  print("<a href='produto_list.php?pg=$previousPage'>&lt; Anterior</a>&nbsp;");
} else {
  print("Início &lt; Anterior&nbsp;");
}

// numbered links
$leftmostPage = max(1, $currentPage - $numPageLinks);
for ($i = $leftmostPage; $i < $currentPage; $i++) {
  print("<a href='produto_list.php?pg=$i'>$i</a>&nbsp;");
}

// current page (not a link)
print("$currentPage");

$rightmostPage = min($totalPages, $currentPage + $numPageLinks);
for ($i = $currentPage + 1; $i <= $rightmostPage; $i++) {
  print("&nbsp;<a href='produto_list.php?pg=$i'>$i</a>");
}

if ($currentPage < $totalPages) {
  print("&nbsp;<a href='produto_list.php?pg=$nextPage'>Próxima &gt;</a>");
  print("&nbsp;<a href='produto_list.php?pg=$totalPages'>Fim</a>");
} else {
  print("&nbsp;Próxima &gt; Fim");
}

?>

<br><br>

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
    
    $sql = "select id, codigo, descricao, peso, medidas, preco from v2_produto order by codigo limit $offset, $rowsPerPage";
    foreach ($dbh->query($sql) as $row) {
    ?>

        <tr>
            <td><a href="produto_edit_form.php?id=<?= $row['id'] ?>">Editar</a></td>
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
            <td><a href="produto_delete_confirm.php?id=<?= $row['id'] ?>">Excluir</a></td>
        </tr>
    <?php
    }
    
    ?>
</table>

<?php require_once("footer.php"); ?>
