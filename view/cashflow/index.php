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
  <link rel="stylesheet" href="asset/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
  <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
  <script src="asset/js/app.js"></script>
  <?php
    include("koneksi.php");     
  ?>
</head>


<body>
<div class="container">
<br>
<br>

<div align="center">
<h3>SISTEM INFORMASI AKUNTANSI<h3>
<a href="index.php"><button>KEUANGAN</button></a>
<a href="log.php"><button>AKTIFITAS</button></a>
</div>
  <br>
  <div class="row">
    <div class="col-sm-offset-2  col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading"><b>Manajement Keuangan</b></div>
        <div class="panel-body">
           <form class="form-horizontal" method="post" action="insert.php">
		   
		   
              <div class="form-group">
                <label class="control-label col-sm-3">Kategori Akun :</label>
                <div class="col-sm-9">
                  <?php                    
                    $sql_kat_akun = mysqli_query($con,"SELECT * FROM kat_akun ORDER BY name ASC");
					
                   ?>
                  <select class="form-control" name="kat_akun" id="kat_akun">
                    <option></option>
                    <?php                       
                        while($kat_akun = mysqli_fetch_assoc($sql_kat_akun)){ 
                           echo '<option value="'.$kat_akun['id'].'">'.$kat_akun['name'].'</option>';
                        }                        
                      ?>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                </div>
              </div>
			  
			  
              <div class="form-group">
                <label class="control-label col-sm-3" >Kategori Sub:</label>
                <div class="col-sm-9">          
                  <select class="form-control" name="kat_sub" id="kat_sub">
                    <option></option>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Deskripsi:</label>
                <div class="col-sm-9">          
					<input type="text" class="form-control" name="deskripsi" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Total:</label>
                <div class="col-sm-9">          
					<input type="number" class="form-control" name="total" />
                </div>
              </div>
			  
              
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" name="simpan_pemasukan_harian" class="btn btn-default">Simpan</button>
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