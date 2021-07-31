<?php
$nama = 'Muhammad Fikri';
print_r ($nama);

$siswa = array ('Alfa', 'Beta', 'Charlie');
echo '<pre>';  print_r($siswa); echo '</pre>';

// Menyimpan hasil print_r ke variabel
$siswa = array(
			'nama' 		=> array ('lion', 'rabbit', 'cat'),
			'jurusan' 	=> 'Rekayasa Perangkat Lunak',
			'semester'	=> array (1, 3)
		);
		 
$result = print_r($siswa, true); 
echo '<pre>'; print_r($result); echo '</pre>';