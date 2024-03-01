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
          <h1 class="h3 mb-2 text-gray-800">Master Hutang</h1>
		  <!--<a href="tambah.php" class="btn btn-primary">Tambah</a>-->
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambah
              </button>
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Desc</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Desc</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `log_saya` WHERE kat_id = 41 AND status IN (0,1,2,3) ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> <?php echo $data['name'];?> </td>
                    <td> <?php echo $data['description'];?> </td> 
                    <td> <a href="<?php echo $data['file'];?>">Lihat</a></td> 
                    <td> 
                    <?php 
                    if ($data['status'] == '0'){
                        echo "Pribadi";
                    }elseif ($data['status'] == '1'){
                        echo "<a style='color:red;'>Hutang</a>";
                    }elseif ($data['status'] == '2'){
                        echo "<a style='color:blue;'>Kantor</a>";
                    }elseif ($data['status'] == '3'){
                        echo "<a style='color:green;'>Sedekah</a>";
                    }
                    ?>
                    </td> 
                    <td> <?php echo $data['create_at'];?> </td>  
                    <td>  
                      <!-- <a href="#" class="btn btn-warning">Edit</a> -->
                      <button 
                      data-id="<?= $data['Id'] ?>" 
                      data-name="<?= $data['name'] ?>" 
                      data-des="<?= $data['description']?>"
                      data-file="<?= $data['file']?>"
                      data-status="<?= $data['status']?>"
                      type="button" class="btn btn-primary btn_update" data-toggle="modal">Edit</button>
                      <a class="btn btn-danger" onclick="return confirm('are you want deleting data')" href="../../controller/hutang_controller.php?op=hapus&id=<?php echo $data['Id']; ?>">Hapus</a>
                    </td>  					
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

