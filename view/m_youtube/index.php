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

<script src="../../asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<link href="../../asset/select2-4.0.6-rc.1/dist/css/select2.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-2 text-gray-800">Master Youtube</h1>
		  <!--<a href="../task/" class="btn btn-primary">Tambah</a>-->
		  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">-->
    <!--        Tambah-->
    <!--          </button>-->
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
					  <!--<th>Kat Id</th>-->
                      <th>Nama</th>
                      <th>Desc</th>
                      <th>Lihat</th>
					  <th>Created</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
					  <!--<th>Kat Id</th>-->
                      <th>Nama</th>
                      <th>Desc</th>
                      <th>Lihat</th>
					  <th>Created</th>
					  <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `log_saya` WHERE `kat_id` =  156 ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <!--<td> <?php echo $data['kat_id'];?> </td>-->
                    <td> <?php echo $data['name'];?> </td>
                    <td> <?php echo $data['description'];?> </td> 
					<td>
					    <?php
					if ($data['status']==1){
					    echo "foto";
					}elseif($data['status']==2){
					    echo "video";
					}elseif($data['status']==3){
					    echo "file";
					}elseif($data['status']==4){
					    echo "berita";
					}else{
					    echo "-";
					}
					?> 
					-
					<a href="<?php echo $data['file'];?>">Lihat</a>
					</td>
					<td> <?php echo $data['create_at'];?> </td> 
					<td>
					    <button 
                      data-id="<?= $data['Id'] ?>" 
                      data-name="<?= $data['name'] ?>" 
                      data-des="<?= $data['description']?>"
                      data-status="<?= $data['status']?>"
                      data-file="<?= $data['file']?>"
                      type="button" class="btn btn-primary btn_update" data-toggle="modal">Edit</button>
					    <a class="btn btn-danger" onclick="return confirm('are you want deleting data')" href="../../controller/task_controller.php?op=hapus&id=<?php echo $data['Id']; ?>">Hapus</a>
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
          <form action="../../controller/task_controller.php?op=tambah" method="post"  enctype="multipart/form-data">
              
          <div class="form-group">
            <label class="col-form-label">Kategori :</label>
            
            <select style="width: 100%;" class="form-control" name="kat_id" id="kategori">
              <?php
                $sql = $conn->prepare("SELECT * FROM `kategori` ORDER BY Id DESC");
                       $sql->execute();
                       while($data=$sql->fetch()) {
                ?>  
                <option value="<?php echo $data['Id'];?>"><?php echo $data['name'];?></option>
                
                <?php
               } 
             ?> 
            </select>
          </div>
          
          
          <div class="form-group">
            <label class="control-label" >Nama Pekerjaan:</label>          
				<input type="text" class="form-control" name="name" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Deskripsi:</label>
				<input type="text" class="form-control" name="description" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Menit:</label>
				<input type="number" class="form-control" name="menit" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Masuk:</label>
				<input type="number" class="form-control" name="masuk" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Keluar:</label> 
				<input type="number" class="form-control" name="keluar" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Hemat:</label>
				<input type="number" class="form-control" name="hemat" />
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Status :</label> 
				<select class="form-control" name="status">
					<option value="1">Foto</option>
					<option value="2">Video</option>
					<option value="3">File</option>
					<option value="4">Berita</option>
				</select>
          </div>
		  
		  <div class="form-group">
            <label class="control-label" >Link :</label>
				<input type="text" class="form-control" name="file" />
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
                    <label class="control-label" >Status : 1-Foto, 2-Video, 3-File, 4-Berita </label>         
    					<input type="text" class="form-control" id="status_edit" name="status" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >File : </label>         
    					<input type="text" class="form-control" id="file_edit" name="file" />
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
  
  <script>
$('select').select2({
    dropdownParent: $('#tambah')
});
  </script>
  
  
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
            $("#status_edit").val($(this).attr('data-status'));
            $("#file_edit").val($(this).attr('data-file'));
            $('#modalEdit').modal('show');
        });
    });
  </script>
      

<?php include '../footer.php'; ?>



