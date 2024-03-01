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
          <h1 class="h3 mb-2 text-gray-800">Master Sistem</h1>
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
                      <th>Code</th>
                      <!--<th>Desc</th>-->
                      <!--<th>Untuk</th>-->
                      <!--<th>Fitur Terbaik</th>-->
                      <!--<th>Framework</th>-->
                      <!--<th>php</th>-->
                      <th>Lokasi</th>
                      <!--<th>Web Admin</th>-->
                      <th>tgl Update</th>
                      <!--<th>tgl Tawar</th>-->
                      <!--<th>Nilai Rupiah</th>-->
                      <!--<th>Nilai Emas</th>-->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Code</th>
                      <!--<th>Desc</th>-->
                      <!--<th>Untuk</th>-->
                      <!--<th>Fitur Terbaik</th>-->
                      <!--<th>Framework</th>-->
                      <!--<th>php</th>-->
                      <th>Lokasi</th>
                      <!--<th>Web Admin</th>-->
                      <th>tgl Update</th>
                      <!--<th>tgl Tawar</th>-->
                      <!--<th>Nilai Rupiah</th>-->
                      <!--<th>Nilai Emas</th>-->
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                   <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_sistem` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                    <tr>
                    <td> <?php echo $count; ?> </td>
                    <td> <?php echo $data['nama'];?> </td>
                    <td> <?php echo $data['code'];?> </td> 
                    <!--<td> <?php echo $data['des'];?> </td>  -->
                    <!--<td> <?php echo $data['untuk'];?> </td>  -->
                    <!--<td> <?php echo $data['fitur_terbaik'];?> </td> -->
                    <!--<td> <?php echo $data['framework'];?> </td>  -->
                    <!--<td> <?php echo $data['php_v'];?> </td>  -->
                    <td> <?php echo $data['lokasi'];?> </td>  
                    <!--<td> <?php echo $data['web_admin'];?> </td>  -->
                    <td> <?php echo $data['tgl_update'];?> </td>  
                    <!--<td> <?php echo $data['tgl_tawar'];?> </td>  -->
                    <!--<td> <?php echo $data['nilai_rupiah'];?> </td> -->
                    <!--<td> <?php echo $data['nilai_emas'];?> </td>  -->
                    <td>  
                      <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nama="<?= $data['nama'] ?>" 
                      data-code="<?= $data['code']?>" 
                      data-des="<?= $data['des'] ?>"
                      data-untuk="<?= $data['untuk'] ?>"
                      data-fiturterbaik="<?= $data['fitur_terbaik'] ?>"
                      data-framework="<?= $data['framework'] ?>"
                      data-phpv="<?= $data['php_v'] ?>"
                      data-lokasi="<?= $data['lokasi'] ?>"
                      data-desterbaru="<?= $data['des_terbaru'] ?>"
                      data-webadmin="<?= $data['web_admin'] ?>"
                      data-tglupdate="<?= $data['tgl_update'] ?>"
                      data-tgltawar="<?= $data['tgl_tawar'] ?>"
                      data-nilairupiah="<?= $data['nilai_rupiah'] ?>"
                      data-nilaiemas="<?= $data['nilai_emas'] ?>"
                      type="button" class="btn btn-primary btn_update" data-toggle="modal">Edit</button>
                      <a class="btn btn-danger" onclick="return confirm('are you want deleting data')" href="../../controller/sistem_controller.php?op=hapus&id=<?php echo $data['id']; ?>">Hapus</a>
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
      
      <!-- Button trigger modal -->


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
          <form action="../../controller/sistem_controller.php?op=tambah" method="post"  enctype="multipart/form-data">
          
          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" class="form-control" name="nama" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Code : </label>       
				<input type="text" class="form-control" name="code" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Description : </label>   
				<input type="text" class="form-control" name="des" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Untuk : </label>    
				<input type="text" class="form-control" name="untuk" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Fitur Terbaik : </label>     
				<input type="text" class="form-control" name="fitur_terbaik" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Framework : </label>     
				<input type="text" class="form-control" name="framework" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Php Version : </label>   
				<input type="text" class="form-control" name="php_v" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Lokasi : </label> 
				<input type="text" class="form-control" name="lokasi" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Web Admin : </label>     
				<input type="text" class="form-control" name="web_admin" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Tgl Update : </label>    
				<input type="text" class="form-control" name="tgl_update" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Tgl Tawar : </label>     
				<input type="text" class="form-control" name="tgl_tawar" />
          </div>
          
           <div class="form-group">
            <label class="control-label" >Nilai Rupiah : </label>
				<input type="text" class="form-control" name="nilai_rupiah" />
          </div>
          
           <div class="form-group">
            <label class="control-label" >Nilai Emas : </label>     
				<input type="text" class="form-control" name="nilai_emas" />
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
      
   <!-- Modal -->
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
                    <input type="hidden" id="id_edit" name="id" />
                    
    			  <div class="form-group">
                    <label class="control-label" >Nama : </label>        
    					<input type="text" class="form-control" id="nama_edit" name="nama" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Code : </label>         
    					<input type="text" class="form-control" id="code_edit" name="code" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Description : </label>     
    					<textarea class="form-control" id="des_edit" name="des">
    					</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" ><b>Desc Terbaru : </b></label>     
    					<textarea style="border:1px solid black;" class="form-control" id="desterbaru_edit" name="des_terbaru">
    					</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Untuk : </label>
    					<input type="text" class="form-control" id="untuk_edit" name="untuk" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Fitur Terbaik : </label> 
    					<input type="text" class="form-control" id="fiturterbaik_edit" name="fitur_terbaik" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Framework : </label>
    					<input type="text" class="form-control" id="framework_edit" name="framework" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Php Version : </label>
    					<input type="text" class="form-control" id="phpv_edit" name="php_v" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Lokasi : </label>
    					<input type="text" class="form-control" id="lokasi_edit" name="lokasi" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Web Admin : </label>
    					<input type="text" class="form-control" id="webadmin_edit" name="web_admin" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Tgl Update : </label>
    					<input type="text" class="form-control" id="tglupdate_edit" name="tgl_update" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Tgl Tawar : </label>
    					<input type="text" class="form-control" id="tgltawar_edit" name="tgl_tawar" />
                  </div>
                  
                   <div class="form-group">
                    <label class="control-label" >Nilai Rupiah : </label>
    					<input type="text" class="form-control" id="nilairupiah_edit" name="nilai_rupiah" />
                  </div>
                  
                   <div class="form-group">
                    <label class="control-label" >Nilai Emas : </label> 
    					<input type="text" class="form-control" id="nilaiemas_edit" name="nilai_emas" />
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
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#code_edit").val($(this).attr('data-code'));
            $("#des_edit").val($(this).attr('data-des'));
            $("#untuk_edit").val($(this).attr('data-untuk'));
            $("#fiturterbaik_edit").val($(this).attr('data-fiturterbaik'));
            $("#framework_edit").val($(this).attr('data-framework'));
            $("#phpv_edit").val($(this).attr('data-phpv'));
            $("#lokasi_edit").val($(this).attr('data-lokasi'));
            $("#desterbaru_edit").val($(this).attr('data-desterbaru'));
            $("#webadmin_edit").val($(this).attr('data-webadmin'));
            $("#tglupdate_edit").val($(this).attr('data-tglupdate'));
            $("#tgltawar_edit").val($(this).attr('data-tgltawar'));
            $("#nilairupiah_edit").val($(this).attr('data-nilairupiah'));
            $("#nilaiemas_edit").val($(this).attr('data-nilaiemas'));
            $('#modalEdit').modal('show');
        });
    });
  </script>
      

<?php include '../footer.php'; ?>

