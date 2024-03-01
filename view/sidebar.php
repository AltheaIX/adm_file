
  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin">
        
        <div class="sidebar-brand-text mx-3">Panel Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Sidebar
      </div>
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mdata" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Master Data</span>
        </a>
        <div id="mdata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data :</h6>
            <a class="collapse-item" href="../m_uang/">Kemajuan Uang</a>
			<a class="collapse-item" href="../m_hutang/">Master Hutang</a>
			<a class="collapse-item" href="../m_cus/">Master Customer</a>
            <!--<a class="collapse-item" href="../m_transaksi/">Master Transaksi</a>-->
            <a class="collapse-item" href="../m_task/">Master Task</a>
            <a class="collapse-item" href="../m_task/bulan_lalu.php">Master Task - Bulan Lalu</a>
            <a class="collapse-item" href="../m_task/tahun_lalu.php">Master Task - Tahun Lalu</a>
            <!--<a class="collapse-item" href="../m_akun/">Master Akun</a>-->
            <a class="collapse-item" href="../m_sistem/">Master Sistem</a>
            
            <a class="collapse-item" href="../m_kategori/">Master Kategori</a>
            <a class="collapse-item" href="../m_project/">Master Project</a>
            <a class="collapse-item" href="../m_pass/">Master Pass</a>
            <a class="collapse-item" href="../m_agama/">Master Agama</a>
            <a class="collapse-item" href="../m_kominfo/">Master Bpsdmp</a>
            <a class="collapse-item" href="../m_youtube/">Master Youtube</a>
            <a class="collapse-item" href="../m_product/">Master Product</a>
            <a class="collapse-item" href="../m_cari/">Master Cari</a>
            <a class="collapse-item" href="../m_ilmu/">Master Ilmu</a>
            <a class="collapse-item" href="../m_laporan/">Master Laporan</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proyek" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Project</span>
        </a>
        <div id="proyek" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manajement Proyek :</h6>
			<a class="collapse-item" href="../proyek_hari/">Proyek (Harian)</a>
            <a class="collapse-item" href="../proyek_bulan/">Proyek (Bulan)</a>
            <a class="collapse-item" href="../proyek_tahun/">Proyek (Tahunan)</a>
            <a class="collapse-item" href="../proyek_tahun/" data-toggle="modal" data-target="#cek">Proyek Periode</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kerja" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Master Pekerjaan</span>
        </a>
        <div id="kerja" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Pekerjaan :</h6>
            <a class="collapse-item" href="../m_kominfo/">Master Bpsdmp</a>
            <a class="collapse-item" href="../m_laporan/">Master Laporan</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dea" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Logbook</span>
        </a>
        <div id="dea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Logbook Pekerjaan :</h6>
			<a class="collapse-item" href="../m_dea2021/">DEA2021</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aruskas" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Arus Kas</span>
        </a>
        <div id="aruskas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header " style="color:blue;">Transaksi :</h6>
            <a class="collapse-item" href="../m_transaksi/">Transaksi Arus Kas</a>
			<h6 class="collapse-header" style="color:green;">Master Arus Kas :</h6>
            <a class="collapse-item" href="../m_akun/">Master Akun</a>
			<a class="collapse-item" href="../m_akuni/">Master Sub Akun</a>
            <h6 class="collapse-header" style="color:blue;">Laporan Arus Kas :</h6>
            <a class="collapse-item" href="../laporan_akun/">LP Arus Kas (Bulan)</a>
            <a class="collapse-item" href="../laporan_tahun/">LP Arus Kas (Tahun)</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aset" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Aset</span>
        </a>
        <div id="aset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header " style="color:blue;">Transaksi :</h6>
            <a class="collapse-item" href="../m_taset/">Transaksi Aset</a>
			<h6 class="collapse-header" style="color:blue;">Master Aset :</h6>
			<a class="collapse-item" href="../m_aset/">Master Aset Lancar</a>
			<a class="collapse-item" href="../m_asett/">Master Aset Tetap</a>
			<a class="collapse-item" href="../m_aseti/">Master Aset Item</a>
            <h6 class="collapse-header" style="color:blue;">Laporan Aset Lancar :</h6>
            <a class="collapse-item" href="../lp_aset/">LP Aset Lancar (Bulan)</a>
            <a class="collapse-item" href="../lp_asett/">LP Aset Lancar (Tahun)</a>
			<h6 class="collapse-header" style="color:blue;">Laporan Aset Tetap :</h6>
            <a class="collapse-item" href="../lp_aset_tetap/">LP Aset Tetap</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-folder-open"></i>
          <span>Laporan Arus Kas</span>
        </a>
        <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Arus Kas :</h6>
            <a class="collapse-item" href="../laporan_akun/">LP Arus Kas (Bulan)</a>
            <a class="collapse-item" href="../laporan_tahun/">LP Arus Kas(Tahunan)</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
	  
	  <!-- Nav Item - Pages Collapse Menu -->
	  <?php if($_SESSION['level_id'] == "1" ){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#m_user" aria-expanded="true" aria-controls="m_user">
          <i class="fas fa-folder-open"></i>
          <span>Master Users</span>
        </a>
        <div id="m_user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master User :</h6>
			<a class="collapse-item" href="../m_user/">Master User</a>
          </div>
        </div>
      </li>
	  <?php } ?>
	  
         <li class="nav-item ">
        <a class="nav-link" href="../../logout.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Log out</span></a>
      </li>

   
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    
    
    
    
    
     <!-- Modal -->
<div class="modal fade" id="cek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../proyek_period/" method="post"  enctype="multipart/form-data">
              
        
          
          <div class="form-group">
            <label class="control-label" >Tanggal Sebelum :</label>          
				<input type="text" class="form-control" name="belum" value="<?php echo date("Y-m-d") ?> 00:00:01" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Tanggal Sesudah:</label>          
				<input type="text" class="form-control " name="sudah" value="<?php echo date("Y-m") ?>-31 23:59:59"/>
          </div>
		  
		  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Cek</button>
      </div>
      </form>
    </div>
  </div>
</div>


