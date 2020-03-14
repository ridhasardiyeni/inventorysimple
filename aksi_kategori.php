<?php
include('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
if ($_GET['aksi'] == 'input') {
    $sql_input = "INSERT INTO kategori (id,nama,keterangan) VALUES ('$id','$nama','$keterangan')";
    $simpan_input = mysqli_query($koneksi, $sql_input);
    if ($simpan_input) {
        header("location:index.php?p=kategori");
    }
} else if($_GET['aksi'] == 'edit') {
    $sql_edit = "UPDATE kategori SET `nama` = '$nama',`keterangan` = '$keterangan' WHERE `kategori`.`id` = '$id' ";
    $edit = mysqli_query($koneksi, $sql_edit);
    if ($edit) {
        header("location:index.php?p=kategori");
    }
} else if($_GET['aksi'] == 'hapus') {
    $sql_hapus = "DELETE FROM `kategori` WHERE `kategori`.`id` = '$_GET[id]'";
    if (mysqli_query($koneksi, $sql_hapus)) {
      header("location:index.php?p=kategori");
   } else {
      echo "Error deleting record: " . mysqli_error($koneksi);
   }
}
?>