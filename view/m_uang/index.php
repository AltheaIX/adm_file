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
          <h1 class="h3 mb-2 text-gray-800">Master Uang</h1>
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                <?php
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-1 00:00:01")."' AND '".date("Y-m-1 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk1 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-2 00:00:01")."' AND '".date("Y-m-2 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk2 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-3 00:00:01")."' AND '".date("Y-m-3 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk3 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-4 00:00:01")."' AND '".date("Y-m-4 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk4 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-5 00:00:01")."' AND '".date("Y-m-5 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk5 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-6 00:00:01")."' AND '".date("Y-m-6 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk6 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-7 00:00:01")."' AND '".date("Y-m-7 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk7 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-8 00:00:01")."' AND '".date("Y-m-8 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk8 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-9 00:00:01")."' AND '".date("Y-m-9 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk9 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-10 00:00:01")."' AND '".date("Y-m-10 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk10 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-11 00:00:01")."' AND '".date("Y-m-11 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk11 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-12 00:00:01")."' AND '".date("Y-m-12 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk12 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-13 00:00:01")."' AND '".date("Y-m-13 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk13 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-14 00:00:01")."' AND '".date("Y-m-14 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk14 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-15 00:00:01")."' AND '".date("Y-m-15 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk15 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-16 00:00:01")."' AND '".date("Y-m-16 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk16 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-17 00:00:01")."' AND '".date("Y-m-17 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk17 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-18 00:00:01")."' AND '".date("Y-m-18 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk18 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-19 00:00:01")."' AND '".date("Y-m-19 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk19 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-20 00:00:01")."' AND '".date("Y-m-20 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk20 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-21 00:00:01")."' AND '".date("Y-m-21 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk21 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-22 00:00:01")."' AND '".date("Y-m-22 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk22 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-23 00:00:01")."' AND '".date("Y-m-23 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk23 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-24 00:00:01")."' AND '".date("Y-m-24 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk24 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-25 00:00:01")."' AND '".date("Y-m-25 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk25 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-26 00:00:01")."' AND '".date("Y-m-26 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk26 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-27 00:00:01")."' AND '".date("Y-m-27 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk27 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-28 00:00:01")."' AND '".date("Y-m-28 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk28 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-29 00:00:01")."' AND '".date("Y-m-29 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk29 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-30 00:00:01")."' AND '".date("Y-m-30 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk30 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-31 00:00:01")."' AND '".date("Y-m-31 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk31 = $row['MASUK'];
                        
                        $sql = "SELECT SUM(log_saya.masuk) + SUM(log_saya.hemat) AS MASUK FROM log_saya WHERE `create_at` BETWEEN '".date("Y-m-d 00:00:01")."' AND '".date("Y-m-d 23:59:59")."'";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $masuk = $row['MASUK'];
                      ?>
                      
                      <b style="color:green;">Pendapatan Hari ini </b><h2 style="color:green;"><?php echo "Rp. ".number_format($masuk, 0).",-"; ?></h2>

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                      <th>5</th>
                      <th>6</th>
                      <th>7</th>
                      <th>8</th>
                      <th>9</th>
                      <th>10</th>
                      <th>11</th>
                      <th>12</th>
                      <th>13</th>
                      <th>14</th>
                      <th>15</th>
                      <th>16</th>
                      <th>17</th>
                      <th>18</th>
                      <th>19</th>
                      <th>20</th>
                      <th>21</th>
                      <th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>
                      <th>29</th>
                      <th>30</th>
                      <th>31</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                      <th>5</th>
                      <th>6</th>
                      <th>7</th>
                      <th>8</th>
                      <th>9</th>
                      <th>10</th>
                      <th>11</th>
                      <th>12</th>
                      <th>13</th>
                      <th>14</th>
                      <th>15</th>
                      <th>16</th>
                      <th>17</th>
                      <th>18</th>
                      <th>19</th>
                      <th>20</th>
                      <th>21</th>
                      <th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>
                      <th>29</th>
                      <th>30</th>
                      <th>31</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                  
                    <tr>
                    <td> # </td>
                    <td><?php echo "Rp. ".number_format($masuk1, 0); ?>  </td>
                    <td><?php echo "Rp. ".number_format($masuk2, 0); ?>  </td> 
                    <td><?php echo "Rp. ".number_format($masuk3, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk4, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk5, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk6, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk7, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk8, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk9, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk10, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk11, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk12, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk13, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk14, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk15, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk16, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk17, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk18, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk19, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk20, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk21, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk22, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk23, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk24, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk25, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk26, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk27, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk28, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk29, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk30, 0); ?> </td> 
                    <td><?php echo "Rp. ".number_format($masuk31, 0); ?> </td> 
                    </tr>
                    
                    
                   
                  </tbody>
                </table>
              </div>
            </div>

              
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      
      <!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../../controller/hutang_controller.php?op=tambah" method="post"  enctype="multipart/form-data">
              
          <input type="text" class="form-control" name="kat_id" value="41" hidden />
          
          <div class="form-group">
            <label class="col-form-label">Nama Pekerjaan :</label>
            <input type="text" class="form-control" name="name" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Deskripsi : </label>       
				<input type="text" class="form-control" name="description" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Link : </label>       
				<input type="text" class="form-control" name="file" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Status : </label>       
				<input type="text" class="form-control" name="status" value="0"/>
				<a>0-tdk ada, 1-pribadi, 2-kantor, 3-sedekah, 4-selesai</a>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi Masuk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-edit-transaksi-masuk">

              <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id_edit" name="Id" />
                    
    			  <div class="form-group">
                    <label class="control-label" >Nama Pekerjaan : </label>        
    					<input type="text" class="form-control" id="name_edit" name="name" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Deskripsi : </label>         
    					<input type="text" class="form-control" id="des_edit" name="description" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Link : </label>         
    					<input type="text" class="form-control" id="file_edit" name="file" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Status : </label>         
    					<input type="text" class="form-control" id="status_edit" name="status" />
                  </div>
                  
                 
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-update">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">
     $(document).ready(function(){
        
        $('#btn-save-update').click(function(){
           $.ajax({
               url: "edit.php",
               type : 'post',
               data : $('#form-edit-transaksi-masuk').serialize(),
               success: function(data){
                   var res = JSON.parse(data);
                   if (res.code == 200){
                       alert('Success Update');
                       location.reload();
                   }
               }
           }) 
        });
        
        $(document).on('click','.btn_update',function(){
            console.log("Masuk");
            $("#id_edit").val($(this).attr('data-id'));
            $("#name_edit").val($(this).attr('data-name'));
            $("#des_edit").val($(this).attr('data-des'));
            $("#file_edit").val($(this).attr('data-file'));
            $("#status_edit").val($(this).attr('data-status'));
            $('#modalEdit').modal('show');
        });
    });
  </script>
      

<?php include '../footer.php'; ?>

