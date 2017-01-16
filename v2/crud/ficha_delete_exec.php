<?php

$pageTitle = "";

require_once("common.php");

if (isset($_GET['id'])) {
  
  $sql = 'delete from v2_ficha where id = :id';
  $sth = $dbh->prepare($sql);
  $sth->execute([ ":id" => $_GET['id']]);

  print("Campo excluido.");

  header("Location: ficha_list.php");
} else {
  print("Nenhum id solicitado.");
}

?>


<?php

require_once("footer.php");
  
?>
