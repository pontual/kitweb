<?php

$pageTitle = "Homepage";

require_once("html_head.php");
?>

<body>
    <?php

    include("navbar.php");

    $last_updated = "9 jan 2017";
    ?>

    Última atualização: <?= $last_updated ?>
</body>
