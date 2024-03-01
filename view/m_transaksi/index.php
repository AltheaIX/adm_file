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
		
		 <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      KAS Masuk Bulan ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(transaksi_detail.total) AS Pemasukan FROM transaksi_detail WHERE kat_id = 1 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $Pemasukan = $row['Pemasukan'];
								  echo "Rp ".number_format($Pemasukan, 0);
                            ?>
                          </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      KAS Keluar Bulan ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
							$sql = "SELECT SUM(transaksi_detail.total) AS PENGELUARAN FROM transaksi_detail WHERE kat_id != 1 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                            $result = $conn->prepare($sql); 
                            $result->execute();
							$row = $result->fetch(PDO::FETCH_ASSOC);
							$pengeluaran = $row['PENGELUARAN'];
							echo "Rp ".number_format($pengeluaran, 0);
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      Sedekah Lain Bulan ini
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                              <?php
								  $sql = "SELECT SUM(transaksi_detail.total) AS PENGELUARAN FROM transaksi_detail WHERE kat_id = 26 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $nilai = $row['PENGELUARAN'];
								  echo "Rp ".number_format($nilai, 0);
                              ?>
                              </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">KAS Sisa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$hasil = $Pemasukan - $pengeluaran;
						echo "Rp ".number_format($hasil, 0);
                      ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Master Transaksi</h1>
		  <a href="../transaksi/" class="btn btn-primary">Tambah</a>
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Akun</th>
                      <th>Sub Akun</th>
                      <th>Desk</th>
                      <th>Total</th>
					  <th>Created</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Akun</th>
                      <th>Sub Akun</th>
                      <th>Desk</th>
                      <th>Total</th>
					  <th>Created</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `transaksi_detail` WHERE `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."' ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> 
					<?php 
					$sql_akun = "SELECT * FROM kat_akun WHERE id = '".$data['kat_id']."'";
					$stmt = $conn->prepare($sql_akun);
					$stmt->execute();
					$row = $stmt->fetch();
					echo $row['name'];
					?> 
					</td>
                    <td> 
					<?php 
					$sql_sub = "SELECT * FROM kat_sub WHERE kat_id = '".$data['kat_id']."' AND sub_id = '".$data['sub_id']."'";
					$stmt = $conn->prepare($sql_sub);
					$stmt->execute();
					$row = $stmt->fetch();
					echo $row['name'];
					?> 
					</td>
                    <td> <?php echo $data['des'];?> </td>    
					<td> Rp. <?php echo number_format(($data['total']),0);?> </td>
					<td> <?php echo $data['create_at'];?> </td> 					
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


      <script type="text/javascript">
    $(document).ready(function(){
        $('#show').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : 'detail.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>
      

<?php include '../footer.php'; ?>

