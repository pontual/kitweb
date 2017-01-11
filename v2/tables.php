<?php

// array of table names (keys) and corresponding columns (values)
// used in install.php and delete_all.php

$TABLES = [
  
"v2_administrador" => "

id int not null auto_increment,
email varchar(80) not null,
username varchar(50) not null,
password_hash varchar(255) not null,
constraint pk_v2_administrador primary key (id)",

"v2_ficha" => "

id int not null auto_increment,
razao_social varchar(255) not null,
nome_fantasia varchar(255),
slogan varchar(255),
telefone varchar(255),
endereco varchar(500),
constraint pk_v2_ficha primary key (id)",

];

?>
