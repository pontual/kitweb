<?php

require_once("common.php");

print(generateForm("categoria_add_exec.php", [
  "Nome" => "nome" ]));

require_once("footer.php");

?>
