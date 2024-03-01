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
          <h1 class="h3 mb-2 text-gray-800">Master Cari</h1>
		  <!--<a href="tambah.php" class="btn btn-primary">Tambah</a>-->
		  
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-form-label">Kategori :</label>
                            <select class="form-control" style="width:100%;" id="kat_id">
                                <?php
                                    $kat_id = "";
                                    if (isset($_GET['kat_id']))
                                        $kat_id = $_GET['kat_id'];
                                ?>
                                <option value="" <?= $kat_id == "" ? "selected" : "" ?>/>All</option>
                                <?php
                                    $sql = $conn->prepare("SELECT * FROM `kategori` ORDER BY id DESC");
                                    $sql->execute();
                                    while($data=$sql->fetch()) {
                                        
                                        echo '<option '.($kat_id == $data['Id'] ? "selected" : "").' value="'.$data['Id'].'"/>'.$data['name'].'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                  </div>
              <div class="table-responsive">
                <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kat Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>File</th>
                      <!--<th>Tag</th>-->
                      <!--<th>Image</th>-->
                      
                      <!--<th>Status</th>-->
                      <!--<th>File</th>-->
                      <!--<th>Pass</th>-->
                      <th>Menit</th>
                      
                      <!--<th>Masuk</th>-->
                      <!--<th>Keluar</th>-->
                      <!--<th>Sedekah</th>-->
                      <!--<th>Hemat</th>-->
                      
                      <!--<th>No Urut</th>-->
                      <!--<th>Create At</th>-->
                      <th>Update At</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kat Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>File</th>
                      <!--<th>Tag</th>-->
                      <!--<th>Image</th>-->
                      
                      <!--<th>Status</th>-->
                      <!--<th>File</th>-->
                      <!--<th>Pass</th>-->
                      <th>Menit</th>
                      
                      <!--<th>Masuk</th>-->
                      <!--<th>Keluar</th>-->
                      <!--<th>Sedekah</th>-->
                      <!--<th>Hemat</th>-->
                      
                      <!--<th>No Urut</th>-->
                      <!--<th>Create At</th>-->
                      <th>Update At</th>
                    
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `log_saya` ORDER BY Id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>
            
                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> <?php echo $data['kat_id'];?> </td>
                    <td> <?php echo $data['name'];?> </td>  
                    <td> <?php echo $data['description'];?> </td>
                    <td> <?php echo $data['file'];?> </td>
                    <!--<td> <?php echo $data['tag'];?> </td>-->
                    <!--<td> <?php echo $data['image'];?> </td>  -->
                    
                    <!--<td> <?php echo $data['status'];?> </td> -->
                    <!--<td> <?php echo $data['file'];?> </td>  -->
                    <!--<td> <?php echo $data['pass'];?> </td>-->
                    <td> <?php echo $data['menit'];?> </td>  
                    
                    <!--<td> <?php echo $data['masuk'];?> </td> -->
                    <!--<td> <?php echo $data['keluar'];?> </td>  -->
                    <!--<td> <?php echo $data['sedekah'];?> </td>-->
                    <!--<td> <?php echo $data['hemat'];?> </td>  -->
                    
                    <!--<td> <?php echo $data['no_urut'];?> </td> -->
                    <!--<td> <?php echo $data['create_at'];?> </td>  -->
                    <td> <?php echo $data['update_at'];?> </td>
                      					
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
      
      <!-- Button trigger modal -->


     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


      <script type="text/javascript">
     $(document).ready(function(){
        var table = $('#dataTable').DataTable();
        $('#kat_id').change(function(){
            $.ajax({
                url: '../../controller/cari_controller.php?op=cari&kat_id='+$(this).val(),
                success:function(result){
                    console.log(result);
                    table.clear().draw();
                    result = JSON.parse (result);
                    if (result.length > 0){
                        $.each(result,function(index,data){
                            console.log(data);
                            table.row.add( [
                                index+1,
                                data.kat_id,
                                data.name,
                                data.description,
                                data.file,
                                // data.tag,
                                // data.image,
                                // data.status,
                                // data.file,
                                // data.pass,
                                data.menit,
                                // data.masuk,
                                // data.keluar,
                                // data.sedekah,
                                // data.hemat,
                                // data.no_urut,
                                // data.create_at,
                                data.update_at
                            ] ).draw( false );
    
                        });
                    }
                }
            })
        })
    });
  </script>
      

<?php include '../footer.php'; ?>

