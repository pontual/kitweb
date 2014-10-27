<?php

function getficha($db) {
    $ficha = array();
    try {
        foreach($db->query("SELECT * FROM ficha;") as $row) {
            $ficha[$row['nome']] = $row['valor'];
        }
        return $ficha;
    }
    catch (PDOException $e) {
        print($e->getMessage());
    }
}

?>
