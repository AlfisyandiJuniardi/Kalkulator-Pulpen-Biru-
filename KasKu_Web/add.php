<?php 
	include 'connect.php';
	$jenis = $_POST['jenis'];
	$nominal = $_POST['nominal'];
	$tanggal = $_POST['tanggal'];
	$catatan = $_POST['catatan'];
	mysqli_query($koneksi, "INSERT INTO penyimpanan VALUES ('','$jenis','$nominal','$tanggal','$catatan')");
		
	header("location:index.php?pesan=tambah");
?>