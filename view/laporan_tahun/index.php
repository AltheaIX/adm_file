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
          <h1 class="h3 mb-2 text-gray-800">Laporan Arus Kas (Tahun)</h1>
		  <p>Periode <?php echo "Tanggal " .date("01-01-Y 00:00:01")." Sampai ". date("31-12-Y 23:59:59"); ?></p>
       

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
                      <th>NILAI</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>NO</th>
                      <th>KATEGORI</th>
                      <th>NILAI</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT transaksi_detail.kat_id AS NO, kat_akun.name AS KATEGORI, SUM(transaksi_detail.total) AS NILAI FROM kat_akun INNER JOIN transaksi_detail ON kat_akun.id = transaksi_detail.kat_id WHERE `create_at` BETWEEN '".date("Y-01-01 00:00:01")."' AND '".date("Y-12-31 23:59:59")."' GROUP BY kat_id");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> <?php echo $data['KATEGORI'];?> </td> 
					<td> Rp. <?php echo number_format(($data['NILAI']),0);?> </td>    					
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

