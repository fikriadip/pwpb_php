<?php
$name = 'Muhammad Fikri';
print 'Nama: ' . $name;

// Ternary
print $name == 'Muhammad Fikri' ? 'Ini Benar' : 'Ini Salah'; // Hasil Benar

$nomor = print $name; 
print $nomor;

$list_name	= array('Singa', 'Kucing', 'Harimau');
$sum = 0;
foreach ($list_name as $name) {
	$sum = $sum + print $name . '<br/>';
}
print $sum;