<?php

require_once("common.php");

if (isset($_GET['id'])) {
  
  $sql = 'select id, nome, lista from v2_categoria where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);
  $result = $sth->fetch();

  $nome = trim($result['nome']);
  
?>
    <form action="categoria_edit_exec.php" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="nomeAntigo" value="<?= $nome ?>">
        <table>
            <tr><td>Nome</td><td><input name="nome" size="60" value=<?= $nome ?>></td></tr>
            <tr><td>Lista de produtos<br>Letras minúsculas<br>serão convertidas.</td><td><textarea name="lista" rows="25" cols="15"><?= $result['lista'] ?></textarea></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit"></td></tr>
        </table>

    </form>

<?php

} else {
  print("Nenhum id solicitado.");
}

  require_once("footer.php");
  
?>
