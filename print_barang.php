<?php
include('koneksi.php');
ob_start();
?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak barang</title>
    </head>
    <body>
        <h1 class="page-header" align='center'>Laporan Barang</h1>
        <table border="1" width="100%" align="center" cellpadding="10">

            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>ID Kategori</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>

            </tr>


            <?php
            $no = 1;
            $sql = "SELECT * from barang";
            $ambil = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($ambil)) {
                ?>

                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data[0] ?></td>
                    <td><?php echo $data[1] ?></td>
                    <td><?php echo $data[2] ?></td>
                    <td><?php echo $data[3] ?></td>
                    <td><?php echo $data[4] ?></td>
                    <td><?php echo $data[5] ?></td>

                </tr>
                <?php
                $no++;
            }
            ?>

        </table>
    </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('DataBarang.pdf', 'D');
?>