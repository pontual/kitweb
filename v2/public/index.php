<?php
$page_title = "Homepage";
$content = '
<script>
function openMenu() {
  $("#menu").panel("open");
}
</script>

<button class="index_menu" onclick="openMenu();" data-inline="true">Nossos Produtos</button>

';

require_once("template.php");
