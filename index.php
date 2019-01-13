<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Owm Style -->
	<link rel="stylesheet" href="css/style.css">

	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row head">
			<div class="col-md-8">
				<h2>Manage Inventory</h2>
			</div>
			<div class="col-md-4 align text-right my-auto">
				<button class="btn btn-success btn-sm">Add New Inventory</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th class="w-50">Nama Barang</th>
								<th class="w-50">Kategori</th>
								<th>Jumlah</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$url = "https://webservice-demo.herokuapp.com/api/v1/barang/";
							$data = file_get_contents($url);
							$hasil = json_decode($data);
							$no = 1;
							foreach ($hasil->data as $hasil) {	
								echo "<tr>";
								// echo "<td>".$hasil->id."</td>";
								echo "<td>".$no."</td>";
								echo "<td>".$hasil->nama_barang."</td>";
								echo "<td>".$hasil->kategori."</td>";
								echo "<td>".$hasil->count."</td>";
								echo "<td class='action'>";
								echo '<span><a href="#"><span class="fas fa-edit"></span></a></span>';
								echo '<span><a href="php/delete.php?id='.$hasil->id.'"><span class="fas fa-trash-alt"></span></a></span>';
								echo "</td>";
								$no++;
							?>
							<!-- <td class='text-center'>
								<span><a href="#"><span class="fas fa-edit"></span></a></span>
								<span><a href="php/delete.php?id=$hasil->id"><span class="fas fa-trash-alt"></span></a></span>
							</td> -->
							<?php
								echo "<tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
	
	<!-- JavaScript Optional -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>