<?php
include('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$id_kategori= $_POST['kategori'];
$harga = $_POST['harga'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];

if ($_GET['aksi'] == 'input') {
    $sql_input = "INSERT INTO barang (id,nama,id_kategori,harga,satuan,stok) VALUES ('$id','$nama','$id_kategori','$harga','$satuan','$stok')";
    $simpan_input = mysqli_query($koneksi, $sql_input);
    if ($simpan_input) {
        header("location:index.php?p=barang");
    }
} else if($_GET['aksi'] == 'edit') {
    $sql_edit = "UPDATE barang SET `nama` = '$nama',id_kategori='$id_kategori',harga='$harga',satuan='$satuan',stok='$stok' WHERE id ='$id'";
    $edit = mysqli_query($koneksi, $sql_edit);
    if ($edit) {
        header("location:index.php?p=barang");
    }
} else if($_GET['aksi'] == 'hapus') {
    $sql_hapus = "DELETE FROM barang WHERE id = '$_GET[id]'";
    if (mysqli_query($koneksi, $sql_hapus)) {
      header("location:index.php?p=barang");
   } else {
      echo "Error deleting record: " . mysqli_error($koneksi);
   }
}
?>