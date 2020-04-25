<?php 
	include 'connect.php';
	$id = $_POST['id'];
	$jenis = $_POST['jenis'];
	$nominal = $_POST['nominal'];
	$catatan = $_POST['catatan'];
	mysqli_query($koneksi, "UPDATE penyimpanan SET jenis='$jenis', nominal='$nominal', catatan='$catatan' WHERE id = '$id'");

	header("location:index.php?pesan=update");
?>