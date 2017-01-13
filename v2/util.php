<?php

function generateForm($target, $labelNamesArray) {
  $out = "<form action='$target' method='POST'>";
  $out .= "<table>\n";
  foreach ($labelNamesArray as $label => $name) {
    $out .= "<tr><td>$label</td><td><input name='$name'></td></tr>\n";
  }

  $out .= "<tr><td>&nbsp;</td><td><input type='submit'></td></tr>\n";
  $out .= "</table>";
  return $out;  
}

function generateEditForm($target, $labelValuesArray) {
  $out = "<form action='$target' method='POST'>";
  $out .= "<table>\n";
  foreach ($labelValuesArray as $label => $values) {
    if ($label === "id") {
      $out .= "<tr><td colspan='2'><input type='hidden' name='id' value='{$values['value']}'></td></tr>\n";
    } else {
      $out .= "<tr><td>$label</td><td><input name='{$values['name']}' value='{$values['value']}'></td></tr>\n";
      }
  }

  $out .= "<tr><td>&nbsp;</td><td><input type='submit'></td></tr>\n";
  $out .= "</table>";
  return $out;
}

function printPairRow($label, $value) {
  print("
<tr>
  <td>$label</td>
  <td>$value</td>
</tr>");
}

function printListItem($tableName, $id, $label, $value) {
  print("
<tr>
  <td><a href='{$tableName}_edit_form.php?id=$id'>Editar</a></td>
  <td>$label</td>
  <td>$value</td>
  <td><a href='{$tableName}_delete_confirm.php?id=$id''>Excluir</a></td>
</tr>");
}
  
?>
