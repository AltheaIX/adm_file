<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- MDBootstrap Datatables  -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
	</head>
	
<style>
.dtHorizontalVerticalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalVerticalExample th, td {
white-space: nowrap;
}
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}

</style>	
	
	
	
<body>
	<nav class="navbar navbar-default">
	</nav>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<h3 class="text-primary">DB BSPJI MANADO</h3>
		<a class="btn btn-primary" href="https://tugasi.com/data">LOGIN DISINI</a>
		<hr style="border-top:1px dotted #ccc;" />
		
		<div class="col-md-8">
			<form method="POST" action="">
				<div class="form-inline">
					<input type="search" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search here..." required=""/>
					<button class="btn btn-success" name="search">Search</button>
					<a href="./" class="btn btn-info">Reload</a>
				</div>
			</form>
			<br /><br />
			
			
			
			
			<?php
	// require the database connection
	require '../config.php';
	
	if(ISSET($_POST['search'])){
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered" style="margin-bottom: 0">
		<thead >
			<tr>
			    <th>No</th>
			    <th>Lihat</th>
				<th>Nama - Description</th>
				<!--<th>Description</th>-->
				<th>Jenis</th>
				<!--<th>Lihat</th>-->
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			<?php
			    $count = 1;
				$keyword = $_POST['keyword'];
				$query = $conn->prepare("SELECT * FROM log_saya WHERE (`name` LIKE '%$keyword%' or `description` LIKE '%$keyword%') AND kat_id = 167 AND status > 0 ORDER BY Id DESC LIMIT 20");
				$query->execute();
				while($row = $query->fetch()){
			?>
			<tr>
			    <td> <?php echo $count; ?> </td>
			    <td><?php echo date("d M Y", strtotime($row['create_at']));?> - <a href="<?php echo $row['file']?>">Lihat</a></td>
				<td><?php echo $row['name']?> - <?php echo $row['description']?></td>
        		<!--<td><?php echo $row['description']?></td>-->
        		<td>
        		    <?php if ($row['status'] == 1){?>
        		        Foto
        		    <?php }elseif ($row['status'] == 2){?>
        		        Video
        		    <?php }elseif ($row['status'] == 3){?>
        		        File
        		    <?php }elseif ($row['status'] == 4){?>
        		        Berita
        		    <?php }else{?>
        		        -
        		    <?php }?>    
        		</td>
        		<!--<td><a href="<?php echo $row['file']?>">Lihat</a></td>-->
        		<td><?php echo $row['create_at']?></td>
			</tr>
			
			<?php
			$count=$count+1;
				}
			?>
		</tbody>
	</table>
<?php		
	}else{
?>
</div>


	<table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
	    <marquee>Selamat datang di database arsip BPSDMP Kominfo Manado</marquee>
	    <br/>
	    <b>Update Terbaru</b>
	    <?php
echo "" . date("d/m/Y H:i:s") . "<br>";
?>
		<thead >
			<tr>
			    <th>No</th>
			    <th>Tanggal</th>
				<th>Nama Pekerjaan - Description</th>
				<!--<th>Description</th>-->
				<th>Lihat</th>
			</tr>
		</thead>
		<tbody>
			<?php

            $count = 1;


			    $query = $conn->prepare("SELECT * FROM log_saya WHERE (`name` LIKE '%$keyword%' or `description` LIKE '%$keyword%') AND kat_id = 167  AND status > 0 ORDER BY Id DESC LIMIT 10");
				$query->execute();
				
				while($row = $query->fetch()){
			?>
			<tr>
			    <td> <?php echo $count; ?> </td>
			    <td> <?php echo date("d M Y", strtotime($row['create_at']));?> - <a href="<?php echo $row['file']?>">Lihat</a></td>
			    <td><?php echo $row['name']?> - <?php echo $row['description']?></td>
        		<!--<td><?php echo $row['description']?></td>-->
        		<td><a href="<?php echo $row['file']?>">Lihat</a></td>
			</tr>
			
			
			<?php
			$count=$count+1;
				}
			?>
		</tbody>
	</table>
<?php
	}
$conn = null;
?>
			
			
			

<script>
    $(document).ready(function () {
$('#dtHorizontalVerticalExample').DataTable({
"scrollX": true,
"scrollY": 200,
});
$('.dataTables_length').addClass('bs-select');
});
</script>
			
			
			
			
			
		</div>
	</div>
</body>
</html>