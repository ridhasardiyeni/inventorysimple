<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Barang</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- SB Admin CSS - Include with every page -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Page-Level Plugin CSS - Tables -->
        <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <!-- Page-Level Plugin Scripts - Tables -->

        <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <!-- SB Admin Scripts - Include with every page -->
        <script src="js/sb-admin.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>

        <script type="text/javascript">
            $(function() {
                $('#datetimepicker').datetimepicker({
                    format: 'H:m:s'
                });
            });
            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'H:m:s'
                });
            });
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
    </head>
    <body>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'list';
            switch ($page) {
                case 'list' :
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><center>Data Barang Pada Database</center></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo "<a href='?p=barang&page=entri'><button class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Tambah data Barang</button></a>";
                    }
                    ?>
                    <br /><br />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>ID Kategori</th>
                                                    <th>Harga</th>
                                                    <th>Satuan</th>
                                                    <th>Stock</th>
                                                    <?php
                                                    if (isset($_SESSION['id'])) {
                                                        echo "<th colspan='2'><center>Aksi</center></th>";
                                                    }
                                                    ?>

                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                        <?php
                                                        if (isset($_SESSION['id'])) {
                                                            echo "<td><a href='?p=barang&page=edit&id=$data[0]'><button class='btn btn-info'><span class='glyphicon glyphicon-edit'></span> Edit</button></a></td> 
                                                        <td><a href='aksi_barang.php?aksi=hapus&id=$data[0] ' onclick='return confirm(Yakin akan menghapus data ?)'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</button></a> </td>";
                                                        }
                                                        ?>
                                                        
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'entri' :
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form id="form1" name="form1" method="POST" action="aksi_barang.php?aksi=input" class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <legend>TAMBAH Barang</legend>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id">ID Barang</label>
                                                    <div class='input-group-addon'>
                                                        <input name="id" type="text" id="id" class="form-control" />
                                                    </div>
                                                </div>     
                                                <div class="form-group">
                                                    <label for="nama">Nama Barang</label>
                                                    <div class='input-group-addon' >
                                                        <input type='text' class="form-control" name="nama" type="text" id="nama"/>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_kategori">ID Kategori</label>
                                                    <div class='input-group-addon'>
                                                        <select id="id_kategori" name="kategori" class="form-control">
                                                            <?php
                                                            $sql_kategori= "SELECT * from kategori";
                                                            $ambil_id = mysqli_query($koneksi, $sql_kategori);
                                                            while ($data_id = mysqli_fetch_array($ambil_id)) {
                                                                ?>
                                                                <option value="<?php echo $data_id[0]; ?>"><?php echo $data_id[0]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>     
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <div class='input-group-addon' >
                                                        <input type='text' class="form-control" name="harga" type="text" id="harga"/>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="satuan">Satuan</label>
                                                    <div class='input-group-addon'>
                                                        <input name="satuan" type="text" id="satuan" class="form-control" />
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="stok">Stok</label>
                                                    <div class='input-group-addon'>
                                                        <input name="stok" type="text" id="stok" class="form-control" />
                                                    </div>
                                                </div>   
                                                <div class="form-group">
                                                    <input name="simpan" type="submit" class="btn btn-lg btn-success btn-block" id="simpan" value="Simpan" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'edit' :
                    $sql_edit = "SELECT * from barang WHERE id='$_GET[id]'";
                    $ambil_edit = mysqli_query($koneksi, $sql_edit);
                    $data_edit = mysqli_fetch_array($ambil_edit);
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form id="form1" name="form1" method="POST" action="aksi_barang.php?aksi=edit" class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <legend>EDIT BARANG</legend>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id">ID Barang</label>
                                                    <div class='input-group-addon'>
                                                        <input name="id" type="text" id="id" class="form-control" value="<?php echo $data_edit[0]; ?>" readonly/>
                                                    </div>
                                                </div>     
                                                <div class="form-group">
                                                    <label for="nama">Nama Barang</label>
                                                    <div class='input-group-addon' >
                                                        <input type='text' class="form-control" name="nama" type="text" id="nama" value="<?php echo $data_edit[1]; ?>"/>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kategori">ID Kategori</label>
                                                    <div class='input-group-addon'>
                                                        <select id="id_kategori" name="kategori" class="form-control">
                                                            <?php
                                                            $sql_kategori = "SELECT * from kategori";
                                                            $ambil_id = mysqli_query($koneksi, $sql_kategori);
                                                            while ($data_id = mysqli_fetch_array($ambil_id)) {
                                                                if ($data_id[0] == $data_edit[2]) {
                                                                    echo "<option value='$data_id[0]' selected>$data_id[0]</option>";
                                                                } else {
                                                                    echo "<option value='$data_id[0]'>$data_id[0]</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>     
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <div class='input-group-addon' >
                                                        <input type='text' class="form-control" name="harga" type="text" id="harga" value="<?php echo $data_edit[3]; ?>"/>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="satuan">Satuan</label>
                                                    <div class='input-group-addon'>
                                                        <input name="satuan" type="text" id="satuan" class="form-control" value="<?php echo $data_edit[4]; ?>"/>
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                    <label for="stok">Stok</label>
                                                    <div class='input-group-addon'>
                                                        <input name="stok" type="text" id="stok" class="form-control" value="<?php echo $data_edit[4]; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input name="update" type="submit" class="btn btn-lg btn-success btn-block" id="update" value="UPDATE" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
            }
            ?>
        </div>
    </body>
</html>