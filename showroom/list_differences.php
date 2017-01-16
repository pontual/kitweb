<?php
$SITE_COD = "c:/Users/Heitor/Desktop/emacs-24.3/bin/kitweb/showroom/site_active_codigos.txt"
$SHOWROOM_COD "c:/Users/Heitor/Desktop/emacs-24.3/bin/kitweb/showroom/showroom_codigos.txt"

// Read line by line and store into array
function file_to_set($filename) {
    // open file, store lines in an array
    // ...
}

$site_set = file_to_set($SITE_COD);
$showroom_set = file_to_set($SHOWROOM_COD);

$in_site_but_not_in_showroom = array_diff(site_set, showroom_set)
$in_showroom_but_not_in_site = array_diff(showroom_set, site_set)


