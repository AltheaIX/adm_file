<?php
	// require the database connection
	require 'conn.php';
	
	$stmt = $conn->query('SELECT * FROM m_user');
	$stmtg = $conn->query('SELECT * FROM m_user GROUP BY no_kartu');
	
	$rows = $stmt->fetchAll();
	$rowg = $stmtg->fetchAll();
	$num_rows = count($rows);
	$num_rowg = count($rowg);
	echo "Total Jamaah : ".$num_rows,"<br>" ;
	echo "Total KK : ".$num_rowg ;
	if(ISSET($_POST['search'])){
?>
	<table class="table table-bordered">
		<thead class="alert-info">
			<tr>
				<th>No Kartu</th>
				<th>Nama Lengkap</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$keyword = $_POST['keyword'];
				$query = $conn->prepare("SELECT * FROM m_user WHERE `nama` LIKE '%$keyword%' or `no_kartu` LIKE '%$keyword%' LIMIT 2");
				$query->execute();
				while($row = $query->fetch()){
			?>
			<tr>
				<td><?php echo $row['no_kartu']?></td>
				<td><?php echo $row['nama']?></td>
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
				<th>No Kartu</th>
				<th>Nama Lengkap</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = $conn->prepare("SELECT * FROM m_user ORDER BY id DESC LIMIT 5");
				$query->execute();
				
				while($row = $query->fetch()){
			?>
			<tr>
				<td><?php echo $row['no_kartu']?></td>
				<td><?php echo $row['nama']?></td>
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