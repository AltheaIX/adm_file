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
			
			
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Total Foto Semua
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
								  $sql = "SELECT SUM(log_saya.hemat) AS Penghemat FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                                  $result = $conn->prepare($sql); 
                                  $result->execute();
								  $row = $result->fetch(PDO::FETCH_ASSOC);
								  $Penghemat = $row['Penghemat'];
                            ?>
                          0
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
                      Total Foto Bulan Ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      0
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
                      Total Foto Tahun Ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          0
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
                          Total Video Tahun ini
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = "SELECT SUM(log_saya.keluar) AS KELUAR FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $keluar = $row['KELUAR'];
                      ?>
                          0
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
		</div>

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
