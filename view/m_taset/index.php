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
          <h1 class="h3 mb-2 text-gray-800">Master Transaksi Aset</h1>
		  <a href="../taset/" class="btn btn-primary">Tambah</a>
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Aset Tetap</th>
                      <th>Aset Item</th>
                      <th>Nama</th>
                      <th>Harga</th>
					  <th>Created</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Aset Tetap</th>
                      <th>Aset Item</th>
                      <th>Nama</th>
                      <th>Harga</th>
					  <th>Created</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `transaksi_aset` WHERE `create_at` BETWEEN '".date("Y-m-01 00:00:01")."' AND '".date("Y-m-31 23:59:59")."' ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> 
					<?php 
					$sql_akun = "SELECT * FROM aset_tetap WHERE id = '".$data['kat_id']."'";
					$stmt = $conn->prepare($sql_akun);
					$stmt->execute();
					$row = $stmt->fetch();
					echo $row['nama'];
					?> 
					</td>
                    <td> 
					<?php 
					$sql_sub = "SELECT * FROM aset_item WHERE kat_id = '".$data['kat_id']."' AND sub_id = '".$data['sub_id']."'";
					$stmt = $conn->prepare($sql_sub);
					$stmt->execute();
					$row = $stmt->fetch();
					echo $row['nama'];
					?> 
					</td>
                    <td> <?php echo $data['nama'];?> </td>    
					<td> Rp. <?php echo number_format(($data['harga']),0);?> </td>
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

