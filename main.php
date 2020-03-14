<?php
$p=isset($_GET['p']) ? $_GET['p'] : 'home';
if ($p=='home') include 'home.php';
if ($p=='kategori') include 'kategori.php';
if ($p=='barang') include 'barang.php';
if ($p=='pelanggan') include 'pelanggan.php';
if ($p=='transaksi') include 'transaksi.php';
?>
