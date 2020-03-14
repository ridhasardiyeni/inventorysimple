<?php
include('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
if ($_GET['aksi'] == 'input') {
    $sql_input = "INSERT INTO pelanggan (id,nama) VALUES ('$id','$nama')";
    $simpan_input = mysqli_query($koneksi, $sql_input);
    if ($simpan_input) {
        header("location:index.php?p=pelanggan");
    }
} else if($_GET['aksi'] == 'edit') {
    $sql_edit = "UPDATE pelanggan SET `nama` = '$nama' WHERE `pelanggan`.`id` = '$id' ";
    $edit = mysqli_query($koneksi, $sql_edit);
    if ($edit) {
        header("location:index.php?p=pelanggan");
    }
} else if($_GET['aksi'] == 'hapus') {
    $sql_hapus = "DELETE FROM `pelanggan` WHERE `pelanggan`.`id` = '$_GET[id]'";
    if (mysqli_query($koneksi, $sql_hapus)) {
      header("location:index.php?p=pelanggan");
   } else {
      echo "Error deleting record: " . mysqli_error($koneksi);
   }
}
?>