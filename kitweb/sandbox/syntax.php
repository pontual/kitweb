<?php
pr("<html><head><meta charset=\"utf-8\">");
pr("<pre>");


$var = "n";

pr("hi");

switch ($var) {
default:
	pr("default");
	break;
case "a":
	pr("a");
	break;
case "z":
	pr("n");
	break;
}

function pr($arg) {
	echo $arg . "\n";
}


?>

<?php

for ($i = 0; $i < 3; $i++) {
?>
In for loop
<?php
}

$s = <<<EOT
o hai there
ya rly
EOT;

pr($s);

function donothing() {
	return;
}
		 
pr(3 == 3);

pr(donothing());



function &return_fish(&$the_fish, $name) {
	$the_fish = $name;
	return $the_fish;
}
$myfish = "no fish";
$fish_ref =& return_fish($myfish, "Joe");
pr($fish_ref);

$fish2 =& return_fish($myfish, "Susan");
pr($fish_ref);
pr($fish2);

function myfun($a) {
	foreach(func_get_args() as $arg) {
		pr($arg);
	}
}

function keepadding($n) {
	if ($n == 1) {
		return 1;
	}
	return 1 + keepadding($n - 1);
}

pr("ação");

$total = 1;
for ($i = 2; $i < 20; $i++) {
$total *= $i;
// pr($total);
}

$otherarr[] = 1;
$otherarr[] = 2;

$myarr[] = "1";
$myarr[] = 2;
$myarr[] = implode($otherarr, ",");
$myarr[] = 3.14;

foreach($myarr as $v) {
// pr($v . 1);
}
if(True) {
pr("True");
}

if(true) {
pr("true");
}
?>
