<?php

// array of table names (keys) and corresponding columns (values)
// used in install.php and delete_all.php

$TABLES = [
  
  "v2_administrador" => "

id int not null auto_increment,
email varchar(80) not null,
username varchar(80) not null,
password_hash varchar(255) not null,
constraint pk_v2_administrador primary key (id, username)
",

  "v2_ficha" => "

id int not null auto_increment,
razao_social varchar(255) not null,
nome_fantasia varchar(255),
slogan varchar(255),
telefone varchar(255),
endereco varchar(500),
aviso varchar(500),
constraint pk_v2_ficha primary key (id)
",

  "v2_produto" => "

id int not null auto_increment,
codigo varchar(16) not null,
descricao varchar(200) not null,
peso varchar(32),
medidas varchar(50),
preco varchar(16),
constraint pk_v2_produto primary key (id)
",

  "v2_categoria" => "

id int not null auto_increment,
nome varchar(80) not null,
constraint pk_v2_categoria primary key (id)
",

  "v2_produtos_de_categoria" => "

id_categoria int not null,
id_produto int not null,
constraint fk_v2_produtos_de_categoria_categoria foreign key (id_categoria)
  references v2_categoria (id),
constraint fk_v2_produtos_de_categoria_produto foreign key (id_produto)
  references v2_produto (id)
",

  "v2_pasta_de_menu" => "

id int not null auto_increment,
nome varchar(80) not null,
constraint pk_v2_pasta_de_menu primary key (id)
",

  "v2_link_de_menu" => "

id int not null auto_increment,
id_pasta int not null,
id_categoria int not null,
nome varchar(80) not null,
constraint pk_v2_link_de_menu primary key (id),
constraint fk_v2_link_de_menu_pasta foreign key (id_pasta)
  references v2_pasta_de_menu (id),
constraint fk_v2_link_de_menu_categoria foreign key (id_categoria)
  references v2_categoria (id)
",
  
  
];

?>
