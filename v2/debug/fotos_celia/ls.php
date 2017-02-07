<?php

foreach (scandir('.') as $filename) {
  print(substr($filename, 0, -4) . "<br>");
}

