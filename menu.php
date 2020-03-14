<div class="user-panel">
        <div class="pull-left image">
          <br><br>
        </div>
        <div class="pull-left info">
          <p>Ridha Sardiyeni</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="index.php?p=barang">
            <i class="fa fa-th"></i> <span>Barang</span>
          </a>
        </li>
		<li>
          <a href="index.php?p=kategori">
            <i class="fa fa-th"></i> <span>Kategori</span>
          </a>
        </li>
		<li>
          <a href="index.php?p=pelanggan">
            <i class="fa fa-th"></i> <span>Pelanggan</span>
          </a>
        </li>
		<li>
          <a href="index.php?p=transaksi">
            <i class="fa fa-th"></i> <span>Transaksi</span>
          </a>
        </li>
		<li>
		<?php 
			if (isset($_SESSION['id'])) {
				?>
				<a href="logout.php">
            <i class="fa fa-th"></i> <span>Logout</span>
          </a>
				<?php
			} else {
			?>
				<a href="login.php">
            <i class="fa fa-th"></i> <span>Login</span>
          </a>
			<?php
			}
		?>
         <li>
          <a href="print_barang.php">
            <i class="fa fa-th"></i> <span>Print Barang</span>
          </a>
        </li>
		<li>
          <a href="print_pelanggan.php">
            <i class="fa fa-th"></i> <span>Print Pelanggan</span>
          </a>
        </li>
		<li>
          <a href="print_Transaksi.php">
            <i class="fa fa-th"></i> <span>Print Transaksi</span>
          </a>
        </li>
		<li>
        </li>
 		</li>
      </ul>