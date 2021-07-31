<?php
$nama = 'Muhammad Fikri';

// Umum digunakan
echo 'Nama: ' . $nama;

// Menggunakan koma (jarang digunakan) - performa sedikit lebih cepat
echo 'Nama: ' , $nama;

// Ternary
echo $nama == 'Muhammad Fikri' ? 'Benar' : 'Salah'; // Hasil Benar