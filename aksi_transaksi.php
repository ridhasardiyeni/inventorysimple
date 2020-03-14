<?php
include('koneksi.php');

$id = $_POST['id'];
$tgl = $_POST['tgl'];
$id_barang = $_POST['barang'];
$jumlah_brg = $_POST['jumlah_brg'];
$id_pelanggan = $_POST['pelanggan'];

$sql_sub=" SELECT * from barang WHERE id ='$id_barang'";
$ambil_sub= mysqli_query($koneksi,$sql_sub);
$data_sub= mysqli_fetch_array($ambil_sub);
$sub = $data_sub[3]* $jumlah_brg;

if ($_GET['aksi'] == 'input') {
    $sql_input = "INSERT INTO transaksi (id,tgl,id_barang,jumlah_brg,sub,id_pelanggan) VALUES ('$id','$tgl','$id_barang','$jumlah_brg','$sub','$id_pelanggan')";
    $simpan_input = mysqli_query($koneksi, $sql_input);
    if ($simpan_input) {
        header("location:index.php?p=transaksi");
    }
} else if($_GET['aksi'] == 'edit') {
    $sql_edit = "UPDATE transaksi SET `tgl` = '$tgl',id_barang='$id_barang',jumlah_brg='$jumlah_brg',sub='$sub',id_pelanggan='$id_pelanggan' WHERE id ='$id'";
    $edit = mysqli_query($koneksi, $sql_edit);
    if ($edit) {
        header("location:index.php?p=transaksi");
    }
} else if($_GET['aksi'] == 'hapus') {
    $sql_hapus = "DELETE FROM transaksi WHERE id = '$_GET[id]'";
    if (mysqli_query($koneksi, $sql_hapus)) {
      header("location:index.php?p=transaksi");
   } else {
      echo "Error deleting record: " . mysqli_error($koneksi);
   }
}
?>