Pontual's Kit Web
-----------------

A collection of pages that read/write MySQL data and generates (overwrites)
static pages

Protect folder with .htaccess, using a simple password

Login: use PHP-Login (github/panique), use a different password

MySQL: has a third password, that is hardcoded into a private file

Sanitize GET variables, redirecting when invalid values are passed

TOTAL PASSWORDS: 3, .htaccess, MySQL, PHP-Login


IF ADDING PRECO
---------------
fixed username and password is simpler, my idea is pontual/caneca

product boxes have conditional tag that displays price if visitor is logged in

database structure

TABLE categoria
id, nome, ordem

used by itself to generate sidebar.

TABLE produto
id, codigo, descricao, dimensoes, preco, ordem

preco default is 0

TABLE produto_categoria
produto_id, categoria_id

one produto_id can belong to multiple categoria_ids

when loading product boxes, select rows matching the categoria_id

TABLE contato
campo, valor

valor VARCHAR(200)
contains static fields like telephone, address

TABLE pagina
nome, codigofonte

contains mapa, for example, codigofonte is a blob-like text field

access with index.php?action=pagina&nome=NOME

ADMIN PAGES
-----------
ability to drag-and-drop to assign display order, click button to auto-sort
to add a new product, a selection must be made and new item appears below the
selection

individual page to modify categories

individual page to modify products

upload, overwrite and manage photos? allow jpg and png only

WYSIWYG or HTML form to update phone, address, map page
