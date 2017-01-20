<pre>
<?php

$dest_dir = "../v2_1/";

$files = scandir(".");

foreach ($files as $file) {
  print($file);
  print("\n");
}

?>
