<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laporan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="asset/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
        <div class="panel-heading"><b>Manajement Waktu</b></div>
        <div class="panel-body">
           <form class="form-horizontal" method="post" action="insert_log.php">
		   
		   
              <div class="form-group">
                <label class="control-label col-sm-3">Kategori:</label>
                <div class="col-sm-9">
                  <?php                    
                    $sql_kategori = mysqli_query($con,"SELECT * FROM kategori ORDER BY name ASC");
					
                   ?>
                  <select class="form-control js-example-basic-single" name="kat_id" id="kategori">
                    <?php                       
                        while($kategori = mysqli_fetch_assoc($sql_kategori)){ 
                           echo '<option value="'.$kategori['Id'].'">'.$kategori['name'].'</option>';
                        }                        
                      ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Nama Pekerjaan:</label>
                <div class="col-sm-9">          
					<input type="text" class="form-control" name="nama" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Deskripsi:</label>
                <div class="col-sm-9">          
					<input type="text" class="form-control" name="description" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Menit:</label>
                <div class="col-sm-9">          
					<input type="number" class="form-control" name="menit" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Masuk:</label>
                <div class="col-sm-9">          
					<input type="number" class="form-control" name="masuk" />
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" >Keluar:</label>
                <div class="col-sm-9">          
					<input type="number" class="form-control" name="keluar" />
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





<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>





</html>