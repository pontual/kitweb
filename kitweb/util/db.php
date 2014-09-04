<?php

function getconnection() {
    try {
        $db = new PDO('mysql:host=localhost;port=3306;dbname=pontualimportb1;charset=utf8', "root", "", array(
                          PDO::ATTR_PERSISTENT => true
                          ));
        return $db;
    }
    
    catch (PDOException $e) {
        print "Error " . $e->getMessage() . "<br/>";
        die();
    }
  }
?>
