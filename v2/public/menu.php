<!-- MENU -->
<div data-role="panel" class="jqm-navmenu-panel" data-position="left" id="menu" data-display="overlay" data-theme="b">
    <ul class="jqm-list ui-alt-icon ui-nodisc-icon">
        <li data-icon="home"><a href="index.html" data-ajax="false">Home</a></li>


        <?php
        require_once("get_dbh.php");
        
        function getPastas($dbh) {
          $sql = 'select p.id, p.nome, ascii(p.nome) as ascii, (select count(*) from v2_link lnk where lnk.id_pasta = p.id) as ct from v2_pasta p order by ascii';
          $sth = $dbh->query($sql);
          return $sth->fetchAll();
        }

        function getLinks($dbh, $idPasta) {
          $sql = 'select lnk.nome, lnk.id, lnk.id_categoria as id_cat from v2_link as lnk
inner join v2_pasta p
on p.id = lnk.id_pasta
where lnk.id_pasta = :id_pasta';
          $sth = $dbh->prepare($sql);
          $sth->execute([ ":id_pasta" => $idPasta ]);
          
          return $sth->fetchAll();
        }

        $pastas = getPastas($dbh);
        foreach ($pastas as $pasta) {
          $numLinks = (int) $pasta['ct'];
          $nome = sanitizedMenu($pasta['nome']);
          if ($numLinks === 1) {
            print("SINGLE LINK: $nome <br>");
          } elseif ($numLinks > 1) {
            print("MULTIPLE LINKS: $nome <br>");
          }  // implicitly skip pasta with 0 links
          
        }
        
        ?>


    </ul>
</div> <!-- END MENU -->

<?php

print_r(getLinks($dbh, 2)) ?>
