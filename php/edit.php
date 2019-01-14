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
	<link rel="stylesheet" href="../css/style.css">

	<title>Edit - Inventory Management</title>
</head>
<body>
	<div class="container">
		<div class="row head">
			<div class="col-md-8">
				<h2>Edit Inventory</h2>
			</div>
			<div class="col-md-4 align text-right my-auto">
				<a href="create.php"><button class="btn btn-success btn-sm">Add New Inventory</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="edit.php" method="POST">					
					<div class="form-group">
						<label>Nama Barang</label>						
						<input class="form-control" name="namabarang" type="text" required="required">
						
					</div>
					<div class="form-group">
						<label>Jumlah Barang</label>
						<input class="form-control" name="jumlahbarang" type="text" required="required">
						
					</div>
					<div class="form-group">
						<label>Kategori Barang</label>
						<input class="form-control" name="kategoribarang" type="text" required="required">						
					</div>
					<?php
					$id = $_GET["id"];
					echo '<input type="hidden" name="id" value="'.$id.'">';
					?>
					
					<button type="submit" class="btn btn-primary">Update</button>
				</form>				
			</div>
		</div>
	</div>

	<!-- JavaScript Optional -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST["id"])) {
	$id = $_POST["id"];
	$namaBarang = $_POST["namabarang"];
	$jumlahBarang = $_POST["jumlahbarang"];
	$kategoriBarang = $_POST["kategoribarang"];
	$url = "https://webservice-demo.herokuapp.com/api/v1/barang/$id?key=12345";
	$data = file_get_contents($url);
	$hasil = json_decode($data);

	if ($hasil->data == true) {
		$ch = curl_init();	
		$post = [
			'name' => $namaBarang,
			'count' => $jumlahBarang,
			'id_kategori' => $kategoriBarang,
		];
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_POST, count($post));

		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

		$output = curl_exec($ch);

		curl_close($ch);

		header("Location: http://localhost/ISS/");
		die();
	}
	else {
		echo "Datanya tidak ada, apanya yang mau diedit";
	}
}
?>