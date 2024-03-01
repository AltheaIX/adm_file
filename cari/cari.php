<?php
	// require the database connection
	require '../config.php';
	
	$stmt = $conn->query('SELECT * FROM m_user WHERE level_id = 0 AND status_aktif = 1');
	$stmtg = $conn->query('SELECT * FROM m_user WHERE level_id = 4 AND status_aktif = 1 GROUP BY id');
	
	$rows = $stmt->fetchAll();
	$rowg = $stmtg->fetchAll();
	$num_rows = count($rows);
	$num_rowg = count($rowg);
	echo "Total Peserta Aktif : ".$num_rows,"<br>" ;
	echo "Total Siswa : ".$num_rowg ;
	if(ISSET($_POST['search'])){
?>
	<table class="table table-bordered">
		<thead class="alert-info">
			<tr>
				<th>Nama Lengkap </th>
				<th>Email </th>
				<th>Paket </th>
				<th>Kelompok </th>
			</tr>
		</thead>
		<tbody>
			<?php
				$keyword = $_POST['keyword'];
				$query = $conn->prepare("SELECT * FROM m_user WHERE `nama` LIKE '%$keyword%' or `email` LIKE '%$keyword%' LIMIT 4");
				$query->execute();
				while($row = $query->fetch()){
			?>
			<tr>
				<td><?php echo $row['nama']?></td>
				<td><?php echo $row['email']?></td>
				<td>
				    <?php if($row['paket'] == 1){ ?>	
        			    Paket A
            		<?php }elseif($row['paket'] == 2){ ?>
            			Paket B
            		<?php }elseif($row['paket'] == 3){ ?>
            			Paket C	
            		<?php }elseif($row['paket'] == 4){ ?>
            			KBU		
            		<?php } ?>
				</td>
				
				<td>
    				<?php if($row['kelompok'] == 1){ ?>	
            			Mandiri
            		<?php }elseif($row['kelompok'] == 2){ ?>
            			Reguler
            		<?php }elseif($row['kelompok'] == 3){ ?>
            			Intensif	
            		<?php }elseif($row['kelompok'] == 4){ ?>
            			Warga Tdk Mampu
            		<?php }elseif($row['kelompok'] == 5){ ?>
            			Hunting
            		<?php }elseif($row['kelompok'] == 6){ ?>
            			Private	
            		<?php } ?>
        		</td>
			</tr>
			
			
			<?php
				}
			?>
		</tbody>
	</table>
<?php		
	}else{
?>
	<table class="table table-bordered">
		<thead class="alert-info">
			<tr>
			    <th>Nama Lengkap </th>
				<th>Email </th>
				<th>Paket </th>
				<th>Kelompok </th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = $conn->prepare("SELECT * FROM m_user ORDER BY id DESC LIMIT 5");
				$query->execute();
				
				while($row = $query->fetch()){
			?>
			<tr>
			    <td><?php echo $row['nama']?></td>
				<td><?php echo $row['email']?></td>
				<td>
				    <?php if($row['paket'] == 1){ ?>	
        			    Paket A
            		<?php }elseif($row['paket'] == 2){ ?>
            			Paket B
            		<?php }elseif($row['paket'] == 3){ ?>
            			Paket C	
            		<?php }elseif($row['paket'] == 4){ ?>
            			KBU		
            		<?php } ?>
				</td>
				
				<td>
    				<?php if($row['kelompok'] == 1){ ?>	
            			Mandiri
            		<?php }elseif($row['kelompok'] == 2){ ?>
            			Reguler
            		<?php }elseif($row['kelompok'] == 3){ ?>
            			Intensif	
            		<?php }elseif($row['kelompok'] == 4){ ?>
            			Warga Tdk Mampu
            		<?php }elseif($row['kelompok'] == 5){ ?>
            			Hunting
            		<?php }elseif($row['kelompok'] == 6){ ?>
            			Private	
            		<?php } ?>
        		</td>
			</tr>
			
			
			<?php
				}
			?>
		</tbody>
	</table>
<?php
	}
$conn = null;
?>