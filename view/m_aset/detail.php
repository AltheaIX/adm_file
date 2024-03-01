<?php
include '../../config.php';

if($_POST['getDetail']) {
      $id = $_POST['getDetail'];

                   $sql = $conn->prepare("SELECT * FROM aset WHERE id = $id ");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   
?>

            <!-- Modal -->
            <form action="../../controller/aset_controller.php?op=edit" method="post" >
                
          <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Akun Aset :</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
          </div>
		  
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Terhubung :</label>
            <select name="status_aktif" class="form-control" >
			
              <option value="<?php echo $data['kat_id']; ?>">
			  <?php 
			  $sql_akun = "SELECT * FROM kat_akun WHERE id = '".$data['kat_id']."'";
			  $stmt = $conn->prepare($sql_akun);
			  $stmt->execute();
			  $row = $stmt->fetch();
			  echo $row['name'];
			  ?>
			  
			  </option>
			  
			  <?php
				   $sql = $conn->prepare("SELECT * FROM kat_akun");
                   $sql->execute();
                   while($data=$sql->fetch()) {
			  ?>
			  <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
			  <?php } ?> 
            </select>
          </div>
		  
          
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Save changes</button>
      </div>

        </form>
        <?php } }
?>