<?php
include '../../config.php';

/* Halaman ini tidak dapat diakses jika belum ada yang login(total) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php 
include '../sidebar.php';
include '../navbar.php';
?>

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
                      Total Hutang
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a style="color:red">
                            <?php
								  $sql = "SELECT count(*) FROM log_saya WHERE kat_id = 41 AND status = 1";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $number_of_rows = $result->fetchColumn();
								  echo $number_of_rows;
                            ?>
                            </a> / 
                            <small>
                                Sedekah : 
                            <a style="color:green;">
                            <?php
								  $sql = "SELECT count(*) FROM log_saya WHERE kat_id = 41 AND status = 3";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $number_of_rows = $result->fetchColumn();
								  echo $number_of_rows;
                            ?>
                            </a>
                            </small>
                            <br/>
                            
                            
                            <small>
                                Tugas : 
                            <?php
								  $sql = "SELECT count(*) FROM log_saya WHERE kat_id = 41 AND status != 1";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $number_of_rows = $result->fetchColumn();
								  echo $number_of_rows;
                            ?>
                            </small>
                            <br/>
                            <small>
                                Kantor : 
                            <a style="color:blue;">
                            <?php
								  $sql = "SELECT count(*) FROM log_saya WHERE kat_id = 41 AND status = 2";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $number_of_rows = $result->fetchColumn();
								  echo $number_of_rows;
                            ?>
                            </a>
                            </small>
                            
                          </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Hemat Bulan ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(log_saya.hemat) AS Penghemat FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $Penghemat = $row['Penghemat'];
								  echo "Rp ".number_format($Penghemat, 0);
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

      <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Waktu Bermanfaat -
                      <?php
                        $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $bermanfaat = $row['MENIT'];
                        echo number_format($bermanfaat, 0)." Menit";
                      ?>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $hasil = $bermanfaat / 60;
                      echo number_format($hasil, 2)." Jam ";
                      ?>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
      </div>
			
		</div>
		
		 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Gaji Hari ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = "SELECT SUM(log_saya.masuk) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk = $row['MASUK'];
                        echo "Rp. ".number_format($masuk, 0);
                      ?>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
		</div>
		
		<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Pengeluaran Hari ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = "SELECT SUM(log_saya.keluar) AS KELUAR FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $keluar = $row['KELUAR'];
                        echo "Rp. ".number_format($keluar, 0);
                      ?>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
		</div>
		
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Pengeluaran Bulan ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(log_saya.keluar) AS KELUAR FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $keluar = $row['KELUAR'];
								  echo "Rp ".number_format($keluar, 0);
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

     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h5 class="h5 mb-0 text-gray-800">Manfaat Waktu 24 Jam - Hari ini </h5>
</div>

<!-- Content Row -->
<div class="row">



  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
            Waktu Kerja -
            <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE kat_id != 5 AND kat_id != 6 AND kat_id != 7 AND kat_id != 8 AND kat_id != 11 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $pengeluaran = $row['MENIT'];
                  echo number_format($pengeluaran, 0)." Menit ";
                ?>
                
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $hasil = $pengeluaran / 60;
              echo number_format($hasil, 2)." Jam ";
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
            Waktu Merugi - 
            <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $bermanfaat = $row['MENIT'];
                  $hitung = 1440 - $bermanfaat;
                  echo number_format($hitung, 0)." Menit";
                ?>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $hasil = $hitung / 60;
              echo number_format($hasil, 2)." Jam ";
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
            Waktu Akhirat - 
               <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE kat_id = 6 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $hasil = $row['MENIT'] ;
                  echo number_format($hasil, 0)." Menit";
                ?>
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                <?php
                  $hasila = $hasil / 60;
                  echo number_format($hasila, 2)." Jam ";
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
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Waktu Tidur -
            <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE kat_id = 5 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $hasil = $row['MENIT'];
                  echo number_format($hasil, 0)." Menit";
                ?>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                  $hasila = $hasil / 60;
                  echo number_format($hasila, 2)." Jam ";
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

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
            Silaturahmi -
            <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE kat_id = 11 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $pengeluaran = $row['MENIT'];
                  echo number_format($pengeluaran, 0)." Menit ";
                ?>
                
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $hasil = $pengeluaran / 60;
              echo number_format($hasil, 2)." Jam ";
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
            Keluarga - 
            <?php
                  $sql = "SELECT SUM(log_saya.menit) AS MENIT FROM log_saya WHERE kat_id = 7 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                  $result = $conn->prepare($sql); 
                  $result->execute();
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  $kel = $row['MENIT'];
                  echo number_format($kel, 0)." Menit";
                ?>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $hasil = $kel / 60;
              echo number_format($hasil, 2)." Jam ";
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
  
  <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Hemat Hari ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(log_saya.hemat) AS Penghemat FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $Penghemat = $row['Penghemat'];
								  echo "Rp ".number_format($Penghemat, 0);
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



  </div>


 

</div>

<!-- Content Row -->



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
				   
                   $sql = $conn->prepare("SELECT log_saya.kat_id AS ID, kategori.name AS KATEGORI, SUM(log_saya.menit) AS MENIT, SUM(log_saya.menit / 60) AS JAM, SUM(log_saya.masuk) AS PEMASUKAN, SUM(log_saya.keluar) AS PENGELUARAN, SUM(log_saya.masuk - log_saya.keluar) AS JUMLAH, SUM(log_saya.masuk - log_saya.keluar) /  SUM(log_saya.menit / 60) AS UPAH_JAM FROM kategori INNER JOIN log_saya ON kategori.id = log_saya.kat_id WHERE kategori.status_id = 0 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."' GROUP BY log_saya.kat_id ORDER BY SUM(log_saya.masuk - log_saya.keluar) /  SUM(log_saya.menit / 60) DESC");
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

			
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<h5 class="h5 mb-0 text-gray-800">Arus Kas periode Bulan <?php echo date("M-Y") ?></h5>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pemasukan Hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$sql = "SELECT SUM(transaksi_detail.total) AS Pemasukan FROM transaksi_detail WHERE kat_id = 1 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
						$row = $result->fetch(PDO::FETCH_ASSOC);
						$nilai = $row['Pemasukan'];
						echo "Rp ".number_format($nilai, 0);
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

          <!-- Content Row -->
		  
		  
		  
		  <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Kebutuhan Suami
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(transaksi_detail.total) AS Pemasukan FROM transaksi_detail WHERE kat_id = 6 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $nilai = $row['Pemasukan'];
								  echo "Rp ".number_format($nilai, 0);
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
                      Kebutuhan Istri
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
							$sql = "SELECT SUM(transaksi_detail.total) AS PENGELUARAN FROM transaksi_detail WHERE kat_id = 7 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                            $result = $conn->prepare($sql); 
                            $result->execute();
							$row = $result->fetch(PDO::FETCH_ASSOC);
							$nilai = $row['PENGELUARAN'];
							echo "Rp ".number_format($nilai, 0);
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
                      Kebutuhan Anak
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                              <?php
								  $sql = "SELECT SUM(transaksi_detail.total) AS PENGELUARAN FROM transaksi_detail WHERE kat_id = 14 AND `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengeluaran Hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
						$sql = "SELECT SUM(transaksi_detail.total) AS PENGELUARAN FROM transaksi_detail WHERE kat_id != 1 AND `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
						$row = $result->fetch(PDO::FETCH_ASSOC);
						$nilai = $row['PENGELUARAN'];
						echo "Rp ".number_format($nilai, 0);
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

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../public/vendor/jquery/jquery.min.js"></script>
  <script src="../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../public/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../public/js/demo/chart-area-demo.js"></script>
  <script src="../../public/js/demo/chart-pie-demo.js"></script>

</body>

</html>
