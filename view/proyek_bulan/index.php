<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['level_id'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

?>

<?php include '../header.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php 
   include '../sidebar.php'; 
   include '../navbar.php'; 
   ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Laporan Proyek (Bulan)</h1>
		  <p>Periode <?php echo "Tanggal " .date("01-m-Y 00:00:01")." Sampai ". date("31-m-Y 23:59:59"); ?></p>
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>NO</th>
                      <th>KATEGORI</th>
					  <th>MENIT</th>
					  <th>JAM</th>
					  <th>PEMASUKAN</th>
					  <th>PENGELUARAN</th>
					  <th>JUMLAH</th>
					  <th>UPAH JAM</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>NO</th>
                      <th>KATEGORI</th>
					  <th>MENIT</th>
					  <th>JAM</th>
					  <th>PEMASUKAN</th>
					  <th>PENGELUARAN</th>
					  <th>JUMLAH</th>
					  <th>UPAH JAM</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT log_saya.kat_id AS ID, kategori.name AS KATEGORI, SUM(log_saya.menit) AS MENIT, SUM(log_saya.menit / 60) AS JAM, SUM(log_saya.masuk) AS PEMASUKAN, SUM(log_saya.keluar) AS PENGELUARAN, SUM(log_saya.masuk - log_saya.keluar) AS JUMLAH, SUM(log_saya.masuk - log_saya.keluar) /  SUM(log_saya.menit / 60) AS UPAH_JAM FROM kategori INNER JOIN log_saya ON kategori.id = log_saya.kat_id WHERE kategori.status_id = 0 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."' GROUP BY log_saya.kat_id ORDER BY SUM(log_saya.masuk - log_saya.keluar) /  SUM(log_saya.menit / 60) DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> <?php echo $data['KATEGORI'];?> </td> 
					<td> <?php echo $data['MENIT'];?> </td> 
					<td> <?php echo $data['JAM'];?> </td> 
					<td> Rp. <?php echo number_format(($data['PEMASUKAN']),0);?> </td>
					<td> Rp. <?php echo number_format(($data['PENGELUARAN']),0);?> </td>
					<td> Rp. <?php echo number_format(($data['JUMLAH']),0);?> </td>	
					<td> Rp. <?php echo number_format(($data['UPAH_JAM']),0);?> </td>
                    </tr>
                    
                    <?php
                    $count=$count+1;
                    } 
                    ?> 
                   
                  </tbody>
                </table>
              </div>
            </div>

              
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
     

  
</div>
      <script src="<?=$base_url;?>/assets/js/jquery-2.2.3.min.js"></script>
	  <script src="<?=$base_url;?>/assets/js/bootstrap.min.js"></script>

      

<?php include '../footer.php'; ?>

