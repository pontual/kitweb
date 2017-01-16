<?php

$pageTitle = "";

require_once("common.php");

if (isset($_GET['id'])) {
  
  $sql = 'delete from v2_produto where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);

  print("Produto excluido.");

  header("Location: produto_list.php");
} else {
  print("Nenhum id solicitado.");
}

?>


<?php

require_once("footer.php");
  
?>
