<?php
include '../../config.php';

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if(  $_SESSION['level_id'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SI AKUNTANSI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
  <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
  <script src="asset/js/app.js"></script>
  <?php
    include("../../koneksi.php");     
  ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


<?php 
   include '../sidebar.php'; 
   include '../navbar.php'; 
   ?>


<body>
<div class="container">
<br>
<br>


  <div class="row">
    <div class="col-sm-offset-1  col-sm-8">
      <div class="panel panel-default">
        <div class="panel-body">
           <form class="form-horizontal" method="post" action="insert_log.php">
			  
			    <div class="form-group">
                    <label class="control-label col-sm-3" >Nama :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="nama" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Code :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="code" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Description :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="des" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Untuk :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="untuk" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Masalah :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="masalah" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Fitur Terbaik :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="fitur_terbaik" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Framework :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="framework" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Php Version :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="php_v" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Lokasi :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="lokasi" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Web Admin :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="web_admin" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Tanggal Update :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="tgl_update" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Tanggal Tawar :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="tgl_tawar" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Nilai Rupiah :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="nilai_rupiah" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" >Nilai Emas :</label>
                    <div class="col-sm-9">          
                    <input type="text" class="form-control" name="nilai_emas" />
                    </div>
                </div>
              
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" name="simpan_pemasukan_harian" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
        </div>
      </div>     
    </div>
  </div>  
</div>
</body>
</html>