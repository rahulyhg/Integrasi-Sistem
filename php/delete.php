<?php

if(isset($_GET["id"])) {
	$id = $_GET["id"];
	$url = "https://webservice-demo.herokuapp.com/api/v1/barang/$id?key=12345";
	$data = file_get_contents($url);
	$hasil = json_decode($data);

	if ($hasil->data == true) {		
		$ch = curl_init();
		$post = "";

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_POST, count($post));

		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		$output = curl_exec($ch);

		curl_close($ch);

		// echo $output;
		header("Location: http://localhost/ISS/");
		die();
	}
	else {
		echo "Data emang ga ada say, apanya yang mau dihapus? kenangan?";
	}
}
?>